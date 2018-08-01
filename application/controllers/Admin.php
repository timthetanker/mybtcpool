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
        //$userStatus = $this->admin_model->verifyUser();
        //echo'<h1 style="color:blue"> USER STATUS.....'.$userStatus.'</h1>';


        //if ($userStatus !== true) { //redirect works

    }//method

    public function create_admin()
    {
        $data['title'] = 'Create New Admin';
        #todo check if user is authorized;
        $this->load->view('templates/admin_header');
        $this->load->view('admin/create_admin', $data);
        $this->load->view('templates/admin_footer');
        if ($this->input->post()) {
            $adminData = $this->input->post();
            var_dump($adminData);
            $data['getNewAdmin'] = $this->admin_model->updateAdmins($adminData, 'add');
            if ($data['getNewAdmin'] === true) {
                #TODO NEXT INITIATE SESSION FOR INDEX LOGIN
                //$this->session->se
                redirect(base_url() . 'admin/index');
            } else {
                echo 'Auth Failed...';
                echo $data['getNewAdmin'];
            }
        } else {
            //waiting for post data

        }
    }//model


    public function login()
    {
        #TODO CLEAN UP -- REMOVE HTML & PLACE IN VIEW FILE
        $data['title'] = 'Admin Login';
        echo '<h1 style="color: white">Please Login</h1>';
        /*
        $data['title'] = $page;
        $userStatus = $this->admin_model->verifyUser();
        if ($userStatus == true) {
            $data = $this->session->UserID;
            $this->load->view('admin/index');
        }
        $data["error"] = 0;
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        var_dump($data);*/
        if ($this->input->post()) {// form submitted
            $auth = $this->admin_model->adminLogin($this->input->post());
            //var_dump($auth);
            if ($auth == true) { //login in succeess
                redirect(base_url() . "admin/index", 'auto');

                // var_dump($_POST);

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




