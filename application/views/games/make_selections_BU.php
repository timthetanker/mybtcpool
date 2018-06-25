<?php echo $title ?>


<?php
/*foreach($gameID as $game){
    echo $game->gameID;
}*/

?>
<script>
    $(document).ready(function () {

        //Monitor change of team/draw
        $(':radio').change(function (e) {
            var selectBox = $(this).siblings("select");
            if ($(this).val() == "Draw" && selectBox.val() !== '0') {
                selectBox.val('');
            }
            updateDiv();
        });

        //Monitor change of select
        $('select').change(function (e) {

            var theRadios = $(this).siblings(":radio");

            //Check for draw condition
            if ($(this).val() == '') {
                //Change team/draw radios to draw
                theRadios.filter(':input[value="Draw"]').prop('checked', true);

                //Select indicates it is not a draw, clear draw status
            } else if (theRadios.filter(':checked').val() == "Draw") {
                theRadios.prop('checked', false);
            }
            updateDiv();
        });
    });

    /*
     * (re)draw the div HTML
     */
    function updateDiv() {
        //clear the div
        $('#dispPicks').html('');
        //update the div
        $(':radio:checked').each(function (ind, ele) {
            var selectBoxVal = $(this).closest('div.team').find('select').val();
            selectBoxVal = selectBoxVal != '' ? "By " + selectBoxVal : selectBoxVal;
            $('#dispPicks').append($(ele).val() + "  " + selectBoxVal + '<br/>');
        });
    }
</script>
<div class="container">

    <?php echo form_open('games/record_picks'); ?>
    <?php

    if(!isset($gameID)){
        DIE("OOOPS, AN ERROR OCCURRED. PLEASE TRY AGAIN IN 2-MINS");
    }
    //$games = displayTeamsByGameID($gameID); #TODO VERYIFY FUNCTION TO NEW IMPLEMENTATION
    foreach ($allGames as $key => $game) {
        var_dump($homeAwayID)
        ?>
        <div class="row">
            <div class="col-md-8 col-lg-8 col-sm-12">
                <div class="card-header">
                    <div class="venue">
                        <img class="venue-img"
                             src="https://superbru-cdn.scdn3.secure.raxcdn.com/coreimages/venue/35_1286895450.jpg">
                        <div class="venue-name">
                            <?php echo '#TODO add stadiums table' ?>
                        </div>
                        <div class="venue-details">
                            <?php echo '#TODO add stadiums info' ?>
                        </div>
                    </div>
                    <div class="date hide-desktop">
                        <?php
                        $gameDate = strtotime($game->gameTimeEastern);
                        $gameDateFormat = date('d M H i', $gameDate);
                        echo $gameDateFormat;
                        ?>
                    </div>
                    <div class="date hide-mobile">
                        <?php
                        $gameDate = strtotime($game->gameTimeEastern);
                        $gameDateFormat = date('D d M H i', $gameDate);
                        echo $gameDateFormat;
                        ?>
                    </div>
                </div>
                <?php // STYLE DISPLAY NONE INPUTS
                ?>
                <input type="hidden" style="display: none" name="gameID[]" value="<?php echo $game->gameID ?>"/>
                <input type="hidden" style="display: none" name="tournament[]" value="<?php echo $game->tournament ?>"/>
                <input type="hidden" style="display: none" name="round[]" value="<?php echo $game->weekNum ?>"/>
                <input type="hidden" style="display: none" name="event_date[]"
                       value="<?php echo $game->gameTimeEastern ?>"/>
                <input type="hidden" style="display: none" name="awayTeam[]" value="<?php echo $game->homeID ?>"/>
                <input type="hidden" style="display: none" name="homeTeam[]" value="<?php echo $game->visitorID ?>"/>


                <?php //*END STYLE DISPLAY NONE INPUTS
                ?>
                <div class="match-card">
                    <div class="content-inner">
                        <div class="home-team">
                            <?php $homeTeam = $game->homeID;
                            ucfirst($homeTeam);
                            if($game->sport == 'soccer'){
                                $extension = '.svg';
                                $img = "<svg height='200px' width='200px' xmlns:" . base_url('public/imgs/svgs/' . $homeTeam) . ".svg</svg>";

                            } else {
                                $img = "<img src=" . base_url('public/imgs/teams/' . $homeTeam) . ".gif  alt='$homeTeam'/>";
                            }
                            ?>

                            <?php echo $img ?>
                            <br/>

                            <div class="team-name"><?php echo $game->homeID ?></div>
                        </div>
                        <div class="selector">
                            <div id="teams">
                                <label class="homeTeam">
                                    <input type="radio" name="picks[<?php echo $key ?>]"
                                           value="<?php echo $game->homeID ?>">
                                    <span><?php echo $game->homeID ?></span>
                                </label>
                                <br/>
                                <br/>
                                <label class="awayTeam">
                                    <input type="radio" name="picks[<?php echo $key ?>]"
                                           value="<?php echo $game->visitorID ?>"/>
                                    <span><?php echo $game->visitorID ?></span>
                                </label>
                                <br/>
                                <br/>
                                <label class="draw">
                                    <input type="radio" name="picks[<?php echo $key ?>]" value="Draw">
                                    <span>Draw</span>
                                </label>
                                <br/>
                                <b>BY</b>
                                <select name="score[<?php echo $key ?>]" style="" class="score-selector">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                </select>
                                <b>POINTS</b>
                            </div>
                        </div>
                        <div class="away-team">
                            <?php $awayTeam = $game->visitorID;
                            ucfirst($awayTeam);
                            ?>
                            <img src="<?php echo base_url('public/imgs/teams/' . $awayTeam); ?>.gif"
                                 alt="<?php echo $homeTeam ?>"/>
                            <br/>
                            <div class="team-name">
                                <?php echo $game->visitorID ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 mini-log">
                <div class="card-header">
                    <h4>Standings</h4>
                </div>
                <div class="match-card">
                    <table class="data max slim mini-log-scrollable">
                        <tbody>
                        <tr>
                            <th colspan="2"></th>
                            <th class="text-center" data-tooltip="Won">W</th>
                            <th class="text-center" data-tooltip="Lost">L</th>
                            <th class="text-center" data-tooltip="Drawn">D</th>
                            <th class="text-center" data-tooltip="Points">Pts</th>
                        </tr>
                        <tr onclick="bru.ui.openStreak(540,15)">
                            <td class="text-center">-</td>
                            <td>
                                <div class="ellipsis ellipsis100">England</div>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(540,16)">
                            <td class="text-center">-</td>
                            <td>
                                <div class="ellipsis ellipsis100">France</div>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(540,17)">
                            <td class="text-center">-</td>
                            <td>
                                <div class="ellipsis ellipsis100">Ireland</div>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(540,18)">
                            <td class="text-center">-</td>
                            <td>
                                <div class="ellipsis ellipsis100">Italy</div>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(540,19)">
                            <td class="text-center">-</td>
                            <td>
                                <div class="ellipsis ellipsis100">Scotland</div>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(540,20)">
                            <td class="text-center">-</td>
                            <td>
                                <div class="ellipsis ellipsis100">Wales</div>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-gap">
        </div>
        <?php
    }
    ?>
    <style>
        #dispPicks {
            font-size: 1.3em;
            padding: 10px 0px 10px 10px;
            color: #dd0000;
        }

        .submitBtn {

        }

    </style>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div id="dispPicks"></div>
            <button type="submit" class="btn btn-primary submitBtn" name="submitBtn">Submit Picks</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
