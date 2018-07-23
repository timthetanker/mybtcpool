<?php


class Admin extends CI_Controller
{

    public function index()
    {
        $userStatus = $this->admin_model->verifyUser();
        if ($userStatus == true) {
            $this->load->view('templates/admin_header.php');
            $this->load->view('admin/index.php');
            $this->load->view('templates/admin_footer.php');
        }
        if ($userStatus !== true) {
            echo 'ERROR';

        }

    }

    public function login()
    {
        echo '<h1 style="color: white">HI FROM LOGIN</h1>';
        /*
        $data['title'] = $page;
        $userStatus = $this->admin_model->verifyUser();
        if ($userStatus == true) {
            $data = $this->session->UserID;
            $this->load->view('admin/index');
        }*/
        $data["error"] = 0;
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        var_dump($data);
        if ($this->input->post()) {// form submitted
            echo $username = $this->input->post('username');
            echo $password = $this->input->post('password');
            $this->load->view('admin/login', $data);
            var_dump($_POST);
            $auth = $this->admin_model->adminLogin($username, $password);

            if ($auth == true) { //login in succeess
                redirect(base_url() . "admin/index", 'auto');
                var_dump($_POST);

            } else { //bad credentials
                $data['error'] = 2;
                $this->load->view('admin/login', $data);
            }
        } else {
            $this->load->view('admin/login', $data);
        }
    }//method

}//class




