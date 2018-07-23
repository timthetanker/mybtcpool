<?php

/**
 * Created by PhpStorm.
 * User: timco
 * Date: 7/11/2018
 * Time: 11:50 PM
 */
class Login extends CI_Controller
{
    public function login()
    {

        /*
        Error List:
        0 - No Error
        1 - Too Many Login Attempts
        2 - Bad Credentials
        */
        $data["error"] = 0;
        if ($this->input->post()) {// form submitted
            if ($this->session->userdata("loginattempts")) { //count attempts
                echo "2";
                $postData = $this->input->post();
                $loginattempts = $this->session->userdata("loginattempts");
                if ($loginattempts > 4) {
                    $data["error"] = 1;
                    $this->load->view('login', $data);
                } else {
                    $auth = $this->admin_model->adminLogin($postData);
                    if ($auth == true) {
                        redirect(base_url() . "admin/index", 'auto');
                    } else {
                        $data["error"] = 2;
                        $this->load->view('admin/index', $data);
                    }
                }
            } else {
                echo "1";
                $this->session->set_userdata("loginattempts", 0);
                $postData = $this->input->post();
                $auth = $this->admin_model->adminLogin($postData);
                if ($auth == true) {
                    redirect(base_url() . "admin/login", 'auto');
                } else {
                    $data["error"] = 2;
                    $this->load->view('admin/login', $data);
                }
            }
        } else {
            $this->load->view('admin/login', $data);
        }

    }
}


