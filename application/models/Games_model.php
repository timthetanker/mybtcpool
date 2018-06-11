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


    /* public function displayTeamsByGameID($gameID)
     {
         #TODO add check to prevent submission where tournament has started
         /*$sql = "SELECT schedule.*, teams.* FROM schedule
               JOIN teams ON schedule.homeID = teams.teamCode OR schedule.visitorID = teams.teamCode
               WHERE schedule.gameID = '$gameID'";*/
    /* $sql ="select * from schedule s
      INNER join teams t1 on s.homeID = t1.teamCode
      INNER JOIN teams t2 on s.visitorID = t2.teamCode
      WHERE "

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
     $sql = "SELECT schedule.*, teams.* FROM schedule
           JOIN teams ON schedule.homeID = teams.teamCode OR schedule.visitorID = teams.teamCode
           WHERE schedule.weekNum = '$weekNum' AND tournament = '$tournament' ORDER BY gameTimeEastern ASC";
     //$sql = "SELECT * FROM schedule WHERE weekNum = '$weekNum' AND sport = '$sport' AND tournament = '$tournament' ORDER BY gameTimeEastern ASC";
     $stmnt = $this->db->query($sql);
     if($stmnt->num_rows() > 0){
         return $stmnt->result();
     }//if
     return false;
 }*/


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

    public function record_picks($data)
    {
        foreach ($data as $key => $value) {
            $userID = $this->session->userID;
            $pickedTeam = $value['pick'];
            $gameID = $value['gameID'];
            $points = $value['points'];
            $tournament = $value['tournament'];
            $weekNum = $value['weekNum'];


            $sql = "INSERT INTO picks(userID, gameID, points, sport, tournament, weekNum, pick) 
                    VALUES ('$userID', '$gameID', '$points', 'rugby', '$tournament',  '$weekNum', '$pickedTeam') ";
            $stmnt = $this->db->query($sql);


            foreach ($value as $pick) {
                $pick;
            }
        }
    }

    public function get_balance($userID)
    {
        $this->db->select('balance');
        $this->db->from('users');
        $this->db->where('userID', $userID);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row()->balance;
        }

        return false;
    }

    public function update_balance($userID)
    {
        $balance = $this->get_balance($userID);

        $newBalance = !empty($balance) ? ($balance - 50) : NULL;
        var_dump($newBalance);
        echo '<h1>' . $newBalance . '</h1>';

        $this->db->where("userID", $userID);
        $this->db->update('users', ['balance' => $newBalance]);
    }


    public function has_started($tournament, $round)
    {

        $sql = "SELECT * FROM schedule WHERE tournament = '$tournament' AND weekNum = '$round'";
        $stmnt = $this->db->query($sql);
        if($stmnt->num_rows() > 0){
            return $stmnt->result();
        }
        return false;
    }

    //check if user has enetred competition
    public function hasEntered($userID, $tournament, $weekNum)
    {
        $sql = "select * FROM picks
			WHERE userID = '$userID' AND tournament = '$tournament' AND weekNum = '$weekNum'";
        $stmnt = $this->db->query($sql);
        if($stmnt->num_rows() > 0){
            return true;
        }
        return false;
    }

    //get picks for specific tournament
    public function getPicks($userID, $tournament, $weekNum)
    {
        $sql = "select * FROM picks
			WHERE userID = '$userID' AND tournament = '$tournament' AND weekNum = '$weekNum'";
        $stmnt = $this->db->query($sql);
        if($stmnt->num_rows() > 0){
            return $stmnt->result();
        }
        return false;
    }
}//classs



