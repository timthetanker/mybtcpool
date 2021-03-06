<?php

#TODO change pick format for soccer, cricket etc
class Games extends CI_Controller {
    /*public $upcoming = array();*/
    public function make_selections($page = '')
{
    /* if(!file_exists(APPPATH . '/views/games/'.$page.'.php')){
          show_404();
          echo 'ERROR...SENT WE ARE ALREADY WORKING ON IT! PLEASE TRY AGAIN IN 5-MINS';
      }*/

    $data['title'] = 'Make Your PicksModel';
    $data['gameID'] = $this->games_model->getSelectedGame($this->uri->segment(3));
    $data['allGames'] = $this->games_model->displayTeamsByGameID($this->uri->segment(3));
    $data['sportType'] = $this->games_model->get_sport($this->uri->segment(3));
    $sport = $this->games_model->get_sport($this->uri->segment(3));
    $data['homeAwayID'] = $this->games_model->getHomeAwayID($this->uri->segment(3));
    //var_dump($data['ids']);

    //<START> test get svg teams
    foreach ($data['gameID'] as $team) {
        echo $team->homeID;
    }
    //</END> test

    $this->load->view('templates/header', $data);
    //link sport to correct view. Example Soccer will have a different view than Cricket
    if($data['sportType'] == 'soccer'){
        $page = 'soccer_selections';
        $this->load->view('games/' . $page, $data);
    } else {
        $page = 'make_selections';
        $this->load->view('games/' . $page, $data);
    }
    //$this->load->view('templates/upcoming_fixtures_tbl', $data['games']);
    $this->load->view('templates/footer', $data);
    }

    public function record_picks()
    {
        date_default_timezone_set('Africa/Johannesburg');
        if(!file_exists(APPPATH . '/views/games/record_picks.php')){
            show_404();
            echo 'ERROR...SENT WE ARE ALREADY WORKING ON IT! PLEASE TRY AGAIN IN 5-MINS';
        }
        $data['title'] = 'Saving PicksModel';
        $data['tournament'] = $tournament = $this->input->post('tournament')[0];
        $data['round'] = $round = $this->input->post('round')[0];
        //Ensure tournament and round is set
        if(!isset($data['tournament']) || !isset($data['round'])){
            show_error('ERROR, PLEASE CONTACT ADMINISTRATOR, OR TRY AGAIN');
        }

        #TODO get user timezone and determine difference from game timezone
        #TODO timezone must be 100% ACCURATE to prevent tamperings

        $curTime = date('H:i:s');
        $curDate = date('Y-m-d');

        //HERE WE CHECK iF EVENT HAS STARTED IF YES STOP else PROCEED
        #TODO in dashboard if current event is in progress, show next round rather than current in progress round
        #TODO re-enable disabling currently for debugging
        $hasStarted = $this->games_model->has_started($data['tournament'], $data['round']);
        /* foreach ($hasStarted as $index => $game) {
              $timeAndDate = explode(' ', $game->gameTimeEastern);
              $eventDate = $timeAndDate[0];
              //var_dump($eventDate);
              $eventTime = $timeAndDate[1];
              if(strtotime($curDate) > strtotime($eventDate)){
                  echo '<h1> SORRY, CURRENT EVENT HAS ALLREADY STARTED</h1>';
                  die();
              }//if
              else if(strtotime($eventDate) == strtotime($curDate) && strtotime($curTime) >= strtotime($eventTime)){
                  echo '<h1>SORRY, CURRENT ROUND ALLREADY STARTED</h1>';
                  die();
              }//else if
          }*/

        //ONLY ONE ENTRY ALLOWED PER PLAYER
        //HERE WE CHECK IF PLAYER HAS ENTERED OR NOT
        #TODO update balance when user enters
        $data['userID'] = $this->session->userID;
        $hasEntered = $this->games_model->hasEntered($data['userID'], $data['tournament'], $data['round']);
        if($hasEntered === true){

            $getPicks = $this->games_model->getPicks($data['userID'], $data['tournament'], $data['round']);
            $data['recordedPicks'] = $getPicks;
            $this->load->view('templates/header', $data);
            $this->load->view('games/has_entered', $data);
            //$this->load->view('templates/upcoming_fixtures_tbl', $data['games']);
            $this->load->view('templates/footer', $data);
        }
        if($hasEntered === false){
            foreach ($this->input->post('gameID') as $id => $game) {

                //GETTING SELECTIONS ADDING TO ARRAY
                $data['picks'][$id] = array('pick' => $this->input->post('picks')[$id], 'gameID' => $this->input->post('gameID')[$id], //match Id
                    'points' => $this->input->post('score')[$id], //score;
                    'tournament' => $tournament = $this->input->post('tournament')[$id], 'weekNum' => $this->input->post('round')[$id]);
            }
            //Charge for picks #TODO add a check if user has enough funds to enter!!!!!
            echo $this->games_model->update_balance($this->session->userID);
            //Transfering data to Model #TODO try catch to confirm picks uploaded
            echo $this->games_model->record_picks($data['picks']);

            $this->load->view('templates/header', $data);
            $this->load->view('games/record_picks', $data);
            //$this->load->view('templates/upcoming_fixtures_tbl', $data['games']);
            $this->load->view('templates/footer', $data);
        }
    }
}//class
