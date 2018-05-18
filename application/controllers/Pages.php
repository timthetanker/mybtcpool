<?php


class Pages extends CI_Controller {
    public function index($page = 'index'){
        if(!file_exists(APPPATH.'/views/pages/'.$page.'.php')){
            echo 'error';
            show_404();
        }
        $data['title'] = $page;
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}
