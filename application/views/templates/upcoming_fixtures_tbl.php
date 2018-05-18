<style>
@media (min-width: 768px) {
    .col-sm-push-3 {
        left: 10%;
    }
}
</style>

    <script  type="text/javascript">
$(document).ready(function () {
    $('[data-toggle="offcanvas"]').click(function () {
        $('.row-offcanvas').toggleClass('active')
        });
});
</script>


<style>
    .fw-feed-title {
    font-weight: bold;
        font-size: 16px;
        margin: 0 20px;
        padding: 15px 0 15px 0;
        word-wrap: break-word;
        border-bottom: 1px solid #dbdee1;

    }
    .upcoming-fixtures-btn{
    background:none!important;
        color:inherit;
        border:none;
        padding:0!important;
        font: inherit;
        /*border is optional*/
        cursor: pointer;
        text-decoration: underline;

    }
    .upcoming-fixtures-btn:hover{
    color:blue;
}
</style>



<div id="top-wrapper">
    <div class="top-news-feed">
        <!-- start feedwind code -->
        <!--<script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" data-fw-param="60542/"></script>-->
        <!-- end feedwind code -->
    </div>
    <div class="top-tournaments">
        <div class="fw-feed-title">
        <a href="#">Upcoming Games</a>
        </div>

        <form method="post" id="fixtures-form" name="fixtures-form" action="">
        <?php
        //cur date


        /*function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
        {
            $datetime1 = date_create($date_1);
            $datetime2 = date_create($date_2);

            $interval = date_diff($datetime1, $datetime2);

            return $interval->format($differenceFormat);

        }*/

        foreach ($games as $game) {
            $start_date = new DateTime(date('Y-m-d G:i:s'));
            $since_start = $start_date->diff(new DateTime($game->gameTimeEastern));
            $eventDate = strtotime($game->gameTimeEastern);
            $newEventDate = date('d M', $eventDate);
            ?>


            <div class="fixure-dates">
                <div class="fixture-calendar">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php// #TODO implemnt function echo dateDayMonthName($game['gameTimeDate']) ?>
                </div>
            </div>
            <div class="card">

                <div class="sport-type">
                    <img src="<?php echo base_url('public/imgs/sport/'.$game->sport); ?>.png" alt="<?php echo $game->sport ?>/>
                </div>

                <div class="event-time" style="width: 95px">
                    <div class="abreviation">
                        Payout <span class="countdown">R <?php echo getPoolPayout($game->tournament, $game->weekNum)['nrPlayers'] ?><?php $game->weekNum ?></span>
                    </div>
                </div>
                <div class="fixtures">
                    <div class="fixtures-inner">
                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="hidden" value="<?php echo $game->gameID ?>" name="gameID[]" />
                                </td>
                                <td style="width: 0">
                                    <a style="cursor: pointer" href="../games/make_selections/<?php echo $game->gameID ?>" title="Enter Pool">  <?php echo $game->tournament ?>  </a>
                                </td>
                                <td style="width: 0">
                                    <small>Starts In <span class="timeSpan"><?php echo $since_start->days ?></span> Days & <span class="timeSpan"><?php  echo $since_start->h ?></span>Hours<small>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div><!--CARD-->
            <?php
        }
        ?>
</form>
</div><!--./RIGHT PANEL TOURNAMENTS-->
</div><!-- #/ TOP WRAPPER -->
<div style="background: white; height: 500px; width: 100%">

