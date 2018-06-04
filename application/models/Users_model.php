<?php

class Users_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function register($enc_password)
    {
        // User data array
        $data = array('name' => $this->input->post('name'), 'email' => $this->input->post('email'), 'username' => $this->input->post('username'), 'password' => $enc_password, 'zipcode' => $this->input->post('zipcode'));

        // Insert user
        return $this->db->insert('users', $data);
    }

    // Log user in
    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('pword', $password);
        $stmnt = $this->db->get('users');
        if($stmnt->num_rows() == 1){
            $user_id = $stmnt->row()->userID;
            return $user_id;
        } else {
            return false;
        }
    }

    // Check username exists
    public function check_username_exists($username)
    {
        $query = $this->db->get_where('users', array('username' => $username));
        if(empty($query->row_array())){
            return true;
        } else {
            return false;
        }
    }

    // Check email exists
    public function check_email_exists($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));
        if(empty($query->row_array())){
            return true;
        } else {
            return false;
        }
    }

    public function getAllUserInfo($userID)
    {
        $sql = "SELECT * from users WHERE userID = '$userID'";
        $stmnt = $this->db->query($sql);
        if($stmnt->num_rows() == 1){
            return $stmnt->result();
        }
        return false;
    }


}