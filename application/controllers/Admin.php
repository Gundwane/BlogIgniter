<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->helper("form");
    }

    public function index()
    {
        $name = "asd";
        $this->load->view('admin/index.html', $name);
    }

    public function post_list()
    {
        $this->load->view('admin/post/list.html');
    }

    public function post_save()
    {
        $this->load->view('admin/post/save.php');
    }
}


///CHEQUEAR. No se ve bien la web. Falta js o css.