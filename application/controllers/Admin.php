<?php


class Admin extends CI_Controller
{

    public function index()
    {
        //verify User Is Authorized To Use Backend
        $auth = $this->admin_model->verifyUser();
        if ($auth === true) {
            echo '<h1>Auth Passed</h1>';
            $data['title'] = 'Welcome ' . $_SESSION['username'];
            $this->load->view('templates/admin_header.php');
            $this->load->view('admin/index.php', $data);
            $this->load->view('templates/admin_footer.php');
        } elseif ($auth !== true) {
            //user not found or authorized
            redirect(base_url() . 'admin/login.php');
        }
    }//method

    public function login()
    {
        #TODO CLEAN UP -- REMOVE HTML & PLACE IN VIEW FILE
        $data['title'] = 'Admin Login';
        if ($this->input->post()) {// form submitted
            $auth = $this->admin_model->adminLogin($this->input->post());
            //var_dump($auth);
            if ($auth == true) { //login in succeess
                redirect(base_url() . "admin/index", 'auto');
            } else { //bad credentials
                echo '<h1 style="color: whitesmoke">' . $data["error"] = 2 . 'INCORRECT CREDENTIALS' . '</h1>';
                $this->load->view('admin/login', $data);
            }
        }
            $this->load->view('admin/login', $data);
    }//method

    public function logout()
    {
        $data = 'You Have Been Logged Out...GoodBYE :)';
        $this->load->view('templates/admin_header');
        $this->load->view('admin/logout', $data);
        $this->load->view('templates/admin_footer');
    }

}//class




