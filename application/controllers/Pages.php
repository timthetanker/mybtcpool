<?php


class Pages extends CI_Controller
{
    public function index($page = 'index')
    {
        if (!file_exists(APPPATH . '/views/pages/' . $page . '.php')) {
            echo 'error';
            show_404();
        }
        $data['title'] = $page;
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }

    //load page
    public function contact($page = 'contact')
    {
        #todo setup email  usage
        if (!file_exists(APPPATH . '/views/pages/' . $page . '.php')) {
            echo 'error';
            show_404();
        }
        $data['title'] = $page;
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }

    //Ajax
    // This function call from AJAX for contact
    public function user_data_submit()
    {
        $data = array('username' => $this->input->post('name'), 'pwd' => $this->input->post('pwd'));
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        foreach ($data as $key => $item) {
            echo '<i>Username </i>' . $item;
            echo '<br />';
            echo '<i>Pwd </i>' . $item;
            //$this->input->post('pwd');
            echo '<br />';
            echo '<hr />';
        }
        //Either you can print value or you can send value to database
        //echo json_encode($data);
    }
}
