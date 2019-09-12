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
        $data["data_posted"] = posted();
        $view["title"] = "Crear Post";
        $view["body"] = $this->load->view('admin/post/save', $data, TRUE);

        $this->parser->parse("admin/template/body", $view);
    }
}