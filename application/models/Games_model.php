<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 19/05/2018
 * Time: 06:26
 */
class Games_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function getUpcomingGames()
    {
        $sql = 'SELECT * from schedule WHERE gameTimeEastern > NOW() GROUP BY tournament ORDER BY tournament ASC ';
        $stmnt = $this->db->query($sql);
        if($stmnt->num_rows() > 0){
            return $stmnt->result();
        }
        return false;
    }

    public function getSelectedGame($gameID)
    {
        #TODO add check to prevent submission where tournament has started
        $sql = "SELECT * FROM schedule WHERE gameID = '$gameID'";
        $stmnt = $this->db->query($sql);

        if($stmnt->num_rows() > 0){
            return $stmnt->result();
        }
        return false;
    }


    public function displayTeamsByGameID($gameID)
    {
        #TODO add check to prevent submission where tournament has started
        $sql = "SELECT * FROM schedule WHERE gameID = '$gameID'";
        $stmnt = $this->db->query($sql);

        if($stmnt->num_rows() > 0){
            foreach ($stmnt->result_array() as $row) {
                $weekNum = $row['weekNum'];
                $sport = $row['sport'];
                $tournament = $row['tournament'];
            }
        } else {
            return false;
        }
        $sql = "SELECT * FROM schedule WHERE weekNum = '$weekNum' AND sport = '$sport' AND tournament = '$tournament' ORDER BY gameTimeEastern ASC";
        $stmnt = $this->db->query($sql);
        if($stmnt->num_rows() > 0){
            return $stmnt->result();
        }//if
        return false;
    }
}


