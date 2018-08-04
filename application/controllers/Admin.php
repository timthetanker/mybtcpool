<?php


class Admin extends CI_Controller
{


    public function admin_index()
    {
        //verify User Is Authorized To Use Backend
        //print_r($_SESSION);
        $auth = $this->admin_model->verifyUser($this->session->userdata());
        //var_dump($auth);
        if ($auth === true) {
            //echo '<h1>Auth Passed</h1>';
            // $data['title'] = 'Welcome ' . $_SESSION['username'];
            //$this->load->view('templates/admin_header.php');
            $this->load->view('admin/index');
            //$this->load->view('templates/admin_footer');
        } elseif ($auth === false) {
            '<h1> AUTH FAILED</h1>';
            //user not found or authorized
        } else {
            '<h1> Some Other Error</h1>';
        }
    }//method

    public function load()
    {
        $this->load->view('templates/admin_header');
        $data['test'] = 'TEST PAGE';
        $this->load->view('admin/load', $data);
        $this->load->view('templates/admin_footer');
    }


    public function login($page = 'login')
    {
        if (!file_exists(APPPATH . '/views/admin/' . $page . '.php')) {
            echo 'login page error';
            show_404();
        }
        $data['title'] = $page;
        $this->load->view('templates/header', $data);
        $this->load->view('admin/' . $page, $data);
        $this->load->view('templates/footer', $data);

        if ($this->input->post()) {

            $auth = $this->admin_model->adminLogin($this->input->post());
            if ($auth == true) { //login in succeess
                $_SESSION['username'] = $this->input->post('username');
                redirect(base_url() . "admin/admin_index");
            } else { //bad credentials
                echo '<h1 style="color: whitesmoke">' . $data["error"] = 2 . 'INCORRECT CREDENTIALS' . '</h1>';
                var_dump($_SESSION);
                #  $this->load->view('admin/login', $data);
            }
        }
        echo '<h1>Waiting for POST</h1>';
    }//method


    public function logout()
    {
        if ($this->admin_model->logout() === true) {
            $data['title'] = 'You Have Been Logged Out...See Yaou Soon :)';
            $this->load->view('templates/admin_header');
            $this->load->view('admin/logout', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $data['title'] = 'Whoops looks like an error :( ';
            $this->load->view('templates/admin_header');
            $this->load->view('admin/error_page', $data);
            $this->load->view('templates/admin_footer');
        }
    }//model
}//class




