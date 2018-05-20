<?php

class Games extends CI_Controller {
    /*public $upcoming = array();*/
    public function make_selections($page = 'make_selections')
{
   if(!file_exists(APPPATH . '/views/games/'.$page.'.php')){
        show_404();
        echo 'ERROR...SENT WE ARE ALREADY WORKING ON IT! PLEASE TRY AGAIN IN 5-MINS';
    }

    $data['title'] = 'Make Your Picks';
    $data['gameID'] = $this->games_model->getSelectedGame($this->uri->segment(3));
    $data['allGames'] = $this->games_model->displayTeamsByGameID($this->uri->segment(3));
    var_dump($data['gameID']);
    $this->load->view('templates/header', $data);
    $this->load->view('games/'.$page, $data);
    //$this->load->view('templates/upcoming_fixtures_tbl', $data['games']);
    $this->load->view('templates/footer', $data);
    }

    public function record_picks(){
        date_default_timezone_set('Africa/Johannesburg');
        if(!file_exists(APPPATH . '/views/games/record_picks.php')){
            show_404();
            echo 'ERROR...SENT WE ARE ALREADY WORKING ON IT! PLEASE TRY AGAIN IN 5-MINS';
        }
        $data['title'] = 'Uploading Your Selections';
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
        $hasStarted = $this->games_model->has_started($data['tournament'], $data['round']);
        foreach ($hasStarted as $index => $game) {
            $game['gameTimeEastern'];
        }

        $data['picks'] = array();
        //GETTING SELECTIONS ADDING TO ARRAY
        foreach ($this->input->post('picks') as $id => $winner) {
            $data['picks'][$id] = array('pick' => $teamsel[] = $winner, 'gameID' => $this->input->post('gameID')[$id], //match Id
                'points' => $this->input->post('score')[$id], //score;
                'tournament' => $tournament = $this->input->post('tournament')[$id], 'weekNum' => $this->input->post('round')[$id]);
        }
        //Transfering data to Model
        $this->games_model->record_picks($data['picks']);

        $this->load->view('templates/header', $data);
        $this->load->view('games/record_picks', $data);
        //$this->load->view('templates/upcoming_fixtures_tbl', $data['games']);
        $this->load->view('templates/footer', $data);
    }
}
    /*$games[] = $this->users_model->getUpcomingGames();
    if(is_array($games)){
        foreach ($games as $game){
            $data['games'] = array('gameID' => $game['gameID'], 'weekNum' =>$game['weekNum'], 'homeID' => $game['homeID'], 'visitorID' => $game['visitorID'] );
         }
        }*/
