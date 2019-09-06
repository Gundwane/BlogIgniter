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
        $data['name'] = 'Max';
        $data['name'] = 'Rick';
        $data['lastname'] = 'Rockatansky';
        $data['lastname'] = 'Deckard';
        $this->load->view('admin/index.php', $data);
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