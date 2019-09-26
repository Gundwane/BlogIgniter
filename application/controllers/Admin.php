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

                $post_id = $this->Post->insert($save);
            }else {
                echo validation_errors();
            }
        }

        $data["data_posted"] = posted();
        $view["title"] = "Crear Post";
        $view["body"] = $this->load->view('admin/post/save', $data, TRUE);

        $this->parser->parse("admin/template/body", $view);
    }
}