<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 09/05/2018
 * Time: 21:43
 */
/*
 * <?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 09/05/2018
 * Time: 18:59
 */
/*class Users extends CI_Controller {


    public function index($page = 'index')
    {
        if(!file_exists(APPPATH . '/views/users/' . $page . '.php')){
            show_404();
        }
        $data['title'] ='WELCOME USER';
        $this->load->view('templates/header', $data);
        $this->load->view('users/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function login($page = 'login'){

        $data['title'] = 'Sign In';

        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if($this->form_validation->run() === false){
            $data['title'] ='WELCOME USER';
            $this->load->view('templates/header', $data);
            $this->load->view('users/' . $page, $data);
            $this->load->view('templates/footer', $data);
        }
        else{
            $email = $this->input->post('email');
            $pword = $this->input->post('pword');

            $userInfo = $this->users_model->login($email, $pword);
            if($userInfo){
                foreach ($userInfo as $user){
                    $userData = array('userID' =>$user['userID'], 'email' => $user['email'], 'firstname' => $user['firstname'], 'lastname' => $user['lastname'], 'logged' =>true);
                }
                if(isset($userData)){
                    $this->session->set_userdata($userData);
                    redirect('posts/welcome');
                }
                else{
                    echo 'USER DATA NOT DEFINED';
                }
            }
            redirect('users/failed');
        }
    }
}
*/



class Users extends CI_Controller {
    public function index($page = 'index')
    {
        if(!file_exists(APPPATH . '/views/users/' . $page . '.php')){
            show_404();
        }
        $data['title'] ='WELCOME USER';
        $this->load->view('templates/header', $data);
        $this->load->view('users/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }

    /**
     * ADD dashboard model here, temporary removed for testing purpose.
     */

    #TODO this should be an autoload
    public function dashboard($page = 'dashboard')
    {
        if(!file_exists(APPPATH . '/views/users/' . $page . '.php')){
            show_404();
        }
        if(!isset($_SESSION['userID'])){
            $data['title'] = 'PLEASE LOGIN';
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        }
        else {
            $data['games'] = $this->games_model->getUpcomingGames();
            $data['title'] = 'WELCOME USER';
            $this->load->view('templates/header', $data);
            $this->load->view('users/' . $page, $data);
            $this->load->view('templates/upcoming_fixtures_tbl', $data);
            $this->load->view('templates/footer', $data);
        }

    }

    public function failed($page = 'failed')
    {
        if(!file_exists(APPPATH . '/views/users/' . $page . '.php')){
            show_404();
        }
        $data['title'] ='Login Failed';
        $this->load->view('templates/header', $data);
        $this->load->view('users/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function logout($page = 'logout')
    {
        if(!file_exists(APPPATH . '/views/users/' . $page . '.php')){
            show_404();
        }
        $data['title'] ='logout';
        $this->load->view('templates/header', $data);
        $this->load->view('users/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }


    public function login(){
        $data['title'] = 'Sign In';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        } else {

            // Get username
           echo $username = $this->input->post('username');
            // Get and encrypt the password
           echo $password = $this->input->post('password');

            // Login user
            $user_id = $this->users_model->login($username, $password);

            if($user_id){
                // Create session
                $user_data = array(
                    'userID' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);

                // Set message
                $this->session->set_flashdata('user_loggedin', 'You are now logged in');

                redirect('users/dashboard');
            } else {
                // Set message
                $this->session->set_flashdata('login_failed', 'Login is invalid');

                redirect('users/failed');
            }
        }
    }
}