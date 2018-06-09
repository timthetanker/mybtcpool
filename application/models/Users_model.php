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

    public function updateUserInfo($data)
    {
        return $this->result();
    }

// #todo CODE IGNITER QUERIES SCRIBBLE PAD BELOW

    /**
     * The active record query is similar to
     *
     *"update $table_name set title='$title' where emp_no=$id"NB =>
     * */
    public function update_info($data, $userID)
    {
        $this->db->where("userID", $userID); //table column field, second argument
        $query = $this->db->update('users', $data); //second argument pass data you want to update
        var_dump($query);
        $afftectedRows = $this->db->affected_rows();
        if($afftectedRows == 1){
            return TRUE;
        } else {
            return FALSE;
        }
// Produces:
//
//      UPDATE mytable
//      SET title = '{$title}', name = '{$name}', date = '{$date}'
//      WHERE id = $id
        /* $sql = "UPDATE users SET firstname = 'Timmer' WHERE userID = '1'";
      $this->db->update($sql);
      return $this->result();*/

    }

    function fetch_single_data($id)
    {

        $this->db->where("userID", $id);
        $query = $this->db->get('users'); //argument table name; query similar to Select * from users where id = '$id'
        var_dump($query);
        return $query;  //returns output
    }

    function update_data($data, $id)
    {
        $this->db->where("userID", $id); //table column field, second argument
        $this->db->update('users', $data); //second argument pass data you want to update
    }

}//class