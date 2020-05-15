<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->helper("Post_helper");
        $this->load->helper("Date_helper");
        $this->load->library("parser");
        $this->load->library("Form_validation");
        $this->load->model('Post');
    }

    public function index()
    {
        $this->load->view('admin/index.php');
    }

    public function post_list()
    {
        $data["posts"] = $this->Post->findAll();
        $view["body"] = $this->load->view("admin/post/list", $data, TRUE);
        $view["title"] = "Posts";
        $this->parser->parse('admin/template/body', $view);
    }

    public function post_request_handler()
    {
        //El edit no funciona porque tira 'GET' en lugar de 'POST'
        if($this->input->server("REQUEST_METHOD") == "POST")
        {
            $this->form_validation->set_rules('title', 'Titulo', 'required|min_length[10]|max_length[65]');
            $this->form_validation->set_rules('content', 'Contenido', 'required|min_length[10]');
            $this->form_validation->set_rules('description', 'Descripción', 'max_length[100]');
            $this->form_validation->set_rules('posted', '', 'required');

            if($this->form_validation->run())
            {
                $post_id = $this->input->post("id");
                $arrayDataPost = $this->armar_array_post();

                if ($post_id == null){
                    $post_id = $this->Post->insert($arrayDataPost);
                    $this->upload($post_id, $arrayDataPost);
                }else{
                    $this->Post->update($post_id, $arrayDataPost);
                }
            }
        }
    }

    public function crear_post()
    {
        $nuevoPost = array
        (
            'title' => '',
            'content' => '',
            'description' => '',
            'url_clean' => '',
            'posted' => posted(),
        );

        // $data["data_posted"] = posted();
        $view["title"] = "Crear Post";
        $view["body"] = $this->load->view('admin/post/save', $nuevoPost, TRUE);

        $this->parser->parse("admin/template/body", $view);
    }

    public function edit_post($post_id)
    {
        $post = $this->Post->find($post_id);
        $view["title"] = "Editar Post";
        $view["body"] = $this->load->view('admin/post/save', $post, TRUE);

        $this->parser->parse("admin/template/body", $view);
    }

    public function post_delete($post_id = null)
    {
        $check = isset($post_id);

        if (!isset($post_id) || $post_id == null){
            echo 0;
        }else{
            $this->Post->delete($post_id);
            echo 1;
        }
    }

    private function armar_array_post()
    {
        $url_clean = $this->input->post("clean");

        if ($url_clean == ""){
            $url_clean = clean_name($this->input->post("title"));
        }

        $arrayDataPost = array
        (
            'title' => $this->input->post("title"),
            'content' => $this->input->post("content"),
            'description' => $this->input->post("description"),
            'posted' => $this->input->post("posted"),
            'url_clean' => $url_clean,
        );

        return $arrayDataPost;
    }

    private function upload($post_id, $title)
    {
        $image = "image";

        $title = clean_name($title);

        //Configuraciones de carga
        $config['upload_path'] = 'uploads/post';
        $config['file_name'] = $title;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5000;
        $config['overwrite'] = TRUE;

        //Cargamos la librería
        $this->load->library('upload', $config);

        if($this->upload->do_upload($image))
        {
            $data = $this->upload->data();
            
            $save = array(
                'image' => $title . $data["file_ext"]
            );

            $this->Post->update($post_id, $save);
            $this->resize_image($data['full_path'], $title . $data["file_ext"]);
        }
    }

    public function resize_image($path_image)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path_image;
        //$config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 500;
        $config['height'] = 500;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }
}