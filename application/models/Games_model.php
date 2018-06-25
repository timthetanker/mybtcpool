<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 19/05/2018
 * Time: 06:26
 */
/*
 * STACKOVERFLOW EXAMPLE SCRIPT
 * SELECT s.*,
       t1.teamId as homeId_teamId,
       t1.teamCode as homeId_teamCode,
       t1.teamName as homeId_teamName,
       t2.teamId as visitorId_teamId,
       t2.teamCode as visitorId_teamCode,
       t2.teamName as visitorId_teamName
FROM Schedule s
LEFT JOIN Teams t1 ON s.homeId = t1.teamName
LEFT JOIN Teams t2 ON s.visitorId = t2.teamName;
 *

 *
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

    public function get_sport($gameID)
    {
        $this->db->select('sport');
        $this->db->from('schedule');
        $this->db->where('gameID', $gameID);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row()->sport;
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

    public function getHomeAwayID($gameID)
    {
        $sql = "SELECT s.*,
       t1.teamId as homeId_teamId,
       t1.teamCode as homeId_teamCode,
       t1.teamName as homeId_teamName,
       t2.teamId as visitorId_teamId,
       t2.teamCode as visitorId_teamCode,
       t2.teamName as visitorId_teamName      
FROM Schedule s
LEFT JOIN Teams t1 ON s.homeId = t1.teamName
LEFT JOIN Teams t2 ON s.visitorId = t2.teamName
WHERE  gameID = '$gameID' ";
        $stmnt = $this->db->query($sql);
        if($stmnt->num_rows() > 0){
            return $stmnt->result();
        }
    }

    public function getHomeID($weekNum)
    {
        $sql = "SELECT schedule.*, teams.* FROM schedule
           JOIN teams ON schedule.homeID = teams.teamName
           WHERE schedule.gameID = '$weekNum'";
        $stmnt = $this->db->query($sql);
        if($stmnt->num_rows > 0){
            $homeID = $stmnt->row()->teamID;

            return $homeID;
        }
    }

    public function getAwayID($weekNum)
    {
        $sql = "SELECT schedule.*, teams.* FROM schedule
           JOIN teams ON schedule.visitorID = teams.teamName
           WHERE schedule.gameID = '$weekNum'";
        $stmnt = $this->db->query($sql);
        if($stmnt->num_rows > 0){
            $awayID = $stmnt->row()->teamID;
            return $awayID;
        }
    }

    public function IDS($weekNum)
    {
        $homeID = $this->getHomeID($weekNum);
        $visitorID = $this->getAwayID($weekNum);
        $ids[0] = $homeID;
        $ids[1] = $visitorID;
        return $ids;
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
        $sql = "SELECT s.*,
       t1.teamId as homeId_teamId,
       t1.teamCode as homeId_teamCode,
       t1.teamName as homeId_teamName,
       t2.teamId as visitorId_teamId,
       t2.teamCode as visitorId_teamCode,
       t2.teamName as visitorId_teamName      
FROM Schedule s
LEFT JOIN Teams t1 ON s.homeId = t1.teamName
LEFT JOIN Teams t2 ON s.visitorId = t2.teamName 
WHERE weekNum = '$weekNum' AND tournament = '$tournament' ORDER BY gameTimeEastern ASC";
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

    public function get_team_ID($hID)
    {
        $sql = "SELECT schedule.homeID, schedule.visitorID, teams.teamName, teams.teamCode 
                FROM schedule
                JOIN teams ON teams.teamName = '$hID'";
        $stmnt = $this->db->query($sql);
        if($stmnt->num_rows > 0){
            $teams = array();
            foreach ($stmnt->result_array() as $team) {
                $teams = array('teamName' => $team['teamcode']);
            }
            return $teams;
        }//if
        return false;
    }
}//classs



