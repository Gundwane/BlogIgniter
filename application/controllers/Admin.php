<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->helper("Post_helper");
        $this->load->library("parser");
        $this->load->library("Form_validation");
    }

    public function index()
    {
        $this->load->view('admin/index.php');
    }

    public function post_list()
    {
        $view["body"] = $this->load->view("admin/post/list", NULL, TRUE);
        $view["title"] = "Posts";
        $this->parser->parse('admin/template/body', $view);
    }

    public function post_save()
    {
        if($this->input->server("REQUEST_METHOD") == "POST")
        {
            $this->form_validation->set_rules('title', 'Titulo', 'required|min_length[10]|max_length[65]');
            $this->form_validation->set_rules('content', 'Contenido', 'required|min_length[10]');
            $this->form_validation->set_rules('description', 'Descripción', 'max_length[100]');
            $this->form_validation->set_rules('posted', '', 'required');
            
            if($this->form_validation->run())
            {
                $save = array
                (
                    'title' => $this->input->post("title"),
                    'content' => $this->input->post("content"),
                    'description' => $this->input->post("description"),
                    'posted' => $this->input->post("posted")
                );
                $post_id = $this->post->insert($save);

                $this->upload($post_id, $save);
            }
        }

        $data["data_posted"] = posted();
        $view["title"] = "Crear Post";
        $view["body"] = $this->load->view('admin/post/save', $data, TRUE);

        $this->parser->parse("admin/template/body", $view);
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
            $save = array(
                'image' => $title . $data["file_ext"]
            );

            $this->post->update($post_id, $save);
            $this->resize_image($data['full_path'], $title . $data["file_ext"]);
        }
    }

    public function resize_image($path_image, $image_name)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = '/path/to/image/mypic.jpg';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 500;
        $config['height'] = 500;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }
}