<?php echo $title ?>


<?php
foreach ($gameID as $game) {
    echo $game->gameID;
}
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
<style type="text/css">
    .match-card .experts-detail .top {
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
        -webkit-justify-content: space-between;
        justify-content: space-between
    }

    .match-card .experts-detail .top .fa-angle-up {
        font-size: 2em;
        cursor: pointer;
        -webkit-transition: all .15s ease;
        -moz-transition: all .15s ease;
        -o-transition: all .15s ease;
        transition: all .15s ease
    }

    .match-card .experts-detail .top .fa-angle-up:hover {
        color: #3498db
    }

    .match-card .card-content {
        position: relative
    }

    .match-card .card-content .game-notice {
        padding: 5px;
        background: #f3f5f7;
        color: #34495e;
        font-size: .9em
    }

    .match-card .card-content .game-notice .last {
        color: #7f8c8d;
        margin-left: 5px;
        font-size: .9em
    }

    @media (min-width: 1024px) {
        .match-card .card-content .game-notice {
            margin: 10px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px
        }
    }

    .match-card .card-content .card-content-inner {
        padding: 10px;
        position: relative;
        text-align: center
    }

    @media (min-width: 1024px) {
        .match-card .card-content .card-content-inner {
            padding: 15px
        }
    }

    .match-card .card-content .card-content-inner .wp-val {
        font-size: .8em;
        color: #7f8c8d;
        margin-bottom: 5px
    }

    .match-card .card-content .card-content-inner .goal-report {
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-justify-content: space-between;
        justify-content: space-between
    }

    .match-card .card-content .card-content-inner .goal-report .goals-scored {
        min-width: 140px;
        font-size: .85em;
        text-align: center
    }

    .match-card .card-content .card-content-inner .goal-report .goals-scored div {
        padding: 3px 0 3px 0;
        text-align: center
    }

    .match-card .card-content .card-content-inner .goal-report .goals-scored:first-child {
        padding-left: 20px
    }

    .match-card .card-content .card-content-inner .goal-report .goals-scored:last-child {
        padding-right: 20px
    }

    .match-card .card-content .card-content-inner .team-area {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-justify-content: space-around;
        justify-content: space-around;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center
    }

    .match-card .card-content .card-content-inner .team-area .score {
        font-size: 2.3em
    }

    .match-card .card-content .card-content-inner .team-area .score.cricket {
        font-size: 1.5em
    }

    .match-card .card-content .card-content-inner .team-area .team {
        text-align: center
    }

    .match-card .card-content .card-content-inner .team-area .team .flag-icon {
        font-size: 3em;
        margin: 0 0 5px 0
    }

    @media (min-width: 1094px) {
        .match-card .card-content .card-content-inner .team-area .team .flag-icon {
            font-size: 3.8em
        }
    }

    .match-card .card-content .card-content-inner .team-area .team img {
        width: 60px;
        height: 45px;
        margin: 0 0 5px 0
    }

    @media (min-width: 1024px) {
        .match-card .card-content .card-content-inner .team-area .team img {
            width: 100px;
            height: 75px
        }
    }

    @media (min-width: 1024px) {
        .match-card .card-content .card-content-inner .team-area .team img {
            width: 100px;
            height: 75px
        }
    }

    .match-card .card-content .card-content-inner .team-area .team .name {
        font-size: .9em;
        overflow-x: hidden;
        overflow-y: hidden;
        text-overflow: ellipsis;
        height: 32px;
        width: 73px;
        margin: 0 auto;
        vertical-align: middle;
        line-height: 1.2em
    }

    .match-card .card-content .card-content-inner .team-area .team .name.sevens {
        height: auto
    }

    @media (min-width: 1024px) {
        .match-card .card-content .card-content-inner .team-area .team .name {
            width: 100px
        }
    }

    .match-card .card-content .cricket-live-score {
        font-size: 1em;
        padding: 10px 0 0 0;
        -webkit-animation: cricket-live-pulse 1s ease-out;
        -webkit-animation-iteration-count: infinite
    }

    @-webkit-keyframes cricket-live-pulse {

    0
    {
        opacity: 1.0
    }

    50
    %
    {
        opacity: .75
    }

    100
    %
    {
        opacity: 1.0
    }
    }

    .match-card .card-content .picker-pre-match {
        align-self: flex-start;
        -webkit-align-self: flex-start
    }

    .match-card .card-content .post-status {
        align-self: flex-start;
        -webkit-align-self: flex-start;
        margin: 0 0 18px 0;
        color: #95a5a6;
        font-size: .8em;
        font-style: italic
    }

    .match-card .card-content .post-status .date {
        margin: 0
    }

    .match-card .card-content .post-status.hide-mobile {
        display: none
    }

    @media (min-width: 1024px) {
        .match-card .card-content .post-status.hide-mobile {
            display: block
        }
    }

    .match-card .card-content .soccer-picker-balls .you {
        font-size: .8em;
        color: #7f8c8d;
        padding: 0;
        text-align: center
    }

    .match-card .card-content .soccer-picker-balls .inputs {
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
        -webkit-justify-content: space-between;
        justify-content: space-between
    }

    .match-card .card-content .soccer-picker-balls .inputs .divider {
        width: 30px;
        font-size: 1.2em;
        color: #7f8c8d
    }

    .match-card .card-content .soccer-picker-balls .inputs .goals {
        width: 40px;
        height: 96px;
        overflow: hidden;
        text-align: center;
        position: relative
    }

    .match-card .card-content .soccer-picker-balls .inputs .goals .container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        -webkit-transition: all .25s ease;
        -moz-transition: all .25s ease;
        -o-transition: all .25s ease;
        transition: all .25s ease
    }

    .match-card .card-content .soccer-picker-balls .inputs .goals .container .goal {
        width: 22px;
        height: 22px;
        background: #c3d7d9;
        color: #0f161c;
        -webkit-border-radius: 30px;
        -moz-border-radius: 30px;
        border-radius: 30px;
        font-size: .9em;
        font-weight: bold;
        line-height: 22px;
        margin: 0 auto;
        margin-bottom: 2px;
        cursor: pointer;
        -webkit-transition: all .25s ease;
        -moz-transition: all .25s ease;
        -o-transition: all .25s ease;
        transition: all .25s ease
    }

    .match-card .card-content .soccer-picker-balls .inputs .goals .container .goal:hover, .match-card .card-content .soccer-picker-balls .inputs .goals .container .goal.selected {
        font-size: 1.2em;
        color: #fff;
        background: #95a5a6
    }

    .match-card .card-content .soccer-picker-balls .inputs .goals .container .goal.selected {
        background: #0f161c;
        color: #fff
    }

    .match-card .card-content .soccer-picker-balls .inputs .goals .container .goal.unselected {
        background: #ecf0f1;
        color: #95a5a6
    }

    .match-card .card-content .pick-status {
        border: 1px solid #fff;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        height: 50px
    }

    .match-card .card-content .pick-status .date {
        font-size: .8em;
        color: #27ae60
    }

    .match-card .card-content .pick-status a.lock-link {
        font-size: .8em;
        padding: 3px 0 0 0;
        color: #677273;
        text-decoration: underline
    }

    .match-card .card-content .pick-status a.lock-link:hover {
        color: #3498db
    }

    .match-card .card-content .pick-status .lock-status {
        margin: 8px 0 2px 0
    }

    .match-card .card-content .pick-status .lock-status i {
        font-size: 1.5em;
        cursor: pointer
    }

    .match-card .card-content .pick-status .lock-status i.pulse {
        -webkit-animation: save-pulse 1s ease-out;
        -webkit-animation-iteration-count: infinite;
        color: #d35400
    }

</style>

<div class="container">
    <div class="row">
        <!--bro test start-->
        <div class="col-md-12">

            <div class="card-content">
                <div class="card-content-inner">
                    <div class="team-area">
                        <div class="team">
                            <span class="flag-icon flag-icon-eg flag-icon-squared"></span>
                            <div class="name sevens">Egypt</div>
                        </div>
                        <div class="picker" id="picker2"
                             data-bru-token="wymD2Fv8hyC6W5H5fmXzVaw6nTQboJftNwxC28xEpeGe1u7H+Q==">
                            <div class="soccer-picker" id="soccer-picker2" data-bru-game-id="2" data-bru-existing="3-2"
                                 data-bru-left-comm="9.48" data-bru-right-comm="72.35">
                                <div class="goals left" data-bru-game-id="2">
                                    <input maxlength="2" class="editable-dropdown soccer-left-score" type="text"
                                           data-bru-colour="000000" data-bru-text-colour="FFFFFF" value="3"
                                           data-bru-team-name="Egypt" tabindex="3" onclick="">
                                    <div class="mobile-input" data-bru-colour="000000" data-bru-text-colour="FFFFFF"
                                         data-bru-team-name="Egypt" data-locked="0">3
                                    </div>
                                    <div class="options editable-dropdown" style="display: block;">
                                        <div class="goal goal0 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;left&quot;,0;)">0
                                        </div>
                                        <div class="goal goal1 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;left&quot;,1;)">1
                                        </div>
                                        <div class="goal goal2 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;left&quot;,2;)">2
                                        </div>
                                        <div class="goal goal3 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;left&quot;,3;)">3
                                        </div>
                                        <div class="goal goal4 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;left&quot;,4;)">4
                                        </div>
                                        <div class="goal goal5 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;left&quot;,5;)">5
                                        </div>
                                        <div class="goal goal6 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;left&quot;,6;)">6
                                        </div>
                                        <div class="goal goal7 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;left&quot;,7;)">7
                                        </div>
                                        <div class="goal goal8 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;left&quot;,8;)">8
                                        </div>
                                        <div class="goal goal9 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;left&quot;,9;)">9
                                        </div>
                                        <div class="goal goal10 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;left&quot;,10;)">10
                                        </div>
                                        <div class="goal goal11 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;left&quot;,11;)">11
                                        </div>
                                        <div class="goal goal12 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;left&quot;,12;)">12
                                        </div>
                                    </div>
                                </div>
                                <div class="v">-</div>
                                <div class="goals right" data-bru-game-id="2">
                                    <input maxlength="2" class="editable-dropdown soccer-right-score"
                                           data-bru-colour="ABCCF4" data-bru-text-colour="000000" type="text" value="2"
                                           data-bru-team-name="Uruguay" tabindex="4">
                                    <div class="mobile-input" data-bru-colour="ABCCF4" data-bru-text-colour="000000"
                                         data-bru-team-name="Uruguay" data-locked="0">2
                                    </div>
                                    <div class="options editable-dropdown">
                                        <div class="goal goal0 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;right&quot;,0;)">0
                                        </div>
                                        <div class="goal goal1 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;right&quot;,1;)">1
                                        </div>
                                        <div class="goal goal2 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;right&quot;,2;)">2
                                        </div>
                                        <div class="goal goal3 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;right&quot;,3;)">3
                                        </div>
                                        <div class="goal goal4 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;right&quot;,4;)">4
                                        </div>
                                        <div class="goal goal5 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;right&quot;,5;)">5
                                        </div>
                                        <div class="goal goal6 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;right&quot;,6;)">6
                                        </div>
                                        <div class="goal goal7 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;right&quot;,7;)">7
                                        </div>
                                        <div class="goal goal8 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;right&quot;,8;)">8
                                        </div>
                                        <div class="goal goal9 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;right&quot;,9;)">9
                                        </div>
                                        <div class="goal goal10 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;right&quot;,10;)">10
                                        </div>
                                        <div class="goal goal11 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;right&quot;,11;)">11
                                        </div>
                                        <div class="goal goal12 "
                                             onclick="brupicks.soccer.setGoal(2,&quot;right&quot;,12;)">12
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="save-status tall"></div>
                            <div class="pick-status cricket">
                                <div class="lock-status unlocked" onclick="brupicks.lockPick(2,565)"><i
                                            class="lock-icon2 fa fa-unlock-alt" aria-hidden="true"></i></div>
                                <div class="date">Saved 14 Jun 20:04</div>
                                <div><a href="javascript:void(0)" onclick="brupicks.lockPick(2,565)" class="lock-link">Lock
                                        Pick</a></div>
                            </div>
                        </div>
                        <div class="team">
                            <span class="flag-icon flag-icon-uy flag-icon-squared"></span>
                            <div class="name sevens">Uruguay</div>
                        </div>
                    </div>
                    <div class="goal-report">
                        <div class="goals-scored"></div>
                        <div class="goals-scored"></div>
                    </div>
                </div>
            </div>


        </div>
        <!--./BRO TEST -->

        <div class="col-md-6 col-sm-12 hteam">
            TEAM 1
        </div>
        <div class="col-md-6 col-sm-12 ateam">
            TEAM 2
        </div>
    </div>
</div>