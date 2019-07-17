<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
    }

    public function index()
    {
        $name = "asd";
        $this->load->view('admin/index.html', $name);
    }

    public function post_list()
    {
        $this->load->view('admin/post_list.html');
    }
}


///CHEQUEAR. No se ve bien la web. Falta js o css.