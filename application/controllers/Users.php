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
        $data['title'] = 'WELCOME USER';
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
        } else {
            $data['balance'] = $this->games_model->get_balance($this->session->userID);
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
        $data['title'] = 'Login Failed';
        $this->load->view('templates/header', $data);
        $this->load->view('users/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function logout($page = 'logout')
    {
        if(!file_exists(APPPATH . '/views/users/' . $page . '.php')){
            show_404();
        }
        $data['title'] = 'logout';
        $this->load->view('templates/header', $data);
        $this->load->view('users/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }


    public function login()
    {
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
                //test

                //test end
                // Create session
                $user_data = array('userID' => $user_id, 'username' => $username, 'logged_in' => true);
                $this->session->set_userdata($user_data);
                // Set message
                //$this->session->set_flashdata('user_loggedin', 'You are now logged in');
                redirect('pages/index');
            } else {
                // Set message
                // $this->session->set_flashdata('login_failed', 'Login is invalid');
                redirect('users/failed');
            }
        }
    }

    public function getUserID()
    {
        if(isset($this->session)){
            $data['userID'] = $this->session->userID;
        }
        if(!isset($this->session)){
            redirect(base_url() . 'users/login.php');
        }
    }

    public function profile()
    {
        {
            if(!file_exists(APPPATH . '/views/users/profile.php')){
                show_404();
            }
            $userID = $this->session->userID;
            $data['balance'] = $this->games_model->get_balance($userID);
            $data['title'] = 'My Profile';
            $data['userID'] = $this->session->userID;
            if(isset($data['userID'])){ //user is logged in from session

                $data['userInfo'] = $this->users_model->getAllUserInfo($data['userID']);
                //Display Users Entered ttournaments on profile page
                $data['enteredTournaments'] = $this->users_model->getEnteredTournaments($this->session->userID);
                //user has not entered any tournaments
                if($data['enteredTournaments'] == FALSE || $data['enteredTournaments'] == NULL){
                    $data['enteredTournaments'] == 'You have not entered any tournaments';
                }
            } else { //not loged in
                redirect('users/login');
            }
            /*if(isset($_POST['submitBtn'])){ #TODO convert to CodeIgniter post menthod for sanitization
                $data = array('users' => 'users', 'firstname' => $this->input->post('firstname'), 'userID' => $this->session->userID );
                $this->load->model('users_model'); // load the model first
                if($this->users_model->upddata($data)) // call the method from the model
                {
                    echo 'working';
                    // update successful
                }
                else
                {
                    echo 'working';
                    // update not successful
                }


            }*/
            $this->load->view('templates/header', $data);
            $this->load->view('users/profile', $data);
            $this->load->view('templates/footer', $data);
        }
    }

#TODO create form validation menthod / function

    public function update_info()
    {

        //currently only updates firstname
        #todo add all required fields to  $data = array('firstname' => $this->input->post('firstname'));
        $userID = $this->session->userID;
        $data['title'] = 'Updated Info';
        $data = array('firstname' => $this->input->post('firstname'));
        $this->load->model('users_model'); // load the model first
        $result = $this->users_model->update_info($data, $userID);
        if($result == true)// call the method from the model
        {
            redirect(base_url() . 'users/profile');
            /*
                        $this->load->view('templates/header', $data);
                        $this->load->view('users/profile', $data);
                        $this->load->view('templates/footer', $data);*/
            // update successful...
        } else {

            echo '<h1> ERROR Updating data </h1>';
            #TODO set redirect countdown script
            // update not successful...
        }

    }

#TODO CI SCRIBBLE PAD CLEAN UP
    /*
        public function image_upload($page = 'image_upload')
        {
            if(!file_exists(APPPATH . '/views/users/' . $page . '.php')){
                show_404();
            }

            $data['title'] = "UPLOAD IMAGE";
            $this->load->view('templates/header', $data);
            $this->load->view('users/image_upload', $data);
        }

        public function ajax_upload()
        {
            echo 'TRIGGERED===============';
            if(isset($_FILES["image_file"]["name"])){
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 100;
                $config['max_width'] = 1024;
                $config['max_height'] = 768;

                $this->upload->initialize($config);
                if(!$this->upload->do_upload('image_file')){
                    echo $this->upload->display_errors();
                } else {
                    $data = $this->upload->data();
                    echo '<img src="' . base_url() . '/uploads/' . $data["file_name"] . '" width="300" height="225" class="img-thumbnail" />';
                }
            }
        }
    }*/


    public function update_data()
    {
        echo $userID = $this->uri->segment(1); //3 can change depending on position bound
        //load model
        $this->load->model('users_model');
        //call main model & store data in $data['user_data']
        $data['user_data'] = $this->main_model->fetch_single_data($userID);
        $data['fetch_data'] = $this->main_model->getAllUserInfo($data['userID']); #TODO check
        if($this->input->post("submitBtn")){
            $this->main_model->update_data($data, $this->input->post('hidden_id'));
            redirect(base_url() . 'users/profile');
        }
    }


    public function displayTournaments()
    {
    }
}//class