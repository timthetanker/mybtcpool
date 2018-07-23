<?php
if (!isset($this->session->userID)) {
    die('NOT LOGGED');
}
#var_dump($tournamentEntries);

?>
<h1>HI <?php echo ucfirst($username) ?> AS REQUESTED HERE ARE YOUR PICKS FOR <?php echo $tournamentName ?></h1>
<pre>
<?php

?>
    <style>
        .number-span {
            background-color: #000;
            color: #fff;
            font-family: Courier, serif;
            font-size: 110%;
            padding: 0px 3px 0px 3px;
            text-align: center;
            margin-right: 5px;
            border: 1px solid #333;
            border-radius: 4px;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
        }

        .page {
            padding-bottom: 100px
        }

        @media (min-width: 1024px) {
            .page {
                padding-bottom: 0;
                width: 970px;
                text-align: left;
                margin: 0 auto;
                display: inline-block;
                margin-top: 25px;
                margin-bottom: 150px
            }
        }

        @media (min-width: 1280px) {
            .page {
                margin-right: 180px
            }
        }

        @media (min-width: 1366px) {
            .page {
                margin-right: 300px
            }
        }

        @media (min-width: 1440px) {
            .page {
                margin-right: 320px
            }
        }

        @media (min-width: 1024px) {
            .page.no-right-col {
                margin-right: 0
            }
        }

        .page h1, .page h2, .page h3 {
            margin: 0 0 10px 0;
            font-weight: 300;
            color: #c0392b
        }

        .page h4 {
            margin: 0 0 5px 0;
            color: #c0392b;
            font-weight: bold
        }

        .page .mobile-padded {
            padding: 10px
        }

        @media (min-width: 1024px) {
            .page .mobile-padded {
                padding: 0
            }
        }

        .page .content {
            background: #ecf0f1;
            -webkit-border-bottom-right-radius: 3px;
            -webkit-border-bottom-left-radius: 3px;
            -moz-border-radius-bottomright: 3px;
            -moz-border-radius-bottomleft: 3px;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            text-align: left;
            padding-bottom: 80px
        }

        @media (min-width: 1024px) {
            .page .content {
                padding-bottom: 0;
                min-height: 600px
            }
        }

        .page .content .page-content {
            padding: 10px
        }

        .page .content .page-content .title.centered {
            margin: 0 0 20px 0;
            text-align: center
        }

        .page .content .page-content::after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0
        }

        .page .content .page-content.no-pad-mobile {
            padding: 0
        }

        @media (min-width: 1024px) {
            .page .content .page-content.no-pad-mobile {
                padding: 15px
            }
        }

        @media (min-width: 1024px) {
            .page .content .page-content {
                min-height: 600px;
                padding: 15px
            }

            .page .content .page-content.no-min-height {
                min-height: 0
            }
        }

        .page .content .page-content .left-col {
            display: none;
            width: 250px
        }

        .page .content .page-content.centered {
            text-align: center
        }

        .page .content .page-content.single-col .right-col {
            width: 100%
        }

        .page .content .page-content.double-col .right-col {
            width: 100%
        }

        @media (min-width: 1024px) {
            .page .content .page-content.double-col .right-col {
                float: right;
                margin-left: 250px;
                width: 670px
            }
        }

        .page .content .page-content.double-col .left-col {
            width: 250px;
            display: none;
            float: left;
            margin-right: -100%
        }

        @media (min-width: 1024px) {
            .page .content .page-content.double-col .left-col {
                display: block
            }
        }

        @media (min-width: 1024px) {
            .page .content .page-content.double-col.left160 .left-col {
                width: 160px
            }

            .page .content .page-content.double-col.left160 .right-col {
                margin-left: 160px;
                width: 760px
            }

            .page .content .page-content.double-col.left200 .left-col {
                width: 200px;
                margin-right: 0
            }

            .page .content .page-content.double-col.left200 .right-col {
                margin-left: 200px;
                width: 720px;
                float: left
            }

            .page .content .page-content.double-col.left300 .left-col {
                width: 300px
            }

            .page .content .page-content.double-col.left300 .right-col {
                margin-left: 300px;
                width: 620px
            }
        }

        .page .content .page-content.double-col.right250 .right-col {
            display: none
        }

        .page .content .page-content.double-col.right250 .left-col {
            display: block;
            width: 100%;
            float: none
        }

        @media (min-width: 1024px) {
            .page .content .page-content.double-col.right250 .right-col {
                width: 250px;
                display: block;
                margin-left: -100%;
                margin-right: 0;
                float: right
            }

            .page .content .page-content.double-col.right250 .left-col {
                width: 670px;
                margin-right: 250px;
                float: left
            }
        }

        .page .content .page-content.double-col.right300 .right-col {
            display: none
        }

        .page .content .page-content.double-col.right300 .left-col {
            display: block;
            width: 100%;
            float: none
        }

        @media (min-width: 1024px) {
            .page .content .page-content.double-col.right300 .right-col {
                width: 300px;
                display: block;
                margin-left: -100%;
                margin-right: 0;
                float: right
            }

            .page .content .page-content.double-col.right300 .left-col {
                width: 620px;
                margin-right: 300px;
                float: left
            }
        }

        .page .content .page-content.no-pad {
            padding: 0
        }

        @media (min-width: 1024px) {
            .page .content .page-content.no-pad .right-col {
                width: 720px
            }
        }

        .page .content .page-content.no-pad.left160 .left-col {
            width: 160px
        }

        @media (min-width: 1024px) {
            .page .content .page-content.no-pad.left160 .right-col {
                margin-left: 160px;
                width: 810px
            }
        }

        .page .content .page-content.no-pad.left200 .left-col {
            width: 200px
        }

        .page .content .page-content.no-pad.left200 .right-col {
            margin-left: 0
        }

        @media (min-width: 1024px) {
            .page .content .page-content.no-pad.left200 .right-col {
                width: 770px
            }
        }

        .page .content .page-content.no-pad.left300 .left-col {
            width: 300px
        }

        @media (min-width: 1024px) {
            .page .content .page-content.no-pad.left300 .right-col {
                margin-left: 300px;
                width: 670px
            }
        }

        @media (min-width: 1024px) {
            .page .content .page-content.no-pad.left300.sub-page .right-col {
                width: 620px
            }
        }

        .tab-page .tab {
            display: none;
            -webkit-transition: all .45s ease;
            -moz-transition: all .45s ease;
            -o-transition: all .45s ease;
            transition: all .45s ease
        }

        .tab-page .tab.active {
            display: block
        }

        .tab-page.margin-top {
            margin-top: 20px
        }

        .tab-page .tab-hidden {
            display: none
        }

        .col-right {
            display: none
        }

        @media (min-width: 1280px) {
            .col-right {
                display: block;
                width: 180px;
                background: #0f161c;
                padding: 20px 10px 10px 10px;
                position: fixed;
                height: 100%;
                right: 0;
                top: 0;
                z-index: 150;
                -webkit-box-shadow: -3px 0 10px 0 rgba(0, 0, 0, 0.2);
                -moz-box-shadow: -3px 0 10px 0 rgba(0, 0, 0, 0.2);
                box-shadow: -3px 0 10px 0 rgba(0, 0, 0, 0.2)
            }
        }

        @media (min-width: 1366px) {
            .col-right {
                width: 300px;
                padding: 20px 0 0 0;
                background: transparent;
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                box-shadow: none
            }
        }

        @media (min-width: 1440px) {
            .col-right {
                width: 320px;
                padding: 20px 10px 10px 10px;
                background: #0f161c;
                -webkit-box-shadow: -3px 0 10px 0 rgba(0, 0, 0, 0.2);
                -moz-box-shadow: -3px 0 10px 0 rgba(0, 0, 0, 0.2);
                box-shadow: -3px 0 10px 0 rgba(0, 0, 0, 0.2)
            }
        }

        .number-dot, .tourn-header2 .nav > ul > li > a .alert-number .num, .alert-number .num {
            height: 15px;
            min-width: 15px;
            line-height: 15px;
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
            border-radius: 20px;
            background: #e74c3c;
            color: #fff;
            font-size: .75em;
            text-align: center;
            display: block
        }

        .alert-number {
            display: inline-block;
            margin-left: 5px;
            position: relative
        }

        .alert-number .num {
            font-size: .9em;
            min-width: 18px;
            padding: 0 2px 0 2px;
            transform: scale(1);
            -ms-transform: scale(1);
            -webkit-transform: scale(1);
            -webkit-transition: all .6s ease;
            -moz-transition: all .6s ease;
            -o-transition: all .6s ease;
            transition: all .6s ease
        }

        .alert-number .num.increased {
            -webkit-animation-iteration-count: 1;
            -webkit-animation: pop .4s
        }

        @-webkit-keyframes pop {

        0
        ,
        100
        %
        {
            -webkit-transform: scale(1.3)
        }

        20
        %
        ,
        60
        %
        {
            -webkit-transform: scale(1)
        }

        40
        %
        ,
        80
        %
        {
            -webkit-transform: scale(1.3)
        }
        }

        @keyframes pop {

        0
        ,
        100
        %
        {
            transform: scale(1.3)
        }

        20
        %
        ,
        60
        %
        {
            transform: scale(1)
        }

        40
        %
        ,
        80
        %
        {
            transform: scale(1.3)
        }
        }

        .alert-number .num.decreased {
            -webkit-animation-iteration-count: 1;
            -webkit-animation: decr .4s
        }

        @-webkit-keyframes decr {

        0
        ,
        100
        %
        {
            -webkit-transform: scale(0.75)
        }

        20
        %
        ,
        60
        %
        {
            -webkit-transform: scale(1)
        }

        40
        %
        ,
        80
        %
        {
            -webkit-transform: scale(0.75)
        }
        }

        @keyframes decr {

        0
        ,
        100
        %
        {
            transform: scale(0.75)
        }

        20
        %
        ,
        60
        %
        {
            transform: scale(1)
        }

        40
        %
        ,
        80
        %
        {
            transform: scale(0.75)
        }
        }

        .alert-number .num.orange {
            background-color: #f39c12
        }

        .alert-number .num.green {
            background-color: #27ae60
        }

        .alert-number.hidden {
            display: none
        }

        .profile-premium-star {
            position: absolute;
            top: 12px;
            left: 12px;
            width: 17px;
            height: 17px;
            background-image: url("https://superbru-cdn.scdn3.secure.raxcdn.com//coreimages/structure/premium_profile_star.png");
            background-size: 17px 17px
        }

        .vodacom-comma {
            position: absolute;
            top: 12px;
            left: 12px;
            width: 17px;
            height: 17px;
            background-image: url("https://superbru-cdn.scdn3.secure.raxcdn.com//coreimages/structure/vodacom_comma.png");
            background-size: 17px 17px
        }

        img {
            vertical-align: bottom
        }

        img.rounded {
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px
        }

        img.circular {
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px
        }

        img.sq25 {
            width: 25px;
            height: 25px
        }

        img.sq40 {
            width: 40px;
            height: 40px
        }

        img.sq50 {
            width: 50px;
            height: 50px
        }

        img.sq60 {
            width: 60px;
            height: 60px
        }

        img.sq75 {
            width: 75px;
            height: 75px
        }

        img.sq80 {
            width: 80px;
            height: 80px
        }

        img.sq90 {
            width: 90px;
            height: 90px
        }

        img.sq100 {
            width: 100px;
            height: 100px
        }

        .ellipsis {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden
        }

        .ellipsis.ellipsis80 {
            max-width: 80px
        }

        .ellipsis.ellipsis90 {
            max-width: 90px
        }

        .ellipsis.ellipsis100 {
            max-width: 100px
        }

        .ellipsis.ellipsis110 {
            max-width: 110px
        }

        .drop {
            position: relative
        }

        .drop ul {
            position: absolute;
            left: 0;
            z-index: 100;
            margin: 0;
            padding: 0;
            display: block;
            transition: all .5s ease;
            height: 0;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.16), 0 2px 8px 0 rgba(0, 0, 0, 0.12)
        }

        .drop ul.right {
            right: 0;
            left: auto;
            transform-origin: 100% 0
        }

        .drop ul li {
            display: block;
            width: 100%;
            padding: 0;
            margin: 0
        }

        .drop ul li.title {
            width: 100%;
            line-height: unset;
            padding: 15px 20px 15px 20px;
            display: block;
            text-align: left;
            box-sizing: border-box;
            background: #0f161c;
            color: #fff;
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 1.3em
        }

        @media (min-width: 1024px) {
            .drop ul li.title {
                font-size: 1em;
                padding: 7px 12px 7px 15px
            }
        }

        .drop ul li.hidden {
            display: none
        }

        .drop ul li a {
            width: 100%;
            line-height: unset;
            padding: 15px 20px 15px 20px;
            display: block;
            text-align: left;
            -webkit-transition: all .1s ease;
            -moz-transition: all .1s ease;
            -o-transition: all .1s ease;
            transition: all .1s ease;
            box-sizing: border-box;
            color: #0f161c;
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 1.3em
        }

        @media (min-width: 1024px) {
            .drop ul li a {
                font-size: 1em;
                padding: 7px 12px 7px 15px
            }
        }

        .drop ul li a:hover {
            background: #ecf0f1
        }

        .drop ul li::after {
            height: 0;
            width: 0;
            position: relative
        }

        @media (min-width: 1024px) {
            .drop:hover ul {
                transform: scale(1);
                overflow: auto;
                height: auto
            }
        }

        .drop.dark ul {
            background: #0f161c
        }

        .drop.dark ul a {
            color: #ecf0f1
        }

        .drop.dark ul a:hover {
            background: #2c3e50;
            color: #fff
        }

        .performance-header {
            text-align: center
        }

        .performance-header img {
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px
        }

        .performance-header h2 {
            padding: 0;
            margin: 10px 0 15px 0
        }

        @media (min-width: 1024px) {
            .mini-log .container {
                overflow-x: hidden;
                overflow-y: auto
            }
        }

        @media screen and (min-width: 1024px) and (max-height: 599px) {
            .mini-log .container {
                max-height: 400px
            }
        }

        @media screen and (min-width: 1024px) and (min-height: 600px) {
            .mini-log .container {
                max-height: 500px
            }
        }

        @media screen and (min-width: 1024px) and (min-height: 700px) {
            .mini-log .container {
                max-height: 600px
            }
        }

        @media screen and (min-width: 1024px) and (min-height: 800px) {
            .mini-log .container {
                max-height: 700px
            }
        }

        @media screen and (min-width: 1024px) and (min-height: 850px) {
            .mini-log .container {
                max-height: none
            }
        }

        @media (min-width: 1024px) {
            .mini-log.scrolled {
                position: fixed;
                z-index: 100;
                top: 0;
                width: 250px
            }

            .mini-log.no-scroll .container {
                max-height: none;
                overflow-x: hidden;
                overflow-y: auto
            }
        }

        .horiz-scroller {
            display: none;
            width: 100%;
            height: 65px;
            padding: 10px 15px 0 15px
        }

        @media (min-width: 1024px) {
            .horiz-scroller {
                display: block
            }
        }

        .horiz-scroller .arrow {
            float: left;
            width: 31px
        }

        .horiz-scroller .arrow i {
            font-size: 1.6em;
            line-height: 45px;
            color: #7f8c8d;
            -webkit-transition: all .1s ease;
            -moz-transition: all .1s ease;
            -o-transition: all .1s ease;
            transition: all .1s ease;
            cursor: pointer
        }

        .horiz-scroller .arrow i:hover {
            color: #0f161c
        }

        .horiz-scroller .arrow.left {
            text-align: left
        }

        .horiz-scroller .arrow.right {
            text-align: right
        }

        .horiz-scroller .scroller {
            float: left;
            position: relative;
            width: 878px;
            overflow: hidden;
            height: 45px
        }

        .horiz-scroller .scroller ul {
            position: absolute;
            top: 0;
            left: 0;
            margin: 0;
            padding: 0;
            white-space: nowrap;
            -webkit-transition: all .2s ease;
            -moz-transition: all .2s ease;
            -o-transition: all .2s ease;
            transition: all .2s ease
        }

        .horiz-scroller .scroller ul li {
            display: inline-block;
            background: #fff;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            margin: 0 6px 0 0;
            -webkit-transition: all .15s ease;
            -moz-transition: all .15s ease;
            -o-transition: all .15s ease;
            transition: all .15s ease;
            padding: 4px 10px 4px 10px;
            cursor: pointer;
            width: 82px
        }

        .horiz-scroller .scroller ul li.complete {
            background: #c3d7d9
        }

        .horiz-scroller .scroller ul li .round-name {
            font-size: .9em;
            text-align: center;
            padding-bottom: 2px;
            white-space: nowrap;
            -ms-text-overflow: ellipsis;
            text-overflow: ellipsis;
            overflow: hidden;
            max-width: 60px
        }

        .horiz-scroller .scroller ul li .round-date {
            font-size: .7em;
            text-align: center;
            color: #7f8c8d
        }

        .horiz-scroller .scroller ul li:hover {
            background: #95a5a6;
            color: #fff
        }

        .horiz-scroller .scroller ul li:hover .round-date {
            color: #fff
        }

        .horiz-scroller .scroller ul li.active {
            background: #2c3e50;
            color: #fff
        }

        .horiz-scroller .scroller ul li.active .round-date {
            color: #fff
        }

        .horiz-scroller .scroller.short {
            width: 100%
        }

        .horiz-scroller .scroller.short ul {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: stretch;
            -ms-flex-align: stretch;
            -webkit-align-items: stretch;
            align-items: stretch;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            list-style-type: none
        }

        .horiz-scroller .scroller.short ul li {
            display: list-item;
            width: auto;
            flex-grow: 1;
            text-align: center
        }

        .horiz-scroller .scroller.short ul li:last-child {
            margin-right: 0
        }

        .horiz-scroller .scroller.short ul li .round-name {
            max-width: none
        }

        .date-divider {
            margin: 15px 0 10px 10px
        }

        .date-divider i {
            float: left;
            font-size: 1.5em;
            color: #677273;
            margin-right: 10px;
            line-height: 30px
        }

        .date-divider h2 {
            color: #677273;
            font-weight: 300;
            float: left;
            margin: 0;
            padding: 0;
            line-height: 30px
        }

        .date-divider .date-name {
            color: #677273;
            font-weight: 300;
            float: left;
            margin: 0;
            padding: 0;
            font-size: 1.3em;
            line-height: 30px
        }

        .date-divider::after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0
        }

    </style>
<table class="table table-responsive table-striped">
    <thead>
    <tr>
        <th>SELECTED TEAM</th>
        <th>TO WIN BY</th>
        <th>RESULT</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($tournamentEntries as $index => $pick) {
        ?>
        <tr>
            <td>
                <?php echo $pick->pick; //users pick
                ?>

            </td>
            <td>
                <span class="number-span"> <?php echo $pick->points; ?>  </span> Points
            </td>
            <td>
                PENDING <?php #TODO CALCULATE WINNER
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</pre>

<div class="page-content double-col right250"><input type="hidden" id="round_id" name="round_id" value="3">
    <div class="left-col">
        <div class="hide-desktop">
            <div class="card margin-bottom-only">
                <div class="card-header">TimTheTank's Round 3</div>
                <div class="card-content">
                    <table class="data max">
                        <tbody>
                        <tr>
                            <td class="text-left">Your correct outcomes</td>
                            <td class="text-center">0 / 8</td>
                        </tr>
                        <tr>
                            <td class="text-left">Your exact scores</td>
                            <td class="text-center">0 / 8</td>
                        </tr>
                        <tr>
                            <td class="text-left">Matches remaining</td>
                            <td class="text-center">8</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="data max">
                        <tbody>
                        <tr>
                            <th></th>
                            <th class="text-center" data-tooltip="Community expectation">Expec</th>
                            <th class="text-center">Points</th>
                        </tr>
                        <tr>
                            <td class="text-left mono">URU&nbsp;3&nbsp;-&nbsp;0&nbsp;RUS</td>
                            <td class="text-center">34%</td>
                            <td class="text-right">
                                <div class="wenger-lozenge nopick no-result" data-brutip="You did not pick this game">
                                    <div class="val">0</div>
                                    <div class="desc">No pick</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left mono">SAU&nbsp;2&nbsp;-&nbsp;1&nbsp;EGY</td>
                            <td class="text-center">4%</td>
                            <td class="text-right">
                                <div class="wenger-lozenge nopick no-result" data-brutip="You did not pick this game">
                                    <div class="val">0</div>
                                    <div class="desc">No pick</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left mono">IRN&nbsp;1&nbsp;-&nbsp;1&nbsp;POR</td>
                            <td class="text-center">3%</td>
                            <td class="text-right">
                                <div class="wenger-lozenge nopick no-result" data-brutip="You did not pick this game">
                                    <div class="val">0</div>
                                    <div class="desc">No pick</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left mono">SPA&nbsp;2&nbsp;-&nbsp;2&nbsp;MOR</td>
                            <td class="text-center">1%</td>
                            <td class="text-right">
                                <div class="wenger-lozenge nopick no-result" data-brutip="You did not pick this game">
                                    <div class="val">0</div>
                                    <div class="desc">No pick</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left mono">DEN&nbsp;0&nbsp;-&nbsp;0&nbsp;FRA</td>
                            <td class="text-center">20%</td>
                            <td class="text-right">
                                <div class="wenger-lozenge nopick no-result" data-brutip="You did not pick this game">
                                    <div class="val">0</div>
                                    <div class="desc">No pick</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left mono">AUS&nbsp;0&nbsp;-&nbsp;2&nbsp;PER</td>
                            <td class="text-center">19%</td>
                            <td class="text-right">
                                <div class="wenger-lozenge nopick no-result" data-brutip="You did not pick this game">
                                    <div class="val">0</div>
                                    <div class="desc">No pick</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left mono">NIG&nbsp;1&nbsp;-&nbsp;2&nbsp;ARG</td>
                            <td class="text-center">64%</td>
                            <td class="text-right">
                                <div class="wenger-lozenge nopick no-result" data-brutip="You did not pick this game">
                                    <div class="val">0</div>
                                    <div class="desc">No pick</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left mono">ICE&nbsp;1&nbsp;-&nbsp;2&nbsp;CRO</td>
                            <td class="text-center">82%</td>
                            <td class="text-right">
                                <div class="wenger-lozenge nopick no-result" data-brutip="You did not pick this game">
                                    <div class="val">0</div>
                                    <div class="desc">No pick</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left mono">MEX v SWE</td>
                            <td class="text-center">-</td>
                            <td class="text-right">-</td>
                        </tr>
                        <tr>
                            <td class="text-left mono">SKR v GER</td>
                            <td class="text-center">-</td>
                            <td class="text-right">-</td>
                        </tr>
                        <tr>
                            <td class="text-left mono">SER v BRA</td>
                            <td class="text-center">-</td>
                            <td class="text-right">-</td>
                        </tr>
                        <tr>
                            <td class="text-left mono">SWI v COS</td>
                            <td class="text-center">-</td>
                            <td class="text-right">-</td>
                        </tr>
                        <tr>
                            <td class="text-left mono">JAP v POL</td>
                            <td class="text-center">-</td>
                            <td class="text-right">-</td>
                        </tr>
                        <tr>
                            <td class="text-left mono">SEN v COL</td>
                            <td class="text-center">-</td>
                            <td class="text-right">-</td>
                        </tr>
                        <tr>
                            <td class="text-left mono">PAN v TUN</td>
                            <td class="text-center">-</td>
                            <td class="text-right">-</td>
                        </tr>
                        <tr>
                            <td class="text-left mono">ENG v BEL</td>
                            <td class="text-center">-</td>
                            <td class="text-right">-</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="drop hide-mobile"><a class="link" tabindex="-1" href="javascript:void(0)">Pool Results
                            for Round 3</a>
                        <ul>
                            <li><a href="pool_view.php?t=565&amp;p=11846498&amp;view=rounds&amp;round_id=3">Power
                                    Swans</a></li>
                            <li><a href="pool_view.php?t=565&amp;p=11831074&amp;view=rounds&amp;round_id=3">Argentina
                                    Fans</a></li>
                        </ul>
                    </div>
                    <div class="drop hide-desktop action-sheet-trigger" onclick="bru.ui.openActionSheet($(this))"><a
                                class="link drop" tabindex="-1" href="javascript:void(0)">Pool Results for Round 3</a>
                        <div class="action-sheet">
                            <ul class="slim">
                                <li><a href="pool_view.php?t=565&amp;p=11846498&amp;view=rounds&amp;round_id=3">Power
                                        Swans</a></li>
                                <li><a href="pool_view.php?t=565&amp;p=11831074&amp;view=rounds&amp;round_id=3">Argentina
                                        Fans</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="date-divider">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <h2>Mon 25 Jun</h2>
        </div>
        <div class="match-card margin-bottom-only soccer " data-bru-pick="No pick" data-bru-tournament-id="565"
             data-bru-game-id="33" data-bru-round-id="3" data-bru-teams="Uruguay v Russia"
             data-bru-game-status="complete">
            <div class="card-content">

                <div class="card-content-inner">
                    <div class="team-area">
                        <div class="team"><span class="flag-icon flag-icon-uy flag-icon-squared"></span>
                            <div class="name sevens">Uruguay</div>

                        </div>
                        <div class="score ">3</div>
                        <div class="picker" id="picker33"
                             data-bru-token="wymD2Fv8hyC6W5H5fmXzVaw6nTQboJftNwxC28xEpeGe1u/WpkA=">
                            <div class="post-status hide-mobile">
                                <div class="date">25 Jun 21:00</div>
                                <div class="hide-mobile">Complete</div>
                                <div class="hide-desktop">Complete</div>
                            </div>
                            <div class="your-pick">
                                <div class="hide-mobile">
                                    No pick
                                </div>
                                <div class="pick-area">
                                    <div class="you">
                                        <img src="https://aa4e56d48661769a9ddb-255515e4082953bc5f8f0b2563d8208e.ssl.cf2.rackcdn.com/6064913_1407875422.jpg">
                                        <div class="title">Your Pick</div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="pick hide-desktop"></div>
                                    <div class="pick hide-mobile"></div>
                                </div>
                                <div class="vs soccer">-</div>
                            </div>
                        </div>
                        <div class="score ">0</div>
                        <div class="team"><span class="flag-icon flag-icon-ru flag-icon-squared"></span>
                            <div class="name sevens">Russia</div>

                        </div>
                    </div>
                    <div class="goal-report">
                        <div class="goals-scored">
                            <div>Suarez (10')</div>
                            <div>Cavani (90')</div>
                        </div>
                        <div class="goals-scored">
                            <div>Cheryshev (23' OG)</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pick-line hide-desktop">
                <div class="you">
                    <img src="https://aa4e56d48661769a9ddb-255515e4082953bc5f8f0b2563d8208e.ssl.cf2.rackcdn.com/6064913_1407875422.jpg">
                    <div class="pick darkred"></div>
                </div>
            </div>
            <div class="stats-row" data-tournament-id="565" data-game-id="33">
                <div class="title">Upset: 34% of players picked Uruguay to win</div>
                <div class="percentage-bar">
                    <div class="end-percent" style="border-color:#ABCCF4">34%</div>
                    <div class="bars">
                        <div class="bar" data-brutip="33.71% of players picked a win for Uruguay"
                             style="background:#ABCCF4;width:33.71%;"></div>
                        <div class="bar draw" data-brutip="28.20% of players predicted a draw" style="width:28.20%;">
                            28%
                        </div>
                        <div class="bar" data-brutip="38.09% of players picked a win for Russia"
                             style="background:#FF0000;width:38.14%;"></div>
                    </div>
                    <div class="end-percent" style="border-color:#FF0000">38%</div>
                </div>
                <div class="hidden tap-more">Tap for more stats</div>
            </div>
            <div class="card-footer">
                <a class="link" href="javascript:void(0)" tabindex="-1"
                   onclick="brupicks.openPastResults(565,630,2026)"><span
                            class="hide-mobile">Historic Results</span><span class="hide-desktop">History</span></a>
                <div class="drop dark hide-mobile"><a class="link" tabindex="-1" href="javascript:void(0)">Pool
                        Results</a>
                    <ul>
                        <li><a href="pool_view.php?t=565&amp;p=11846498&amp;g=33&amp;view=matches">Power Swans</a></li>
                        <li><a href="pool_view.php?t=565&amp;p=11831074&amp;g=33&amp;view=matches">Argentina Fans</a>
                        </li>
                    </ul>
                </div>
                <div class="hide-desktop action-sheet-trigger choose-pool" data-game-id="33" data-round-id="3"
                     data-tournament-id="565" onclick="bru.ui.openActionSheet($(this))"><a class="link" tabindex="-1"
                                                                                           href="javascript:void(0)">Pool
                        Results</a>
                    <div class="action-sheet">
                        <ul class="">
                            <li><a href="pool.php?p=11846498#tab=matches&amp;subtab=game33">Power Swans</a></li>
                            <li><a href="pool.php?p=11831074#tab=matches&amp;subtab=game33">Argentina Fans</a></li>
                        </ul>
                    </div>
                </div>
                <a class="link" tabindex="-1" href="javascript:void(0)"
                   onclick="brupicks.openCommunityStats(33,565)"><span class="hide-mobile">Community Stats</span><span
                            class="hide-desktop">Stats</span></a>
            </div>
        </div>
        <div class="match-card margin-bottom-only soccer " data-bru-pick="No pick" data-bru-tournament-id="565"
             data-bru-game-id="34" data-bru-round-id="3" data-bru-teams="Saudi Arabia v Egypt"
             data-bru-game-status="complete">
            <div class="card-content">

                <div class="card-content-inner">
                    <div class="team-area">
                        <div class="team"><span class="flag-icon flag-icon-sa flag-icon-squared"></span>
                            <div class="name sevens">Saudi Arabia</div>

                        </div>
                        <div class="score ">2</div>
                        <div class="picker" id="picker34"
                             data-bru-token="wymD2Fv8hyC6W5H5fmXzVaw6nTQboJftNwxC28xEpeGe1u/RpkA=">
                            <div class="post-status hide-mobile">
                                <div class="date">25 Jun 21:00</div>
                                <div class="hide-mobile">Complete</div>
                                <div class="hide-desktop">Complete</div>
                            </div>
                            <div class="your-pick">
                                <div class="hide-mobile">
                                    No pick
                                </div>
                                <div class="pick-area">
                                    <div class="you">
                                        <img src="https://aa4e56d48661769a9ddb-255515e4082953bc5f8f0b2563d8208e.ssl.cf2.rackcdn.com/6064913_1407875422.jpg">
                                        <div class="title">Your Pick</div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="pick hide-desktop"></div>
                                    <div class="pick hide-mobile"></div>
                                </div>
                                <div class="vs soccer">-</div>
                            </div>
                        </div>
                        <div class="score ">1</div>
                        <div class="team"><span class="flag-icon flag-icon-eg flag-icon-squared"></span>
                            <div class="name sevens">Egypt</div>

                        </div>
                    </div>
                    <div class="goal-report">
                        <div class="goals-scored">
                            <div>Al Faraj (51' pen)</div>
                            <div>Al Dawsari (95')</div>
                        </div>
                        <div class="goals-scored">
                            <div>Salah (22')</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pick-line hide-desktop">
                <div class="you">
                    <img src="https://aa4e56d48661769a9ddb-255515e4082953bc5f8f0b2563d8208e.ssl.cf2.rackcdn.com/6064913_1407875422.jpg">
                    <div class="pick darkred"></div>
                </div>
            </div>
            <div class="stats-row" data-tournament-id="565" data-game-id="34">
                <div class="title">Major upset: 4% of players picked Saudi Arabia to win</div>
                <div class="percentage-bar">
                    <div class="end-percent" style="border-color:#53AF54">4%</div>
                    <div class="bars">
                        <div class="bar" data-brutip="3.73% of players picked a win for Saudi Arabia"
                             style="background:#53AF54;width:3.73%;"></div>
                        <div class="bar draw" data-brutip="10.96% of players predicted a draw" style="width:10.96%;">
                            11%
                        </div>
                        <div class="bar" data-brutip="85.31% of players picked a win for Egypt"
                             style="background:#000000;width:85.36%;"></div>
                    </div>
                    <div class="end-percent" style="border-color:#000000">85%</div>
                </div>
                <div class="hidden tap-more">Tap for more stats</div>
            </div>
            <div class="card-footer">
                <a class="link" href="javascript:void(0)" tabindex="-1"
                   onclick="brupicks.openPastResults(565,59,466)"><span class="hide-mobile">Historic Results</span><span
                            class="hide-desktop">History</span></a>
                <div class="drop dark hide-mobile"><a class="link" tabindex="-1" href="javascript:void(0)">Pool
                        Results</a>
                    <ul>
                        <li><a href="pool_view.php?t=565&amp;p=11846498&amp;g=34&amp;view=matches">Power Swans</a></li>
                        <li><a href="pool_view.php?t=565&amp;p=11831074&amp;g=34&amp;view=matches">Argentina Fans</a>
                        </li>
                    </ul>
                </div>
                <div class="hide-desktop action-sheet-trigger choose-pool" data-game-id="34" data-round-id="3"
                     data-tournament-id="565" onclick="bru.ui.openActionSheet($(this))"><a class="link" tabindex="-1"
                                                                                           href="javascript:void(0)">Pool
                        Results</a>
                    <div class="action-sheet">
                        <ul class="">
                            <li><a href="pool.php?p=11846498#tab=matches&amp;subtab=game34">Power Swans</a></li>
                            <li><a href="pool.php?p=11831074#tab=matches&amp;subtab=game34">Argentina Fans</a></li>
                        </ul>
                    </div>
                </div>
                <a class="link" tabindex="-1" href="javascript:void(0)"
                   onclick="brupicks.openCommunityStats(34,565)"><span class="hide-mobile">Community Stats</span><span
                            class="hide-desktop">Stats</span></a>
            </div>
        </div>
        <div class="date-divider">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <h2>Tue 26 Jun</h2>
        </div>
        <style>
            .app-promo {
                position: relative;
                margin: 0 0 40px 0;
                height: 175px;
                width: 100%;
            }

            .app-promo .phone {
                position: absolute;
                top: 0;
                left: 40px;
                z-index: 3;
            }

            .app-promo .info {
                position: absolute;
                top: 40px;
                left: 0;
                z-index: 2;
                border-top: 5px solid #00cc6d;
                border-bottom: 5px solid #00f2ff;
                background: #1f2e3f; /* Old browsers */
                background: -moz-linear-gradient(top, #1f2e3f 0%, #1f2e3f 100%); /* FF3.6-15 */
                background: -webkit-linear-gradient(top, #1f2e3f 0%, #1f2e3f 100%); /* Chrome10-25,Safari5.1-6 */
                background: linear-gradient(to bottom, #1f2e3f 0%, #1f2e3f 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
                color: #fff;
                width: 100%;
                padding: 10px 10px 10px 240px;
                box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.3);
                border-radius: 2px;
                height: 145px;
                -webkit-border-radius: 2px;
            }

            .app-promo .info .title {
                font-size: 1.3em;
                margin: 0 0 5px 0;
            }

            .app-promo .button-group {
                margin-top: 10px;
                -webkit-justify-content: flex-start;
                justify-content: flex-start;
            }

            .app-promo .button-group a {
                background: #00cc6d;
                margin-right: 25px;
                margin-left: 0;
            }

            .app-promo .button-group a:hover {
                background: #04e67d;
            }
        </style>
        <div class="app-promo hide-mobile">
            <div class="phone"><img
                        src="https://superbru-cdn.scdn3.secure.raxcdn.com/coreimages/structure/pl_2018_phone.png"
                        width="170"></div>
            <div class="info">
                <div class="title"><i class="fa fa-futbol-o" aria-hidden="true"></i> Premier League Predictor: now open!
                </div>
                <div>Enjoying the World Cup on Superbru? We run the Premier League too! First match: <b>Arsenal v Man
                        City (11 Aug)</b></div>
                <div class="button-group">
                    <a href="/premierleague_predictor/join_tournament.php?utm_source=play_promo" class="button">Join
                        Premier League Predictor</a>
                </div>
            </div>
        </div>
        <div class="match-card margin-bottom-only soccer " data-bru-pick="No pick" data-bru-tournament-id="565"
             data-bru-game-id="35" data-bru-round-id="3" data-bru-teams="Iran v Portugal"
             data-bru-game-status="complete">
            <div class="card-content">

                <div class="card-content-inner">
                    <div class="team-area">
                        <div class="team"><span class="flag-icon flag-icon-ir flag-icon-squared"></span>
                            <div class="name sevens">Iran</div>

                        </div>
                        <div class="score ">1</div>
                        <div class="picker" id="picker35"
                             data-bru-token="wymD2Fv8hyC6W5H5fmXzVaw6nTQboJftNwxC28xEpeGe1u/QpkA=">
                            <div class="post-status hide-mobile">
                                <div class="date">26 Jun 01:00</div>
                                <div class="hide-mobile">Complete</div>
                                <div class="hide-desktop">Complete</div>
                            </div>
                            <div class="your-pick">
                                <div class="hide-mobile">
                                    No pick
                                </div>
                                <div class="pick-area">
                                    <div class="you">
                                        <img src="https://aa4e56d48661769a9ddb-255515e4082953bc5f8f0b2563d8208e.ssl.cf2.rackcdn.com/6064913_1407875422.jpg">
                                        <div class="title">Your Pick</div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="pick hide-desktop"></div>
                                    <div class="pick hide-mobile"></div>
                                </div>
                                <div class="vs soccer">-</div>
                            </div>
                        </div>
                        <div class="score ">1</div>
                        <div class="team"><span class="flag-icon flag-icon-pt flag-icon-squared"></span>
                            <div class="name sevens">Portugal</div>

                        </div>
                    </div>
                    <div class="goal-report">
                        <div class="goals-scored">
                            <div>Ansarifard (93' pen)</div>
                        </div>
                        <div class="goals-scored">
                            <div>Quaresma (45')</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pick-line hide-desktop">
                <div class="you">
                    <img src="https://aa4e56d48661769a9ddb-255515e4082953bc5f8f0b2563d8208e.ssl.cf2.rackcdn.com/6064913_1407875422.jpg">
                    <div class="pick darkred"></div>
                </div>
            </div>
            <div class="stats-row" data-tournament-id="565" data-game-id="35">
                <div class="title">Unexpected: 3% of players picked a draw</div>
                <div class="percentage-bar">
                    <div class="end-percent" style="border-color:#25B45B">2%</div>
                    <div class="bars">
                        <div class="bar" data-brutip="1.83% of players picked a win for Iran"
                             style="background:#25B45B;width:1.83%;"></div>
                        <div class="bar draw" data-brutip="3.16% of players predicted a draw" style="width:3.16%;">3%
                        </div>
                        <div class="bar" data-brutip="95.01% of players picked a win for Portugal"
                             style="background:#007D00;width:95.06%;"></div>
                    </div>
                    <div class="end-percent" style="border-color:#007D00">95%</div>
                </div>
                <div class="hidden tap-more">Tap for more stats</div>
            </div>
            <div class="card-footer">
                <a class="link" href="javascript:void(0)" tabindex="-1"
                   onclick="brupicks.openPastResults(565,51,58)"><span class="hide-mobile">Historic Results</span><span
                            class="hide-desktop">History</span></a>
                <div class="drop dark hide-mobile"><a class="link" tabindex="-1" href="javascript:void(0)">Pool
                        Results</a>
                    <ul>
                        <li><a href="pool_view.php?t=565&amp;p=11846498&amp;g=35&amp;view=matches">Power Swans</a></li>
                        <li><a href="pool_view.php?t=565&amp;p=11831074&amp;g=35&amp;view=matches">Argentina Fans</a>
                        </li>
                    </ul>
                </div>
                <div class="hide-desktop action-sheet-trigger choose-pool" data-game-id="35" data-round-id="3"
                     data-tournament-id="565" onclick="bru.ui.openActionSheet($(this))"><a class="link" tabindex="-1"
                                                                                           href="javascript:void(0)">Pool
                        Results</a>
                    <div class="action-sheet">
                        <ul class="">
                            <li><a href="pool.php?p=11846498#tab=matches&amp;subtab=game35">Power Swans</a></li>
                            <li><a href="pool.php?p=11831074#tab=matches&amp;subtab=game35">Argentina Fans</a></li>
                        </ul>
                    </div>
                </div>
                <a class="link" tabindex="-1" href="javascript:void(0)"
                   onclick="brupicks.openCommunityStats(35,565)"><span class="hide-mobile">Community Stats</span><span
                            class="hide-desktop">Stats</span></a>
            </div>
        </div>
        <div class="match-card margin-bottom-only soccer " data-bru-pick="No pick" data-bru-tournament-id="565"
             data-bru-game-id="36" data-bru-round-id="3" data-bru-teams="Spain v Morocco"
             data-bru-game-status="complete">
            <div class="card-content">

                <div class="card-content-inner">
                    <div class="team-area">
                        <div class="team"><span class="flag-icon flag-icon-es flag-icon-squared"></span>
                            <div class="name sevens">Spain</div>

                        </div>
                        <div class="score ">2</div>
                        <div class="picker" id="picker36"
                             data-bru-token="wymD2Fv8hyC6W5H5fmXzVaw6nTQboJftNwxC28xEpeGe1u/TpkA=">
                            <div class="post-status hide-mobile">
                                <div class="date">26 Jun 01:00</div>
                                <div class="hide-mobile">Complete</div>
                                <div class="hide-desktop">Complete</div>
                            </div>
                            <div class="your-pick">
                                <div class="hide-mobile">
                                    No pick
                                </div>
                                <div class="pick-area">
                                    <div class="you">
                                        <img src="https://aa4e56d48661769a9ddb-255515e4082953bc5f8f0b2563d8208e.ssl.cf2.rackcdn.com/6064913_1407875422.jpg">
                                        <div class="title">Your Pick</div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="pick hide-desktop"></div>
                                    <div class="pick hide-mobile"></div>
                                </div>
                                <div class="vs soccer">-</div>
                            </div>
                        </div>
                        <div class="score ">2</div>
                        <div class="team"><span class="flag-icon flag-icon-ma flag-icon-squared"></span>
                            <div class="name sevens">Morocco</div>

                        </div>
                    </div>
                    <div class="goal-report">
                        <div class="goals-scored">
                            <div>Isco (19')</div>
                            <div>Aspas (91')</div>
                        </div>
                        <div class="goals-scored">
                            <div>Boutaib (14')</div>
                            <div>En-Nesyri (81')</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pick-line hide-desktop">
                <div class="you">
                    <img src="https://aa4e56d48661769a9ddb-255515e4082953bc5f8f0b2563d8208e.ssl.cf2.rackcdn.com/6064913_1407875422.jpg">
                    <div class="pick darkred"></div>
                </div>
            </div>
            <div class="stats-row" data-tournament-id="565" data-game-id="36">
                <div class="title">Unexpected: 1% of players picked a draw</div>
                <div class="percentage-bar">
                    <div class="end-percent" style="border-color:#FFD100">98%</div>
                    <div class="bars">
                        <div class="bar" data-brutip="98.08% of players picked a win for Spain"
                             style="background:#FFD100;width:98.08%;"></div>
                        <div class="bar draw" data-brutip="1.41% of players predicted a draw" style="width:1.41%;">1%
                        </div>
                        <div class="bar" data-brutip="0.51% of players picked a win for Morocco"
                             style="background:#CA292B;width:0.56%;"></div>
                    </div>
                    <div class="end-percent" style="border-color:#CA292B">&lt;1%</div>
                </div>
                <div class="hidden tap-more">Tap for more stats</div>
            </div>
            <div class="card-footer">
                <a class="link" href="javascript:void(0)" tabindex="-1"
                   onclick="brupicks.openPastResults(565,62,734)"><span class="hide-mobile">Historic Results</span><span
                            class="hide-desktop">History</span></a>
                <div class="drop dark hide-mobile"><a class="link" tabindex="-1" href="javascript:void(0)">Pool
                        Results</a>
                    <ul>
                        <li><a href="pool_view.php?t=565&amp;p=11846498&amp;g=36&amp;view=matches">Power Swans</a></li>
                        <li><a href="pool_view.php?t=565&amp;p=11831074&amp;g=36&amp;view=matches">Argentina Fans</a>
                        </li>
                    </ul>
                </div>
                <div class="hide-desktop action-sheet-trigger choose-pool" data-game-id="36" data-round-id="3"
                     data-tournament-id="565" onclick="bru.ui.openActionSheet($(this))"><a class="link" tabindex="-1"
                                                                                           href="javascript:void(0)">Pool
                        Results</a>
                    <div class="action-sheet">
                        <ul class="">
                            <li><a href="pool.php?p=11846498#tab=matches&amp;subtab=game36">Power Swans</a></li>
                            <li><a href="pool.php?p=11831074#tab=matches&amp;subtab=game36">Argentina Fans</a></li>
                        </ul>
                    </div>
                </div>
                <a class="link" tabindex="-1" href="javascript:void(0)"
                   onclick="brupicks.openCommunityStats(36,565)"><span class="hide-mobile">Community Stats</span><span
                            class="hide-desktop">Stats</span></a>
            </div>
        </div>
        <div class="match-card margin-bottom-only soccer " data-bru-pick="No pick" data-bru-tournament-id="565"
             data-bru-game-id="37" data-bru-round-id="3" data-bru-teams="Denmark v France"
             data-bru-game-status="complete">
            <div class="card-content">

                <div class="card-content-inner">
                    <div class="team-area">
                        <div class="team"><span class="flag-icon flag-icon-dk flag-icon-squared"></span>
                            <div class="name sevens">Denmark</div>

                        </div>
                        <div class="score ">0</div>
                        <div class="picker" id="picker37"
                             data-bru-token="wymD2Fv8hyC6W5H5fmXzVaw6nTQboJftNwxC28xEpeGe1u/SpkA=">
                            <div class="post-status hide-mobile">
                                <div class="date">26 Jun 21:00</div>
                                <div class="hide-mobile">Complete</div>
                                <div class="hide-desktop">Complete</div>
                            </div>
                            <div class="your-pick">
                                <div class="hide-mobile">
                                    No pick
                                </div>
                                <div class="pick-area">
                                    <div class="you">
                                        <img src="https://aa4e56d48661769a9ddb-255515e4082953bc5f8f0b2563d8208e.ssl.cf2.rackcdn.com/6064913_1407875422.jpg">
                                        <div class="title">Your Pick</div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="pick hide-desktop"></div>
                                    <div class="pick hide-mobile"></div>
                                </div>
                                <div class="vs soccer">-</div>
                            </div>
                        </div>
                        <div class="score ">0</div>
                        <div class="team"><span class="flag-icon flag-icon-fr flag-icon-squared"></span>
                            <div class="name sevens">France</div>

                        </div>
                    </div>
                    <div class="goal-report">
                        <div class="goals-scored"></div>
                        <div class="goals-scored"></div>
                    </div>
                </div>
            </div>
            <div class="pick-line hide-desktop">
                <div class="you">
                    <img src="https://aa4e56d48661769a9ddb-255515e4082953bc5f8f0b2563d8208e.ssl.cf2.rackcdn.com/6064913_1407875422.jpg">
                    <div class="pick darkred"></div>
                </div>
            </div>
            <div class="stats-row" data-tournament-id="565" data-game-id="37">
                <div class="title">Unexpected: 20% of players picked a draw</div>
                <div class="percentage-bar">
                    <div class="end-percent" style="border-color:#DC171D">4%</div>
                    <div class="bars">
                        <div class="bar" data-brutip="3.96% of players picked a win for Denmark"
                             style="background:#DC171D;width:3.96%;"></div>
                        <div class="bar draw" data-brutip="19.98% of players predicted a draw" style="width:19.98%;">
                            20%
                        </div>
                        <div class="bar" data-brutip="76.06% of players picked a win for France"
                             style="background:#032AA9;width:76.11%;"></div>
                    </div>
                    <div class="end-percent" style="border-color:#032AA9">76%</div>
                </div>
                <div class="hidden tap-more">Tap for more stats</div>
            </div>
            <div class="card-footer">
                <a class="link" href="javascript:void(0)" tabindex="-1"
                   onclick="brupicks.openPastResults(565,623,47)"><span class="hide-mobile">Historic Results</span><span
                            class="hide-desktop">History</span></a>
                <div class="drop dark hide-mobile"><a class="link" tabindex="-1" href="javascript:void(0)">Pool
                        Results</a>
                    <ul>
                        <li><a href="pool_view.php?t=565&amp;p=11846498&amp;g=37&amp;view=matches">Power Swans</a></li>
                        <li><a href="pool_view.php?t=565&amp;p=11831074&amp;g=37&amp;view=matches">Argentina Fans</a>
                        </li>
                    </ul>
                </div>
                <div class="hide-desktop action-sheet-trigger choose-pool" data-game-id="37" data-round-id="3"
                     data-tournament-id="565" onclick="bru.ui.openActionSheet($(this))"><a class="link" tabindex="-1"
                                                                                           href="javascript:void(0)">Pool
                        Results</a>
                    <div class="action-sheet">
                        <ul class="">
                            <li><a href="pool.php?p=11846498#tab=matches&amp;subtab=game37">Power Swans</a></li>
                            <li><a href="pool.php?p=11831074#tab=matches&amp;subtab=game37">Argentina Fans</a></li>
                        </ul>
                    </div>
                </div>
                <a class="link" tabindex="-1" href="javascript:void(0)"
                   onclick="brupicks.openCommunityStats(37,565)"><span class="hide-mobile">Community Stats</span><span
                            class="hide-desktop">Stats</span></a>
            </div>
        </div>
        <div class="match-card margin-bottom-only soccer " data-bru-pick="No pick" data-bru-tournament-id="565"
             data-bru-game-id="38" data-bru-round-id="3" data-bru-teams="Australia v Peru"
             data-bru-game-status="complete">
            <div class="card-content">

                <div class="card-content-inner">
                    <div class="team-area">
                        <div class="team"><span class="flag-icon flag-icon-au flag-icon-squared"></span>
                            <div class="name sevens">Australia</div>

                        </div>
                        <div class="score ">0</div>
                        <div class="picker" id="picker38"
                             data-bru-token="wymD2Fv8hyC6W5H5fmXzVaw6nTQboJftNwxC28xEpeGe1u/dpkA=">
                            <div class="post-status hide-mobile">
                                <div class="date">26 Jun 21:00</div>
                                <div class="hide-mobile">Complete</div>
                                <div class="hide-desktop">Complete</div>
                            </div>
                            <div class="your-pick">
                                <div class="hide-mobile">
                                    No pick
                                </div>
                                <div class="pick-area">
                                    <div class="you">
                                        <img src="https://aa4e56d48661769a9ddb-255515e4082953bc5f8f0b2563d8208e.ssl.cf2.rackcdn.com/6064913_1407875422.jpg">
                                        <div class="title">Your Pick</div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="pick hide-desktop"></div>
                                    <div class="pick hide-mobile"></div>
                                </div>
                                <div class="vs soccer">-</div>
                            </div>
                        </div>
                        <div class="score ">2</div>
                        <div class="team"><span class="flag-icon flag-icon-pe flag-icon-squared"></span>
                            <div class="name sevens">Peru</div>

                        </div>
                    </div>
                    <div class="goal-report">
                        <div class="goals-scored"></div>
                        <div class="goals-scored">
                            <div>Carrillo (18')</div>
                            <div>Guerrero (50')</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pick-line hide-desktop">
                <div class="you">
                    <img src="https://aa4e56d48661769a9ddb-255515e4082953bc5f8f0b2563d8208e.ssl.cf2.rackcdn.com/6064913_1407875422.jpg">
                    <div class="pick darkred"></div>
                </div>
            </div>
            <div class="stats-row" data-tournament-id="565" data-game-id="38">
                <div class="title">Major upset: 19% of players picked Peru to win</div>
                <div class="percentage-bar">
                    <div class="end-percent" style="border-color:#FFC600">53%</div>
                    <div class="bars">
                        <div class="bar" data-brutip="52.51% of players picked a win for Australia"
                             style="background:#FFC600;width:52.51%;"></div>
                        <div class="bar draw" data-brutip="28.99% of players predicted a draw" style="width:28.99%;">
                            29%
                        </div>
                        <div class="bar" data-brutip="18.50% of players picked a win for Peru"
                             style="background:#EFEFEF;width:18.55%;"></div>
                    </div>
                    <div class="end-percent" style="border-color:#EFEFEF">19%</div>
                </div>
                <div class="hidden tap-more">Tap for more stats</div>
            </div>
            <div class="card-footer">
                <a class="link" href="javascript:void(0)" tabindex="-1" onclick="brupicks.openPastResults(565,40,2390)"><span
                            class="hide-mobile">Historic Results</span><span class="hide-desktop">History</span></a>
                <div class="drop dark hide-mobile"><a class="link" tabindex="-1" href="javascript:void(0)">Pool
                        Results</a>
                    <ul>
                        <li><a href="pool_view.php?t=565&amp;p=11846498&amp;g=38&amp;view=matches">Power Swans</a></li>
                        <li><a href="pool_view.php?t=565&amp;p=11831074&amp;g=38&amp;view=matches">Argentina Fans</a>
                        </li>
                    </ul>
                </div>
                <div class="hide-desktop action-sheet-trigger choose-pool" data-game-id="38" data-round-id="3"
                     data-tournament-id="565" onclick="bru.ui.openActionSheet($(this))"><a class="link" tabindex="-1"
                                                                                           href="javascript:void(0)">Pool
                        Results</a>
                    <div class="action-sheet">
                        <ul class="">
                            <li><a href="pool.php?p=11846498#tab=matches&amp;subtab=game38">Power Swans</a></li>
                            <li><a href="pool.php?p=11831074#tab=matches&amp;subtab=game38">Argentina Fans</a></li>
                        </ul>
                    </div>
                </div>
                <a class="link" tabindex="-1" href="javascript:void(0)"
                   onclick="brupicks.openCommunityStats(38,565)"><span class="hide-mobile">Community Stats</span><span
                            class="hide-desktop">Stats</span></a>
            </div>
        </div>
        <div class="date-divider">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <h2>Today</h2>
        </div>
        <div class="match-card margin-bottom-only soccer " data-bru-pick="No pick" data-bru-tournament-id="565"
             data-bru-game-id="39" data-bru-round-id="3" data-bru-teams="Nigeria v Argentina"
             data-bru-game-status="complete">
            <div class="card-content">

                <div class="card-content-inner">
                    <div class="team-area">
                        <div class="team"><span class="flag-icon flag-icon-ng flag-icon-squared"></span>
                            <div class="name sevens">Nigeria</div>

                        </div>
                        <div class="score ">1</div>
                        <div class="picker" id="picker39"
                             data-bru-token="wymD2Fv8hyC6W5H5fmXzVaw6nTQboJftNwxC28xEpeGe1u/cpkA=">
                            <div class="post-status hide-mobile">
                                <div class="date">27 Jun 01:00</div>
                                <div class="hide-mobile">Complete</div>
                                <div class="hide-desktop">Complete</div>
                            </div>
                            <div class="your-pick">
                                <div class="hide-mobile">
                                    No pick
                                </div>
                                <div class="pick-area">
                                    <div class="you">
                                        <img src="https://aa4e56d48661769a9ddb-255515e4082953bc5f8f0b2563d8208e.ssl.cf2.rackcdn.com/6064913_1407875422.jpg">
                                        <div class="title">Your Pick</div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="pick hide-desktop"></div>
                                    <div class="pick hide-mobile"></div>
                                </div>
                                <div class="vs soccer">-</div>
                            </div>
                        </div>
                        <div class="score ">2</div>
                        <div class="team"><span class="flag-icon flag-icon-ar flag-icon-squared"></span>
                            <div class="name sevens">Argentina</div>

                        </div>
                    </div>
                    <div class="goal-report">
                        <div class="goals-scored">
                            <div>Moses (51' pen)</div>
                        </div>
                        <div class="goals-scored">
                            <div>Messi (14')</div>
                            <div>Rojo (86')</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pick-line hide-desktop">
                <div class="you">
                    <img src="https://aa4e56d48661769a9ddb-255515e4082953bc5f8f0b2563d8208e.ssl.cf2.rackcdn.com/6064913_1407875422.jpg">
                    <div class="pick darkred"></div>
                </div>
            </div>
            <div class="stats-row" data-tournament-id="565" data-game-id="39">
                <div class="title">Fairly predictable: 64% of players picked Argentina to win</div>
                <div class="percentage-bar">
                    <div class="end-percent" style="border-color:#007934">19%</div>
                    <div class="bars">
                        <div class="bar" data-brutip="19.48% of players picked a win for Nigeria"
                             style="background:#007934;width:19.48%;"></div>
                        <div class="bar draw" data-brutip="16.63% of players predicted a draw" style="width:16.63%;">
                            17%
                        </div>
                        <div class="bar" data-brutip="63.89% of players picked a win for Argentina"
                             style="background:#66B9DA;width:63.94%;"></div>
                    </div>
                    <div class="end-percent" style="border-color:#66B9DA">64%</div>
                </div>
                <div class="hidden tap-more">Tap for more stats</div>
            </div>
            <div class="card-footer">
                <a class="link" href="javascript:void(0)" tabindex="-1"
                   onclick="brupicks.openPastResults(565,627,39)"><span class="hide-mobile">Historic Results</span><span
                            class="hide-desktop">History</span></a>
                <div class="drop dark hide-mobile"><a class="link" tabindex="-1" href="javascript:void(0)">Pool
                        Results</a>
                    <ul>
                        <li><a href="pool_view.php?t=565&amp;p=11846498&amp;g=39&amp;view=matches">Power Swans</a></li>
                        <li><a href="pool_view.php?t=565&amp;p=11831074&amp;g=39&amp;view=matches">Argentina Fans</a>
                        </li>
                    </ul>
                </div>
                <div class="hide-desktop action-sheet-trigger choose-pool" data-game-id="39" data-round-id="3"
                     data-tournament-id="565" onclick="bru.ui.openActionSheet($(this))"><a class="link" tabindex="-1"
                                                                                           href="javascript:void(0)">Pool
                        Results</a>
                    <div class="action-sheet">
                        <ul class="">
                            <li><a href="pool.php?p=11846498#tab=matches&amp;subtab=game39">Power Swans</a></li>
                            <li><a href="pool.php?p=11831074#tab=matches&amp;subtab=game39">Argentina Fans</a></li>
                        </ul>
                    </div>
                </div>
                <a class="link" tabindex="-1" href="javascript:void(0)"
                   onclick="brupicks.openCommunityStats(39,565)"><span class="hide-mobile">Community Stats</span><span
                            class="hide-desktop">Stats</span></a>
            </div>
        </div>
        <div class="match-card margin-bottom-only soccer " data-bru-pick="No pick" data-bru-tournament-id="565"
             data-bru-game-id="40" data-bru-round-id="3" data-bru-teams="Iceland v Croatia"
             data-bru-game-status="complete">
            <div class="card-content">

                <div class="card-content-inner">
                    <div class="team-area">
                        <div class="team"><span class="flag-icon flag-icon-is flag-icon-squared"></span>
                            <div class="name sevens">Iceland</div>

                        </div>
                        <div class="score ">1</div>
                        <div class="picker" id="picker40"
                             data-bru-token="wymD2Fv8hyC6W5H5fmXzVaw6nTQboJftNwxC28xEpeGe1ujVpkA=">
                            <div class="post-status hide-mobile">
                                <div class="date">27 Jun 01:00</div>
                                <div class="hide-mobile">Complete</div>
                                <div class="hide-desktop">Complete</div>
                            </div>
                            <div class="your-pick">
                                <div class="hide-mobile">
                                    No pick
                                </div>
                                <div class="pick-area">
                                    <div class="you">
                                        <img src="https://aa4e56d48661769a9ddb-255515e4082953bc5f8f0b2563d8208e.ssl.cf2.rackcdn.com/6064913_1407875422.jpg">
                                        <div class="title">Your Pick</div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="pick hide-desktop"></div>
                                    <div class="pick hide-mobile"></div>
                                </div>
                                <div class="vs soccer">-</div>
                            </div>
                        </div>
                        <div class="score ">2</div>
                        <div class="team"><span class="flag-icon flag-icon-hr flag-icon-squared"></span>
                            <div class="name sevens">Croatia</div>

                        </div>
                    </div>
                    <div class="goal-report">
                        <div class="goals-scored">
                            <div>Sigurdsson (76' pen)</div>
                        </div>
                        <div class="goals-scored">
                            <div>Badelj (53')</div>
                            <div>Perisic (90')</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pick-line hide-desktop">
                <div class="you">
                    <img src="https://aa4e56d48661769a9ddb-255515e4082953bc5f8f0b2563d8208e.ssl.cf2.rackcdn.com/6064913_1407875422.jpg">
                    <div class="pick darkred"></div>
                </div>
            </div>
            <div class="stats-row" data-tournament-id="565" data-game-id="40">
                <div class="title">Highly predictable: 82% of players picked Croatia to win</div>
                <div class="percentage-bar">
                    <div class="end-percent" style="border-color:#0349AB">6%</div>
                    <div class="bars">
                        <div class="bar" data-brutip="5.78% of players picked a win for Iceland"
                             style="background:#0349AB;width:5.78%;"></div>
                        <div class="bar draw" data-brutip="12.71% of players predicted a draw" style="width:12.71%;">
                            13%
                        </div>
                        <div class="bar" data-brutip="81.51% of players picked a win for Croatia"
                             style="background:#FF0600;width:81.56%;"></div>
                    </div>
                    <div class="end-percent" style="border-color:#FF0600">82%</div>
                </div>
                <div class="hidden tap-more">Tap for more stats</div>
            </div>
            <div class="card-footer">
                <a class="link" href="javascript:void(0)" tabindex="-1" onclick="brupicks.openPastResults(565,2506,43)"><span
                            class="hide-mobile">Historic Results</span><span class="hide-desktop">History</span></a>
                <div class="drop dark hide-mobile"><a class="link" tabindex="-1" href="javascript:void(0)">Pool
                        Results</a>
                    <ul>
                        <li><a href="pool_view.php?t=565&amp;p=11846498&amp;g=40&amp;view=matches">Power Swans</a></li>
                        <li><a href="pool_view.php?t=565&amp;p=11831074&amp;g=40&amp;view=matches">Argentina Fans</a>
                        </li>
                    </ul>
                </div>
                <div class="hide-desktop action-sheet-trigger choose-pool" data-game-id="40" data-round-id="3"
                     data-tournament-id="565" onclick="bru.ui.openActionSheet($(this))"><a class="link" tabindex="-1"
                                                                                           href="javascript:void(0)">Pool
                        Results</a>
                    <div class="action-sheet">
                        <ul class="">
                            <li><a href="pool.php?p=11846498#tab=matches&amp;subtab=game40">Power Swans</a></li>
                            <li><a href="pool.php?p=11831074#tab=matches&amp;subtab=game40">Argentina Fans</a></li>
                        </ul>
                    </div>
                </div>
                <a class="link" tabindex="-1" href="javascript:void(0)"
                   onclick="brupicks.openCommunityStats(40,565)"><span class="hide-mobile">Community Stats</span><span
                            class="hide-desktop">Stats</span></a>
            </div>
        </div>
        <div class="match-card margin-bottom-only soccer " data-bru-pick="No pick" data-bru-tournament-id="565"
             data-bru-game-id="41" data-bru-round-id="3" data-bru-teams="Mexico v Sweden"
             data-bru-game-status="scheduled">
            <div class="card-header">
                <div class="venue">
                    <img src="https://superbru-cdn.scdn3.secure.raxcdn.com/coreimages/venue/12160.jpg">
                    <div class="info">
                        <div class="name">Central Stadium, Yekaterinburg</div>
                        <div>
                            <div class="detail">Altitude: 245m</div>
                            <div class="detail">Capacity: 35,696</div>
                        </div>
                    </div>

                </div>

                <div class="date hide-desktop">27 Jun 21:00</div>
                <div class="date hide-mobile">Wednesday 27 Jun 21:00</div>
            </div>
            <div class="card-content">

                <div class="card-content-inner">
                    <div class="team-area">
                        <div class="team"><span class="flag-icon flag-icon-mx flag-icon-squared"></span>
                            <div class="name sevens">Mexico</div>
                            <div class="streak-simple " style="margin-top:5px;" data-tournament-id="565"
                                 data-team-id="55" onclick="bru.ui.openStreak(565,55)">
                                <ul>
                                    <li class="w" data-tooltip="17 Jun: Beat Germany 1-0">W</li>
                                    <li class="w" data-tooltip="23 Jun: Beat South Korea 2-1">W</li>
                                </ul>
                            </div>

                        </div>
                        <div class="picker" id="picker41"
                             data-bru-token="wymD2Fv8hyC6W5H5fmXzVaw6nTQboJftNwxC28xEpeGe1ujUpkA=">
                            <div class="soccer-picker" id="soccer-picker41" data-bru-game-id="41" data-bru-existing=""
                                 data-bru-left-comm="63.70" data-bru-right-comm="10.28">

                                <div class="goals left" data-bru-game-id="41">
                                    <input maxlength="2" class="editable-dropdown soccer-left-score" type="text"
                                           data-bru-colour="99171C" data-bru-text-colour="ffffff" value=""
                                           data-bru-team-name="Mexico" tabindex="1" onclick="">

                                    <div class="mobile-input" data-bru-colour="99171C" data-bru-text-colour="ffffff"
                                         data-bru-team-name="Mexico" data-locked="0"></div>

                                    <div class="options editable-dropdown">
                                        <div class="goal goal0 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;left&quot;,0;)">0
                                        </div>
                                        <div class="goal goal1 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;left&quot;,1;)">1
                                        </div>
                                        <div class="goal goal2 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;left&quot;,2;)">2
                                        </div>
                                        <div class="goal goal3 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;left&quot;,3;)">3
                                        </div>
                                        <div class="goal goal4 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;left&quot;,4;)">4
                                        </div>
                                        <div class="goal goal5 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;left&quot;,5;)">5
                                        </div>
                                        <div class="goal goal6 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;left&quot;,6;)">6
                                        </div>
                                        <div class="goal goal7 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;left&quot;,7;)">7
                                        </div>
                                        <div class="goal goal8 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;left&quot;,8;)">8
                                        </div>
                                        <div class="goal goal9 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;left&quot;,9;)">9
                                        </div>
                                        <div class="goal goal10 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;left&quot;,10;)">10
                                        </div>
                                        <div class="goal goal11 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;left&quot;,11;)">11
                                        </div>
                                        <div class="goal goal12 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;left&quot;,12;)">12
                                        </div>
                                    </div>
                                </div>

                                <div class="v">-</div>

                                <div class="goals right" data-bru-game-id="41">
                                    <input maxlength="2" class="editable-dropdown soccer-right-score"
                                           data-bru-colour="0380B8" data-bru-text-colour="FED800" type="text" value=""
                                           data-bru-team-name="Sweden" tabindex="2">

                                    <div class="mobile-input" data-bru-colour="0380B8" data-bru-text-colour="FED800"
                                         data-bru-team-name="Sweden" data-locked="0"></div>

                                    <div class="options editable-dropdown">
                                        <div class="goal goal0 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;right&quot;,0;)">0
                                        </div>
                                        <div class="goal goal1 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;right&quot;,1;)">1
                                        </div>
                                        <div class="goal goal2 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;right&quot;,2;)">2
                                        </div>
                                        <div class="goal goal3 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;right&quot;,3;)">3
                                        </div>
                                        <div class="goal goal4 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;right&quot;,4;)">4
                                        </div>
                                        <div class="goal goal5 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;right&quot;,5;)">5
                                        </div>
                                        <div class="goal goal6 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;right&quot;,6;)">6
                                        </div>
                                        <div class="goal goal7 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;right&quot;,7;)">7
                                        </div>
                                        <div class="goal goal8 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;right&quot;,8;)">8
                                        </div>
                                        <div class="goal goal9 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;right&quot;,9;)">9
                                        </div>
                                        <div class="goal goal10 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;right&quot;,10;)">10
                                        </div>
                                        <div class="goal goal11 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;right&quot;,11;)">11
                                        </div>
                                        <div class="goal goal12 "
                                             onclick="brupicks.soccer.setGoal(41,&quot;right&quot;,12;)">12
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="save-status tall"></div>
                            <div class="pick-status cricket"></div>
                        </div>

                        <div class="team"><span class="flag-icon flag-icon-se flag-icon-squared"></span>
                            <div class="name sevens">Sweden</div>
                            <div class="streak-simple " style="margin-top:5px;" data-tournament-id="565"
                                 data-team-id="63" onclick="bru.ui.openStreak(565,63)">
                                <ul>
                                    <li class="w" data-tooltip="18 Jun: Beat South Korea 1-0">W</li>
                                    <li class="l" data-tooltip="23 Jun: Lost to Germany 1-2">L</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="goal-report">
                        <div class="goals-scored"></div>
                        <div class="goals-scored"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="link" href="javascript:void(0)" tabindex="-1"
                   onclick="brupicks.openPastResults(565,55,63)"><span class="hide-mobile">Historic Results</span><span
                            class="hide-desktop">History</span></a>
                <div class="drop dark hide-mobile"><a class="link" tabindex="-1" href="javascript:void(0)">Pool
                        Picks</a>
                    <ul>
                        <li><a href="pool_view.php?t=565&amp;p=11846498&amp;g=41&amp;view=matches">Power Swans</a></li>
                        <li><a href="pool_view.php?t=565&amp;p=11831074&amp;g=41&amp;view=matches">Argentina Fans</a>
                        </li>
                    </ul>
                </div>
                <div class="hide-desktop action-sheet-trigger choose-pool" data-game-id="41" data-round-id="3"
                     data-tournament-id="565" onclick="bru.ui.openActionSheet($(this))"><a class="link" tabindex="-1"
                                                                                           href="javascript:void(0)">Pool
                        Picks</a>
                    <div class="action-sheet">
                        <ul class="">
                            <li><a href="pool.php?p=11846498#tab=matches&amp;subtab=game41">Power Swans</a></li>
                            <li><a href="pool.php?p=11831074#tab=matches&amp;subtab=game41">Argentina Fans</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="match-card margin-bottom-only soccer " data-bru-pick="No pick" data-bru-tournament-id="565"
             data-bru-game-id="42" data-bru-round-id="3" data-bru-teams="South Korea v Germany"
             data-bru-game-status="scheduled">
            <div class="card-header">
                <div class="venue">
                    <img src="https://superbru-cdn.scdn3.secure.raxcdn.com/coreimages/venue/12020.jpg">
                    <div class="info">
                        <div class="name">Kazan Arena, Kazan</div>
                        <div>
                            <div class="detail">Altitude: 119m</div>
                            <div class="detail">Capacity: 45,379</div>
                        </div>
                    </div>

                </div>

                <div class="date hide-desktop">27 Jun 21:00</div>
                <div class="date hide-mobile">Wednesday 27 Jun 21:00</div>
            </div>
            <div class="card-content">

                <div class="card-content-inner">
                    <div class="team-area">
                        <div class="team"><span class="flag-icon flag-icon-kr flag-icon-squared"></span>
                            <div class="name sevens">South Korea</div>
                            <div class="streak-simple " style="margin-top:5px;" data-tournament-id="565"
                                 data-team-id="61" onclick="bru.ui.openStreak(565,61)">
                                <ul>
                                    <li class="l" data-tooltip="18 Jun: Lost to Sweden 0-1">L</li>
                                    <li class="l" data-tooltip="23 Jun: Lost to Mexico 1-2">L</li>
                                </ul>
                            </div>

                        </div>
                        <div class="picker" id="picker42"
                             data-bru-token="wymD2Fv8hyC6W5H5fmXzVaw6nTQboJftNwxC28xEpeGe1ujXpkA=">
                            <div class="soccer-picker" id="soccer-picker42" data-bru-game-id="42" data-bru-existing=""
                                 data-bru-left-comm="0.69" data-bru-right-comm="97.83">

                                <div class="goals left" data-bru-game-id="42">
                                    <input maxlength="2" class="editable-dropdown soccer-left-score" type="text"
                                           data-bru-colour="d8d8d8" data-bru-text-colour="DB0909" value=""
                                           data-bru-team-name="South Korea" tabindex="3" onclick="">

                                    <div class="mobile-input" data-bru-colour="d8d8d8" data-bru-text-colour="DB0909"
                                         data-bru-team-name="South Korea" data-locked="0"></div>

                                    <div class="options editable-dropdown">
                                        <div class="goal goal0 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;left&quot;,0;)">0
                                        </div>
                                        <div class="goal goal1 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;left&quot;,1;)">1
                                        </div>
                                        <div class="goal goal2 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;left&quot;,2;)">2
                                        </div>
                                        <div class="goal goal3 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;left&quot;,3;)">3
                                        </div>
                                        <div class="goal goal4 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;left&quot;,4;)">4
                                        </div>
                                        <div class="goal goal5 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;left&quot;,5;)">5
                                        </div>
                                        <div class="goal goal6 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;left&quot;,6;)">6
                                        </div>
                                        <div class="goal goal7 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;left&quot;,7;)">7
                                        </div>
                                        <div class="goal goal8 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;left&quot;,8;)">8
                                        </div>
                                        <div class="goal goal9 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;left&quot;,9;)">9
                                        </div>
                                        <div class="goal goal10 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;left&quot;,10;)">10
                                        </div>
                                        <div class="goal goal11 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;left&quot;,11;)">11
                                        </div>
                                        <div class="goal goal12 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;left&quot;,12;)">12
                                        </div>
                                    </div>
                                </div>

                                <div class="v">-</div>

                                <div class="goals right" data-bru-game-id="42">
                                    <input maxlength="2" class="editable-dropdown soccer-right-score"
                                           data-bru-colour="000000" data-bru-text-colour="ffffff" type="text" value=""
                                           data-bru-team-name="Germany" tabindex="4">

                                    <div class="mobile-input" data-bru-colour="000000" data-bru-text-colour="ffffff"
                                         data-bru-team-name="Germany" data-locked="0"></div>

                                    <div class="options editable-dropdown">
                                        <div class="goal goal0 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;right&quot;,0;)">0
                                        </div>
                                        <div class="goal goal1 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;right&quot;,1;)">1
                                        </div>
                                        <div class="goal goal2 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;right&quot;,2;)">2
                                        </div>
                                        <div class="goal goal3 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;right&quot;,3;)">3
                                        </div>
                                        <div class="goal goal4 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;right&quot;,4;)">4
                                        </div>
                                        <div class="goal goal5 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;right&quot;,5;)">5
                                        </div>
                                        <div class="goal goal6 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;right&quot;,6;)">6
                                        </div>
                                        <div class="goal goal7 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;right&quot;,7;)">7
                                        </div>
                                        <div class="goal goal8 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;right&quot;,8;)">8
                                        </div>
                                        <div class="goal goal9 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;right&quot;,9;)">9
                                        </div>
                                        <div class="goal goal10 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;right&quot;,10;)">10
                                        </div>
                                        <div class="goal goal11 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;right&quot;,11;)">11
                                        </div>
                                        <div class="goal goal12 "
                                             onclick="brupicks.soccer.setGoal(42,&quot;right&quot;,12;)">12
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="save-status tall"></div>
                            <div class="pick-status cricket"></div>
                        </div>

                        <div class="team"><span class="flag-icon flag-icon-de flag-icon-squared"></span>
                            <div class="name sevens">Germany</div>
                            <div class="streak-simple " style="margin-top:5px;" data-tournament-id="565"
                                 data-team-id="48" onclick="bru.ui.openStreak(565,48)">
                                <ul>
                                    <li class="l" data-tooltip="17 Jun: Lost to Mexico 0-1">L</li>
                                    <li class="w" data-tooltip="23 Jun: Beat Sweden 2-1">W</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="goal-report">
                        <div class="goals-scored"></div>
                        <div class="goals-scored"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="link" href="javascript:void(0)" tabindex="-1"
                   onclick="brupicks.openPastResults(565,61,48)"><span class="hide-mobile">Historic Results</span><span
                            class="hide-desktop">History</span></a>
                <div class="drop dark hide-mobile"><a class="link" tabindex="-1" href="javascript:void(0)">Pool
                        Picks</a>
                    <ul>
                        <li><a href="pool_view.php?t=565&amp;p=11846498&amp;g=42&amp;view=matches">Power Swans</a></li>
                        <li><a href="pool_view.php?t=565&amp;p=11831074&amp;g=42&amp;view=matches">Argentina Fans</a>
                        </li>
                    </ul>
                </div>
                <div class="hide-desktop action-sheet-trigger choose-pool" data-game-id="42" data-round-id="3"
                     data-tournament-id="565" onclick="bru.ui.openActionSheet($(this))"><a class="link" tabindex="-1"
                                                                                           href="javascript:void(0)">Pool
                        Picks</a>
                    <div class="action-sheet">
                        <ul class="">
                            <li><a href="pool.php?p=11846498#tab=matches&amp;subtab=game42">Power Swans</a></li>
                            <li><a href="pool.php?p=11831074#tab=matches&amp;subtab=game42">Argentina Fans</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="date-divider">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <h2>Tomorrow</h2>
        </div>
        <div class="match-card margin-bottom-only soccer " data-bru-pick="No pick" data-bru-tournament-id="565"
             data-bru-game-id="43" data-bru-round-id="3" data-bru-teams="Serbia v Brazil"
             data-bru-game-status="scheduled">
            <div class="card-header">
                <div class="venue">
                    <img src="https://superbru-cdn.scdn3.secure.raxcdn.com/coreimages/venue/265.jpg">
                    <div class="info">
                        <div class="name">Luzhniki Stadium, Moscow</div>
                        <div>
                            <div class="detail">Altitude: 156m</div>
                            <div class="detail">Capacity: 80,600</div>
                        </div>
                    </div>

                </div>

                <div class="date hide-desktop">28 Jun 01:00</div>
                <div class="date hide-mobile">Thursday 28 Jun 01:00</div>
            </div>
            <div class="card-content">

                <div class="card-content-inner">
                    <div class="team-area">
                        <div class="team"><span class="flag-icon flag-icon-rs flag-icon-squared"></span>
                            <div class="name sevens">Serbia</div>
                            <div class="streak-simple " style="margin-top:5px;" data-tournament-id="565"
                                 data-team-id="60" onclick="bru.ui.openStreak(565,60)">
                                <ul>
                                    <li class="w" data-tooltip="17 Jun: Beat Costa Rica 1-0">W</li>
                                    <li class="l" data-tooltip="22 Jun: Lost to Switzerland 1-2">L</li>
                                </ul>
                            </div>

                        </div>
                        <div class="picker" id="picker43"
                             data-bru-token="wymD2Fv8hyC6W5H5fmXzVaw6nTQboJftNwxC28xEpeGe1ujWpkA=">
                            <div class="soccer-picker" id="soccer-picker43" data-bru-game-id="43" data-bru-existing=""
                                 data-bru-left-comm="2.14" data-bru-right-comm="91.28">

                                <div class="goals left" data-bru-game-id="43">
                                    <input maxlength="2" class="editable-dropdown soccer-left-score" type="text"
                                           data-bru-colour="0C478D" data-bru-text-colour="ffffff" value=""
                                           data-bru-team-name="Serbia" tabindex="5" onclick="">

                                    <div class="mobile-input" data-bru-colour="0C478D" data-bru-text-colour="ffffff"
                                         data-bru-team-name="Serbia" data-locked="0"></div>

                                    <div class="options editable-dropdown">
                                        <div class="goal goal0 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;left&quot;,0;)">0
                                        </div>
                                        <div class="goal goal1 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;left&quot;,1;)">1
                                        </div>
                                        <div class="goal goal2 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;left&quot;,2;)">2
                                        </div>
                                        <div class="goal goal3 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;left&quot;,3;)">3
                                        </div>
                                        <div class="goal goal4 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;left&quot;,4;)">4
                                        </div>
                                        <div class="goal goal5 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;left&quot;,5;)">5
                                        </div>
                                        <div class="goal goal6 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;left&quot;,6;)">6
                                        </div>
                                        <div class="goal goal7 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;left&quot;,7;)">7
                                        </div>
                                        <div class="goal goal8 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;left&quot;,8;)">8
                                        </div>
                                        <div class="goal goal9 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;left&quot;,9;)">9
                                        </div>
                                        <div class="goal goal10 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;left&quot;,10;)">10
                                        </div>
                                        <div class="goal goal11 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;left&quot;,11;)">11
                                        </div>
                                        <div class="goal goal12 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;left&quot;,12;)">12
                                        </div>
                                    </div>
                                </div>

                                <div class="v">-</div>

                                <div class="goals right" data-bru-game-id="43">
                                    <input maxlength="2" class="editable-dropdown soccer-right-score"
                                           data-bru-colour="1D8D5C" data-bru-text-colour="FFE200" type="text" value=""
                                           data-bru-team-name="Brazil" tabindex="6">

                                    <div class="mobile-input" data-bru-colour="1D8D5C" data-bru-text-colour="FFE200"
                                         data-bru-team-name="Brazil" data-locked="0"></div>

                                    <div class="options editable-dropdown">
                                        <div class="goal goal0 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;right&quot;,0;)">0
                                        </div>
                                        <div class="goal goal1 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;right&quot;,1;)">1
                                        </div>
                                        <div class="goal goal2 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;right&quot;,2;)">2
                                        </div>
                                        <div class="goal goal3 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;right&quot;,3;)">3
                                        </div>
                                        <div class="goal goal4 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;right&quot;,4;)">4
                                        </div>
                                        <div class="goal goal5 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;right&quot;,5;)">5
                                        </div>
                                        <div class="goal goal6 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;right&quot;,6;)">6
                                        </div>
                                        <div class="goal goal7 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;right&quot;,7;)">7
                                        </div>
                                        <div class="goal goal8 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;right&quot;,8;)">8
                                        </div>
                                        <div class="goal goal9 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;right&quot;,9;)">9
                                        </div>
                                        <div class="goal goal10 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;right&quot;,10;)">10
                                        </div>
                                        <div class="goal goal11 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;right&quot;,11;)">11
                                        </div>
                                        <div class="goal goal12 "
                                             onclick="brupicks.soccer.setGoal(43,&quot;right&quot;,12;)">12
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="save-status tall"></div>
                            <div class="pick-status cricket"></div>
                        </div>

                        <div class="team"><span class="flag-icon flag-icon-br flag-icon-squared"></span>
                            <div class="name sevens">Brazil</div>
                            <div class="streak-simple " style="margin-top:5px;" data-tournament-id="565"
                                 data-team-id="41" onclick="bru.ui.openStreak(565,41)">
                                <ul>
                                    <li class="d" data-tooltip="17 Jun: Drew with Switzerland 1 - 1">D</li>
                                    <li class="w" data-tooltip="22 Jun: Beat Costa Rica 2-0">W</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="goal-report">
                        <div class="goals-scored"></div>
                        <div class="goals-scored"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="link" href="javascript:void(0)" tabindex="-1"
                   onclick="brupicks.openPastResults(565,60,41)"><span class="hide-mobile">Historic Results</span><span
                            class="hide-desktop">History</span></a>
                <div class="drop dark hide-mobile"><a class="link" tabindex="-1" href="javascript:void(0)">Pool
                        Picks</a>
                    <ul>
                        <li><a href="pool_view.php?t=565&amp;p=11846498&amp;g=43&amp;view=matches">Power Swans</a></li>
                        <li><a href="pool_view.php?t=565&amp;p=11831074&amp;g=43&amp;view=matches">Argentina Fans</a>
                        </li>
                    </ul>
                </div>
                <div class="hide-desktop action-sheet-trigger choose-pool" data-game-id="43" data-round-id="3"
                     data-tournament-id="565" onclick="bru.ui.openActionSheet($(this))"><a class="link" tabindex="-1"
                                                                                           href="javascript:void(0)">Pool
                        Picks</a>
                    <div class="action-sheet">
                        <ul class="">
                            <li><a href="pool.php?p=11846498#tab=matches&amp;subtab=game43">Power Swans</a></li>
                            <li><a href="pool.php?p=11831074#tab=matches&amp;subtab=game43">Argentina Fans</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="match-card margin-bottom-only soccer " data-bru-pick="No pick" data-bru-tournament-id="565"
             data-bru-game-id="44" data-bru-round-id="3" data-bru-teams="Switzerland v Costa Rica"
             data-bru-game-status="scheduled">
            <div class="card-header">
                <div class="venue">
                    <img src="https://superbru-cdn.scdn3.secure.raxcdn.com/coreimages/venue/12155.jpg">
                    <div class="info">
                        <div class="name">Nizhny Novgorod Stadium, Nizhny Novgorod</div>
                        <div>
                            <div class="detail">Altitude: 141m</div>
                            <div class="detail">Capacity: 44,899</div>
                        </div>
                    </div>

                </div>

                <div class="date hide-desktop">28 Jun 01:00</div>
                <div class="date hide-mobile">Thursday 28 Jun 01:00</div>
            </div>
            <div class="card-content">

                <div class="card-content-inner">
                    <div class="team-area">
                        <div class="team"><span class="flag-icon flag-icon-ch flag-icon-squared"></span>
                            <div class="name sevens">Switzerland</div>
                            <div class="streak-simple " style="margin-top:5px;" data-tournament-id="565"
                                 data-team-id="64" onclick="bru.ui.openStreak(565,64)">
                                <ul>
                                    <li class="d" data-tooltip="17 Jun: Drew with Brazil 1 - 1">D</li>
                                    <li class="w" data-tooltip="22 Jun: Beat Serbia 2-1">W</li>
                                </ul>
                            </div>

                        </div>
                        <div class="picker" id="picker44"
                             data-bru-token="wymD2Fv8hyC6W5H5fmXzVaw6nTQboJftNwxC28xEpeGe1ujRpkA=">
                            <div class="soccer-picker" id="soccer-picker44" data-bru-game-id="44" data-bru-existing=""
                                 data-bru-left-comm="81.44" data-bru-right-comm="4.89">

                                <div class="goals left" data-bru-game-id="44">
                                    <input maxlength="2" class="editable-dropdown soccer-left-score" type="text"
                                           data-bru-colour="DE3924" data-bru-text-colour="FFFFFF" value=""
                                           data-bru-team-name="Switzerland" tabindex="7" onclick="">

                                    <div class="mobile-input" data-bru-colour="DE3924" data-bru-text-colour="FFFFFF"
                                         data-bru-team-name="Switzerland" data-locked="0"></div>

                                    <div class="options editable-dropdown">
                                        <div class="goal goal0 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;left&quot;,0;)">0
                                        </div>
                                        <div class="goal goal1 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;left&quot;,1;)">1
                                        </div>
                                        <div class="goal goal2 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;left&quot;,2;)">2
                                        </div>
                                        <div class="goal goal3 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;left&quot;,3;)">3
                                        </div>
                                        <div class="goal goal4 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;left&quot;,4;)">4
                                        </div>
                                        <div class="goal goal5 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;left&quot;,5;)">5
                                        </div>
                                        <div class="goal goal6 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;left&quot;,6;)">6
                                        </div>
                                        <div class="goal goal7 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;left&quot;,7;)">7
                                        </div>
                                        <div class="goal goal8 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;left&quot;,8;)">8
                                        </div>
                                        <div class="goal goal9 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;left&quot;,9;)">9
                                        </div>
                                        <div class="goal goal10 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;left&quot;,10;)">10
                                        </div>
                                        <div class="goal goal11 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;left&quot;,11;)">11
                                        </div>
                                        <div class="goal goal12 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;left&quot;,12;)">12
                                        </div>
                                    </div>
                                </div>

                                <div class="v">-</div>

                                <div class="goals right" data-bru-game-id="44">
                                    <input maxlength="2" class="editable-dropdown soccer-right-score"
                                           data-bru-colour="093393" data-bru-text-colour="ffffff" type="text" value=""
                                           data-bru-team-name="Costa Rica" tabindex="8">

                                    <div class="mobile-input" data-bru-colour="093393" data-bru-text-colour="ffffff"
                                         data-bru-team-name="Costa Rica" data-locked="0"></div>

                                    <div class="options editable-dropdown">
                                        <div class="goal goal0 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;right&quot;,0;)">0
                                        </div>
                                        <div class="goal goal1 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;right&quot;,1;)">1
                                        </div>
                                        <div class="goal goal2 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;right&quot;,2;)">2
                                        </div>
                                        <div class="goal goal3 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;right&quot;,3;)">3
                                        </div>
                                        <div class="goal goal4 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;right&quot;,4;)">4
                                        </div>
                                        <div class="goal goal5 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;right&quot;,5;)">5
                                        </div>
                                        <div class="goal goal6 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;right&quot;,6;)">6
                                        </div>
                                        <div class="goal goal7 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;right&quot;,7;)">7
                                        </div>
                                        <div class="goal goal8 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;right&quot;,8;)">8
                                        </div>
                                        <div class="goal goal9 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;right&quot;,9;)">9
                                        </div>
                                        <div class="goal goal10 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;right&quot;,10;)">10
                                        </div>
                                        <div class="goal goal11 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;right&quot;,11;)">11
                                        </div>
                                        <div class="goal goal12 "
                                             onclick="brupicks.soccer.setGoal(44,&quot;right&quot;,12;)">12
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="save-status tall"></div>
                            <div class="pick-status cricket"></div>
                        </div>

                        <div class="team"><span class="flag-icon flag-icon-cr flag-icon-squared"></span>
                            <div class="name sevens">Costa Rica</div>
                            <div class="streak-simple " style="margin-top:5px;" data-tournament-id="565"
                                 data-team-id="42" onclick="bru.ui.openStreak(565,42)">
                                <ul>
                                    <li class="l" data-tooltip="17 Jun: Lost to Serbia 0-1">L</li>
                                    <li class="l" data-tooltip="22 Jun: Lost to Brazil 0-2">L</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="goal-report">
                        <div class="goals-scored"></div>
                        <div class="goals-scored"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="link" href="javascript:void(0)" tabindex="-1"
                   onclick="brupicks.openPastResults(565,64,42)"><span class="hide-mobile">Historic Results</span><span
                            class="hide-desktop">History</span></a>
                <div class="drop dark hide-mobile"><a class="link" tabindex="-1" href="javascript:void(0)">Pool
                        Picks</a>
                    <ul>
                        <li><a href="pool_view.php?t=565&amp;p=11846498&amp;g=44&amp;view=matches">Power Swans</a></li>
                        <li><a href="pool_view.php?t=565&amp;p=11831074&amp;g=44&amp;view=matches">Argentina Fans</a>
                        </li>
                    </ul>
                </div>
                <div class="hide-desktop action-sheet-trigger choose-pool" data-game-id="44" data-round-id="3"
                     data-tournament-id="565" onclick="bru.ui.openActionSheet($(this))"><a class="link" tabindex="-1"
                                                                                           href="javascript:void(0)">Pool
                        Picks</a>
                    <div class="action-sheet">
                        <ul class="">
                            <li><a href="pool.php?p=11846498#tab=matches&amp;subtab=game44">Power Swans</a></li>
                            <li><a href="pool.php?p=11831074#tab=matches&amp;subtab=game44">Argentina Fans</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="match-card margin-bottom-only soccer " data-bru-pick="No pick" data-bru-tournament-id="565"
             data-bru-game-id="45" data-bru-round-id="3" data-bru-teams="Japan v Poland"
             data-bru-game-status="scheduled">
            <div class="card-header">
                <div class="venue">
                    <img src="https://superbru-cdn.scdn3.secure.raxcdn.com/coreimages/venue/12157.jpg">
                    <div class="info">
                        <div class="name">Volgograd Arena, Volgograd</div>
                        <div>
                            <div class="detail">Altitude: 42m</div>
                            <div class="detail">Capacity: 45,568</div>
                        </div>
                    </div>

                </div>

                <div class="date hide-desktop">28 Jun 21:00</div>
                <div class="date hide-mobile">Thursday 28 Jun 21:00</div>
            </div>
            <div class="card-content">

                <div class="card-content-inner">
                    <div class="team-area">
                        <div class="team"><span class="flag-icon flag-icon-jp flag-icon-squared"></span>
                            <div class="name sevens">Japan</div>
                            <div class="streak-simple " style="margin-top:5px;" data-tournament-id="565"
                                 data-team-id="54" onclick="bru.ui.openStreak(565,54)">
                                <ul>
                                    <li class="w" data-tooltip="19 Jun: Beat Colombia 2-1">W</li>
                                    <li class="d" data-tooltip="24 Jun: Drew with Senegal 2 - 2">D</li>
                                </ul>
                            </div>

                        </div>
                        <div class="picker" id="picker45"
                             data-bru-token="wymD2Fv8hyC6W5H5fmXzVaw6nTQboJftNwxC28xEpeGe1ujQpkA=">
                            <div class="soccer-picker" id="soccer-picker45" data-bru-game-id="45" data-bru-existing=""
                                 data-bru-left-comm="50.98" data-bru-right-comm="23.39">

                                <div class="goals left" data-bru-game-id="45">
                                    <input maxlength="2" class="editable-dropdown soccer-left-score" type="text"
                                           data-bru-colour="E8001B" data-bru-text-colour="ffffff" value=""
                                           data-bru-team-name="Japan" tabindex="9" onclick="">

                                    <div class="mobile-input" data-bru-colour="E8001B" data-bru-text-colour="ffffff"
                                         data-bru-team-name="Japan" data-locked="0"></div>

                                    <div class="options editable-dropdown">
                                        <div class="goal goal0 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;left&quot;,0;)">0
                                        </div>
                                        <div class="goal goal1 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;left&quot;,1;)">1
                                        </div>
                                        <div class="goal goal2 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;left&quot;,2;)">2
                                        </div>
                                        <div class="goal goal3 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;left&quot;,3;)">3
                                        </div>
                                        <div class="goal goal4 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;left&quot;,4;)">4
                                        </div>
                                        <div class="goal goal5 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;left&quot;,5;)">5
                                        </div>
                                        <div class="goal goal6 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;left&quot;,6;)">6
                                        </div>
                                        <div class="goal goal7 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;left&quot;,7;)">7
                                        </div>
                                        <div class="goal goal8 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;left&quot;,8;)">8
                                        </div>
                                        <div class="goal goal9 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;left&quot;,9;)">9
                                        </div>
                                        <div class="goal goal10 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;left&quot;,10;)">10
                                        </div>
                                        <div class="goal goal11 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;left&quot;,11;)">11
                                        </div>
                                        <div class="goal goal12 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;left&quot;,12;)">12
                                        </div>
                                    </div>
                                </div>

                                <div class="v">-</div>

                                <div class="goals right" data-bru-game-id="45">
                                    <input maxlength="2" class="editable-dropdown soccer-right-score"
                                           data-bru-colour="EFEFEF" data-bru-text-colour="E3164D" type="text" value=""
                                           data-bru-team-name="Poland" tabindex="10">

                                    <div class="mobile-input" data-bru-colour="EFEFEF" data-bru-text-colour="E3164D"
                                         data-bru-team-name="Poland" data-locked="0"></div>

                                    <div class="options editable-dropdown">
                                        <div class="goal goal0 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;right&quot;,0;)">0
                                        </div>
                                        <div class="goal goal1 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;right&quot;,1;)">1
                                        </div>
                                        <div class="goal goal2 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;right&quot;,2;)">2
                                        </div>
                                        <div class="goal goal3 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;right&quot;,3;)">3
                                        </div>
                                        <div class="goal goal4 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;right&quot;,4;)">4
                                        </div>
                                        <div class="goal goal5 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;right&quot;,5;)">5
                                        </div>
                                        <div class="goal goal6 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;right&quot;,6;)">6
                                        </div>
                                        <div class="goal goal7 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;right&quot;,7;)">7
                                        </div>
                                        <div class="goal goal8 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;right&quot;,8;)">8
                                        </div>
                                        <div class="goal goal9 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;right&quot;,9;)">9
                                        </div>
                                        <div class="goal goal10 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;right&quot;,10;)">10
                                        </div>
                                        <div class="goal goal11 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;right&quot;,11;)">11
                                        </div>
                                        <div class="goal goal12 "
                                             onclick="brupicks.soccer.setGoal(45,&quot;right&quot;,12;)">12
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="save-status tall"></div>
                            <div class="pick-status cricket"></div>
                        </div>

                        <div class="team"><span class="flag-icon flag-icon-pl flag-icon-squared"></span>
                            <div class="name sevens">Poland</div>
                            <div class="streak-simple " style="margin-top:5px;" data-tournament-id="565"
                                 data-team-id="57" onclick="bru.ui.openStreak(565,57)">
                                <ul>
                                    <li class="l" data-tooltip="19 Jun: Lost to Senegal 1-2">L</li>
                                    <li class="l" data-tooltip="24 Jun: Lost to Colombia 0-3">L</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="goal-report">
                        <div class="goals-scored"></div>
                        <div class="goals-scored"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="link" href="javascript:void(0)" tabindex="-1"
                   onclick="brupicks.openPastResults(565,54,57)"><span class="hide-mobile">Historic Results</span><span
                            class="hide-desktop">History</span></a>
                <div class="drop dark hide-mobile"><a class="link" tabindex="-1" href="javascript:void(0)">Pool
                        Picks</a>
                    <ul>
                        <li><a href="pool_view.php?t=565&amp;p=11846498&amp;g=45&amp;view=matches">Power Swans</a></li>
                        <li><a href="pool_view.php?t=565&amp;p=11831074&amp;g=45&amp;view=matches">Argentina Fans</a>
                        </li>
                    </ul>
                </div>
                <div class="hide-desktop action-sheet-trigger choose-pool" data-game-id="45" data-round-id="3"
                     data-tournament-id="565" onclick="bru.ui.openActionSheet($(this))"><a class="link" tabindex="-1"
                                                                                           href="javascript:void(0)">Pool
                        Picks</a>
                    <div class="action-sheet">
                        <ul class="">
                            <li><a href="pool.php?p=11846498#tab=matches&amp;subtab=game45">Power Swans</a></li>
                            <li><a href="pool.php?p=11831074#tab=matches&amp;subtab=game45">Argentina Fans</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="match-card margin-bottom-only soccer " data-bru-pick="No pick" data-bru-tournament-id="565"
             data-bru-game-id="46" data-bru-round-id="3" data-bru-teams="Senegal v Colombia"
             data-bru-game-status="scheduled">
            <div class="card-header">
                <div class="venue">
                    <img src="https://superbru-cdn.scdn3.secure.raxcdn.com/coreimages/venue/12156.jpg">
                    <div class="info">
                        <div class="name">Cosmos Arena, Samara</div>
                        <div>
                            <div class="detail">Altitude: 117m</div>
                            <div class="detail">Capacity: 44,918</div>
                        </div>
                    </div>

                </div>

                <div class="date hide-desktop">28 Jun 21:00</div>
                <div class="date hide-mobile">Thursday 28 Jun 21:00</div>
            </div>
            <div class="card-content">

                <div class="card-content-inner">
                    <div class="team-area">
                        <div class="team"><span class="flag-icon flag-icon-sn flag-icon-squared"></span>
                            <div class="name sevens">Senegal</div>
                            <div class="streak-simple " style="margin-top:5px;" data-tournament-id="565"
                                 data-team-id="728" onclick="bru.ui.openStreak(565,728)">
                                <ul>
                                    <li class="w" data-tooltip="19 Jun: Beat Poland 2-1">W</li>
                                    <li class="d" data-tooltip="24 Jun: Drew with Japan 2 - 2">D</li>
                                </ul>
                            </div>

                        </div>
                        <div class="picker" id="picker46"
                             data-bru-token="wymD2Fv8hyC6W5H5fmXzVaw6nTQboJftNwxC28xEpeGe1ujTpkA=">
                            <div class="soccer-picker" id="soccer-picker46" data-bru-game-id="46" data-bru-existing=""
                                 data-bru-left-comm="29.37" data-bru-right-comm="42.29">

                                <div class="goals left" data-bru-game-id="46">
                                    <input maxlength="2" class="editable-dropdown soccer-left-score" type="text"
                                           data-bru-colour="FDF145" data-bru-text-colour="009047" value=""
                                           data-bru-team-name="Senegal" tabindex="11" onclick="">

                                    <div class="mobile-input" data-bru-colour="FDF145" data-bru-text-colour="009047"
                                         data-bru-team-name="Senegal" data-locked="0"></div>

                                    <div class="options editable-dropdown">
                                        <div class="goal goal0 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;left&quot;,0;)">0
                                        </div>
                                        <div class="goal goal1 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;left&quot;,1;)">1
                                        </div>
                                        <div class="goal goal2 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;left&quot;,2;)">2
                                        </div>
                                        <div class="goal goal3 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;left&quot;,3;)">3
                                        </div>
                                        <div class="goal goal4 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;left&quot;,4;)">4
                                        </div>
                                        <div class="goal goal5 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;left&quot;,5;)">5
                                        </div>
                                        <div class="goal goal6 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;left&quot;,6;)">6
                                        </div>
                                        <div class="goal goal7 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;left&quot;,7;)">7
                                        </div>
                                        <div class="goal goal8 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;left&quot;,8;)">8
                                        </div>
                                        <div class="goal goal9 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;left&quot;,9;)">9
                                        </div>
                                        <div class="goal goal10 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;left&quot;,10;)">10
                                        </div>
                                        <div class="goal goal11 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;left&quot;,11;)">11
                                        </div>
                                        <div class="goal goal12 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;left&quot;,12;)">12
                                        </div>
                                    </div>
                                </div>

                                <div class="v">-</div>

                                <div class="goals right" data-bru-game-id="46">
                                    <input maxlength="2" class="editable-dropdown soccer-right-score"
                                           data-bru-colour="0A419E" data-bru-text-colour="0244A0" type="text" value=""
                                           data-bru-team-name="Colombia" tabindex="12">

                                    <div class="mobile-input" data-bru-colour="0A419E" data-bru-text-colour="0244A0"
                                         data-bru-team-name="Colombia" data-locked="0"></div>

                                    <div class="options editable-dropdown">
                                        <div class="goal goal0 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;right&quot;,0;)">0
                                        </div>
                                        <div class="goal goal1 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;right&quot;,1;)">1
                                        </div>
                                        <div class="goal goal2 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;right&quot;,2;)">2
                                        </div>
                                        <div class="goal goal3 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;right&quot;,3;)">3
                                        </div>
                                        <div class="goal goal4 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;right&quot;,4;)">4
                                        </div>
                                        <div class="goal goal5 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;right&quot;,5;)">5
                                        </div>
                                        <div class="goal goal6 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;right&quot;,6;)">6
                                        </div>
                                        <div class="goal goal7 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;right&quot;,7;)">7
                                        </div>
                                        <div class="goal goal8 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;right&quot;,8;)">8
                                        </div>
                                        <div class="goal goal9 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;right&quot;,9;)">9
                                        </div>
                                        <div class="goal goal10 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;right&quot;,10;)">10
                                        </div>
                                        <div class="goal goal11 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;right&quot;,11;)">11
                                        </div>
                                        <div class="goal goal12 "
                                             onclick="brupicks.soccer.setGoal(46,&quot;right&quot;,12;)">12
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="save-status tall"></div>
                            <div class="pick-status cricket"></div>
                        </div>

                        <div class="team"><span class="flag-icon flag-icon-co flag-icon-squared"></span>
                            <div class="name sevens">Colombia</div>
                            <div class="streak-simple " style="margin-top:5px;" data-tournament-id="565"
                                 data-team-id="2202" onclick="bru.ui.openStreak(565,2202)">
                                <ul>
                                    <li class="l" data-tooltip="19 Jun: Lost to Japan 1-2">L</li>
                                    <li class="w" data-tooltip="24 Jun: Beat Poland 3-0">W</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="goal-report">
                        <div class="goals-scored"></div>
                        <div class="goals-scored"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="link" href="javascript:void(0)" tabindex="-1"
                   onclick="brupicks.openPastResults(565,728,2202)"><span
                            class="hide-mobile">Historic Results</span><span class="hide-desktop">History</span></a>
                <div class="drop dark hide-mobile"><a class="link" tabindex="-1" href="javascript:void(0)">Pool
                        Picks</a>
                    <ul>
                        <li><a href="pool_view.php?t=565&amp;p=11846498&amp;g=46&amp;view=matches">Power Swans</a></li>
                        <li><a href="pool_view.php?t=565&amp;p=11831074&amp;g=46&amp;view=matches">Argentina Fans</a>
                        </li>
                    </ul>
                </div>
                <div class="hide-desktop action-sheet-trigger choose-pool" data-game-id="46" data-round-id="3"
                     data-tournament-id="565" onclick="bru.ui.openActionSheet($(this))"><a class="link" tabindex="-1"
                                                                                           href="javascript:void(0)">Pool
                        Picks</a>
                    <div class="action-sheet">
                        <ul class="">
                            <li><a href="pool.php?p=11846498#tab=matches&amp;subtab=game46">Power Swans</a></li>
                            <li><a href="pool.php?p=11831074#tab=matches&amp;subtab=game46">Argentina Fans</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="date-divider">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <h2>Fri 29 Jun</h2>
        </div>
        <div class="match-card margin-bottom-only soccer " data-bru-pick="No pick" data-bru-tournament-id="565"
             data-bru-game-id="47" data-bru-round-id="3" data-bru-teams="Panama v Tunisia"
             data-bru-game-status="scheduled">
            <div class="card-header">
                <div class="venue">
                    <img src="https://superbru-cdn.scdn3.secure.raxcdn.com/coreimages/venue/12158.jpg">
                    <div class="info">
                        <div class="name">Mordovia Arena, Saransk</div>
                        <div>
                            <div class="detail">Altitude: 156m</div>
                            <div class="detail">Capacity: 44,442</div>
                        </div>
                    </div>

                </div>

                <div class="date hide-desktop">29 Jun 01:00</div>
                <div class="date hide-mobile">Friday 29 Jun 01:00</div>
            </div>
            <div class="card-content">

                <div class="card-content-inner">
                    <div class="team-area">
                        <div class="team"><span class="flag-icon flag-icon-pa flag-icon-squared"></span>
                            <div class="name sevens">Panama</div>
                            <div class="streak-simple " style="margin-top:5px;" data-tournament-id="565"
                                 data-team-id="2513" onclick="bru.ui.openStreak(565,2513)">
                                <ul>
                                    <li class="l" data-tooltip="18 Jun: Lost to Belgium 0-3">L</li>
                                    <li class="l" data-tooltip="24 Jun: Lost to England 1-6">L</li>
                                </ul>
                            </div>

                        </div>
                        <div class="picker" id="picker47"
                             data-bru-token="wymD2Fv8hyC6W5H5fmXzVaw6nTQboJftNwxC28xEpeGe1ujSpkA=">
                            <div class="soccer-picker" id="soccer-picker47" data-bru-game-id="47" data-bru-existing=""
                                 data-bru-left-comm="11.07" data-bru-right-comm="60.38">

                                <div class="goals left" data-bru-game-id="47">
                                    <input maxlength="2" class="editable-dropdown soccer-left-score" type="text"
                                           data-bru-colour="0765A6" data-bru-text-colour="ffffff" value=""
                                           data-bru-team-name="Panama" tabindex="13" onclick="">

                                    <div class="mobile-input" data-bru-colour="0765A6" data-bru-text-colour="ffffff"
                                         data-bru-team-name="Panama" data-locked="0"></div>

                                    <div class="options editable-dropdown">
                                        <div class="goal goal0 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;left&quot;,0;)">0
                                        </div>
                                        <div class="goal goal1 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;left&quot;,1;)">1
                                        </div>
                                        <div class="goal goal2 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;left&quot;,2;)">2
                                        </div>
                                        <div class="goal goal3 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;left&quot;,3;)">3
                                        </div>
                                        <div class="goal goal4 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;left&quot;,4;)">4
                                        </div>
                                        <div class="goal goal5 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;left&quot;,5;)">5
                                        </div>
                                        <div class="goal goal6 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;left&quot;,6;)">6
                                        </div>
                                        <div class="goal goal7 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;left&quot;,7;)">7
                                        </div>
                                        <div class="goal goal8 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;left&quot;,8;)">8
                                        </div>
                                        <div class="goal goal9 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;left&quot;,9;)">9
                                        </div>
                                        <div class="goal goal10 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;left&quot;,10;)">10
                                        </div>
                                        <div class="goal goal11 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;left&quot;,11;)">11
                                        </div>
                                        <div class="goal goal12 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;left&quot;,12;)">12
                                        </div>
                                    </div>
                                </div>

                                <div class="v">-</div>

                                <div class="goals right" data-bru-game-id="47">
                                    <input maxlength="2" class="editable-dropdown soccer-right-score"
                                           data-bru-colour="ED0000" data-bru-text-colour="ffffff" type="text" value=""
                                           data-bru-team-name="Tunisia" tabindex="14">

                                    <div class="mobile-input" data-bru-colour="ED0000" data-bru-text-colour="ffffff"
                                         data-bru-team-name="Tunisia" data-locked="0"></div>

                                    <div class="options editable-dropdown">
                                        <div class="goal goal0 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;right&quot;,0;)">0
                                        </div>
                                        <div class="goal goal1 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;right&quot;,1;)">1
                                        </div>
                                        <div class="goal goal2 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;right&quot;,2;)">2
                                        </div>
                                        <div class="goal goal3 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;right&quot;,3;)">3
                                        </div>
                                        <div class="goal goal4 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;right&quot;,4;)">4
                                        </div>
                                        <div class="goal goal5 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;right&quot;,5;)">5
                                        </div>
                                        <div class="goal goal6 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;right&quot;,6;)">6
                                        </div>
                                        <div class="goal goal7 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;right&quot;,7;)">7
                                        </div>
                                        <div class="goal goal8 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;right&quot;,8;)">8
                                        </div>
                                        <div class="goal goal9 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;right&quot;,9;)">9
                                        </div>
                                        <div class="goal goal10 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;right&quot;,10;)">10
                                        </div>
                                        <div class="goal goal11 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;right&quot;,11;)">11
                                        </div>
                                        <div class="goal goal12 "
                                             onclick="brupicks.soccer.setGoal(47,&quot;right&quot;,12;)">12
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="save-status tall"></div>
                            <div class="pick-status cricket"></div>
                        </div>

                        <div class="team"><span class="flag-icon flag-icon-tn flag-icon-squared"></span>
                            <div class="name sevens">Tunisia</div>
                            <div class="streak-simple " style="margin-top:5px;" data-tournament-id="565"
                                 data-team-id="67" onclick="bru.ui.openStreak(565,67)">
                                <ul>
                                    <li class="l" data-tooltip="18 Jun: Lost to England 1-2">L</li>
                                    <li class="l" data-tooltip="23 Jun: Lost to Belgium 2-5">L</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="goal-report">
                        <div class="goals-scored"></div>
                        <div class="goals-scored"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="link" href="javascript:void(0)" tabindex="-1" onclick="brupicks.openPastResults(565,2513,67)"><span
                            class="hide-mobile">Historic Results</span><span class="hide-desktop">History</span></a>
                <div class="drop dark hide-mobile"><a class="link" tabindex="-1" href="javascript:void(0)">Pool
                        Picks</a>
                    <ul>
                        <li><a href="pool_view.php?t=565&amp;p=11846498&amp;g=47&amp;view=matches">Power Swans</a></li>
                        <li><a href="pool_view.php?t=565&amp;p=11831074&amp;g=47&amp;view=matches">Argentina Fans</a>
                        </li>
                    </ul>
                </div>
                <div class="hide-desktop action-sheet-trigger choose-pool" data-game-id="47" data-round-id="3"
                     data-tournament-id="565" onclick="bru.ui.openActionSheet($(this))"><a class="link" tabindex="-1"
                                                                                           href="javascript:void(0)">Pool
                        Picks</a>
                    <div class="action-sheet">
                        <ul class="">
                            <li><a href="pool.php?p=11846498#tab=matches&amp;subtab=game47">Power Swans</a></li>
                            <li><a href="pool.php?p=11831074#tab=matches&amp;subtab=game47">Argentina Fans</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="match-card margin-bottom-only soccer " data-bru-pick="No pick" data-bru-tournament-id="565"
             data-bru-game-id="48" data-bru-round-id="3" data-bru-teams="England v Belgium"
             data-bru-game-status="scheduled">
            <div class="card-header">
                <div class="venue">
                    <img src="https://superbru-cdn.scdn3.secure.raxcdn.com/coreimages/venue/12154.jpg">
                    <div class="info">
                        <div class="name">Kaliningrad Stadium, Kaliningrad</div>
                        <div>
                            <div class="detail">Altitude: 7m</div>
                            <div class="detail">Capacity: 35,212</div>
                        </div>
                    </div>

                </div>

                <div class="date hide-desktop">29 Jun 01:00</div>
                <div class="date hide-mobile">Friday 29 Jun 01:00</div>
            </div>
            <div class="card-content">

                <div class="card-content-inner">
                    <div class="team-area">
                        <div class="team"><span class="flag-icon flag-icon-en flag-icon-squared"></span>
                            <div class="name sevens">England</div>
                            <div class="streak-simple " style="margin-top:5px;" data-tournament-id="565"
                                 data-team-id="46" onclick="bru.ui.openStreak(565,46)">
                                <ul>
                                    <li class="w" data-tooltip="18 Jun: Beat Tunisia 2-1">W</li>
                                    <li class="w" data-tooltip="24 Jun: Beat Panama 6-1">W</li>
                                </ul>
                            </div>

                        </div>
                        <div class="picker" id="picker48"
                             data-bru-token="wymD2Fv8hyC6W5H5fmXzVaw6nTQboJftNwxC28xEpeGe1ujdpkA=">
                            <div class="soccer-picker" id="soccer-picker48" data-bru-game-id="48" data-bru-existing=""
                                 data-bru-left-comm="25.90" data-bru-right-comm="40.30">

                                <div class="goals left" data-bru-game-id="48">
                                    <input maxlength="2" class="editable-dropdown soccer-left-score" type="text"
                                           data-bru-colour="DA0D2B" data-bru-text-colour="FFFFFF" value=""
                                           data-bru-team-name="England" tabindex="15" onclick="">

                                    <div class="mobile-input" data-bru-colour="DA0D2B" data-bru-text-colour="FFFFFF"
                                         data-bru-team-name="England" data-locked="0"></div>

                                    <div class="options editable-dropdown">
                                        <div class="goal goal0 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;left&quot;,0;)">0
                                        </div>
                                        <div class="goal goal1 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;left&quot;,1;)">1
                                        </div>
                                        <div class="goal goal2 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;left&quot;,2;)">2
                                        </div>
                                        <div class="goal goal3 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;left&quot;,3;)">3
                                        </div>
                                        <div class="goal goal4 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;left&quot;,4;)">4
                                        </div>
                                        <div class="goal goal5 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;left&quot;,5;)">5
                                        </div>
                                        <div class="goal goal6 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;left&quot;,6;)">6
                                        </div>
                                        <div class="goal goal7 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;left&quot;,7;)">7
                                        </div>
                                        <div class="goal goal8 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;left&quot;,8;)">8
                                        </div>
                                        <div class="goal goal9 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;left&quot;,9;)">9
                                        </div>
                                        <div class="goal goal10 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;left&quot;,10;)">10
                                        </div>
                                        <div class="goal goal11 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;left&quot;,11;)">11
                                        </div>
                                        <div class="goal goal12 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;left&quot;,12;)">12
                                        </div>
                                    </div>
                                </div>

                                <div class="v">-</div>

                                <div class="goals right" data-bru-game-id="48">
                                    <input maxlength="2" class="editable-dropdown soccer-right-score"
                                           data-bru-colour="000000" data-bru-text-colour="FBE754" type="text" value=""
                                           data-bru-team-name="Belgium" tabindex="16">

                                    <div class="mobile-input" data-bru-colour="000000" data-bru-text-colour="FBE754"
                                         data-bru-team-name="Belgium" data-locked="0"></div>

                                    <div class="options editable-dropdown">
                                        <div class="goal goal0 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;right&quot;,0;)">0
                                        </div>
                                        <div class="goal goal1 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;right&quot;,1;)">1
                                        </div>
                                        <div class="goal goal2 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;right&quot;,2;)">2
                                        </div>
                                        <div class="goal goal3 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;right&quot;,3;)">3
                                        </div>
                                        <div class="goal goal4 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;right&quot;,4;)">4
                                        </div>
                                        <div class="goal goal5 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;right&quot;,5;)">5
                                        </div>
                                        <div class="goal goal6 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;right&quot;,6;)">6
                                        </div>
                                        <div class="goal goal7 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;right&quot;,7;)">7
                                        </div>
                                        <div class="goal goal8 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;right&quot;,8;)">8
                                        </div>
                                        <div class="goal goal9 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;right&quot;,9;)">9
                                        </div>
                                        <div class="goal goal10 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;right&quot;,10;)">10
                                        </div>
                                        <div class="goal goal11 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;right&quot;,11;)">11
                                        </div>
                                        <div class="goal goal12 "
                                             onclick="brupicks.soccer.setGoal(48,&quot;right&quot;,12;)">12
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="save-status tall"></div>
                            <div class="pick-status cricket"></div>
                        </div>

                        <div class="team"><span class="flag-icon flag-icon-be flag-icon-squared"></span>
                            <div class="name sevens">Belgium</div>
                            <div class="streak-simple " style="margin-top:5px;" data-tournament-id="565"
                                 data-team-id="2205" onclick="bru.ui.openStreak(565,2205)">
                                <ul>
                                    <li class="w" data-tooltip="18 Jun: Beat Panama 3-0">W</li>
                                    <li class="w" data-tooltip="23 Jun: Beat Tunisia 5-2">W</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="goal-report">
                        <div class="goals-scored"></div>
                        <div class="goals-scored"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="link" href="javascript:void(0)" tabindex="-1" onclick="brupicks.openPastResults(565,46,2205)"><span
                            class="hide-mobile">Historic Results</span><span class="hide-desktop">History</span></a>
                <div class="drop dark hide-mobile"><a class="link" tabindex="-1" href="javascript:void(0)">Pool
                        Picks</a>
                    <ul>
                        <li><a href="pool_view.php?t=565&amp;p=11846498&amp;g=48&amp;view=matches">Power Swans</a></li>
                        <li><a href="pool_view.php?t=565&amp;p=11831074&amp;g=48&amp;view=matches">Argentina Fans</a>
                        </li>
                    </ul>
                </div>
                <div class="hide-desktop action-sheet-trigger choose-pool" data-game-id="48" data-round-id="3"
                     data-tournament-id="565" onclick="bru.ui.openActionSheet($(this))"><a class="link" tabindex="-1"
                                                                                           href="javascript:void(0)">Pool
                        Picks</a>
                    <div class="action-sheet">
                        <ul class="">
                            <li><a href="pool.php?p=11846498#tab=matches&amp;subtab=game48">Power Swans</a></li>
                            <li><a href="pool.php?p=11831074#tab=matches&amp;subtab=game48">Argentina Fans</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .app-promo {
                position: relative;
                margin: 0 0 40px 0;
                height: 175px;
                width: 100%;
            }

            .app-promo .phone {
                position: absolute;
                top: 0;
                left: 40px;
                z-index: 3;
            }

            .app-promo .info {
                position: absolute;
                top: 40px;
                left: 0;
                z-index: 2;
                border-top: 5px solid #00cc6d;
                border-bottom: 5px solid #00f2ff;
                background: #1f2e3f; /* Old browsers */
                background: -moz-linear-gradient(top, #1f2e3f 0%, #1f2e3f 100%); /* FF3.6-15 */
                background: -webkit-linear-gradient(top, #1f2e3f 0%, #1f2e3f 100%); /* Chrome10-25,Safari5.1-6 */
                background: linear-gradient(to bottom, #1f2e3f 0%, #1f2e3f 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
                color: #fff;
                width: 100%;
                padding: 10px 10px 10px 240px;
                box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.3);
                border-radius: 2px;
                height: 145px;
                -webkit-border-radius: 2px;
            }

            .app-promo .info .title {
                font-size: 1.3em;
                margin: 0 0 5px 0;
            }

            .app-promo .button-group {
                margin-top: 10px;
                -webkit-justify-content: flex-start;
                justify-content: flex-start;
            }

            .app-promo .button-group a {
                background: #00cc6d;
                margin-right: 25px;
                margin-left: 0;
            }

            .app-promo .button-group a:hover {
                background: #04e67d;
            }
        </style>
        <div class="app-promo hide-mobile">
            <div class="phone"><img
                        src="https://superbru-cdn.scdn3.secure.raxcdn.com/coreimages/structure/pl_2018_phone.png"
                        width="170"></div>
            <div class="info">
                <div class="title"><i class="fa fa-futbol-o" aria-hidden="true"></i> Premier League Predictor: now open!
                </div>
                <div>Enjoying the World Cup on Superbru? We run the Premier League too! First match: <b>Arsenal v Man
                        City (11 Aug)</b></div>
                <div class="button-group">
                    <a href="/premierleague_predictor/join_tournament.php?utm_source=play_promo" class="button">Join
                        Premier League Predictor</a>
                </div>
            </div>
        </div>
        <div class="card pick-summary margin-bottom-only hidden " tabindex="16">
            <div class="card-header center">
                <div>Your Pick Summary</div>
            </div>
            <div class="card-content">
                <div class="card-content-inner">
                    <div class="picks"></div>

                    <div class="base">
                        <form class="basic" onsubmit="" method="get" action="play_tipping_confirm.php">
                            <input type="hidden" id="r" name="r" value="3">
                            <div class="group check-group">
                                <label><input type="checkbox" id="e" name="e">Send an email confirmation of my picks to
                                    thailandteacherscorner@yahoo.com</label>
                            </div>
                            <input type="submit" href="" class="button" value="Continue">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // reinit - will this work on app?

            $(function () {
                brupicks.init();
            });

        </script>
    </div>

    <div class="right-col">
        <div class="card margin-bottom-only">
            <div class="card-header">TimTheTank's Round 3</div>
            <div class="card-content">
                <table class="data max">
                    <tbody>
                    <tr>
                        <td class="text-left">Your correct outcomes</td>
                        <td class="text-center">0 / 8</td>
                    </tr>
                    <tr>
                        <td class="text-left">Your exact scores</td>
                        <td class="text-center">0 / 8</td>
                    </tr>
                    <tr>
                        <td class="text-left">Matches remaining</td>
                        <td class="text-center">8</td>
                    </tr>
                    </tbody>
                </table>
                <table class="data max">
                    <tbody>
                    <tr>
                        <th></th>
                        <th class="text-center" data-tooltip="Community expectation">Expec</th>
                        <th class="text-center">Points</th>
                    </tr>
                    <tr>
                        <td class="text-left mono">URU&nbsp;3&nbsp;-&nbsp;0&nbsp;RUS</td>
                        <td class="text-center">34%</td>
                        <td class="text-right">
                            <div class="wenger-lozenge nopick no-result" data-brutip="You did not pick this game">
                                <div class="val">0</div>
                                <div class="desc">No pick</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left mono">SAU&nbsp;2&nbsp;-&nbsp;1&nbsp;EGY</td>
                        <td class="text-center">4%</td>
                        <td class="text-right">
                            <div class="wenger-lozenge nopick no-result" data-brutip="You did not pick this game">
                                <div class="val">0</div>
                                <div class="desc">No pick</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left mono">IRN&nbsp;1&nbsp;-&nbsp;1&nbsp;POR</td>
                        <td class="text-center">3%</td>
                        <td class="text-right">
                            <div class="wenger-lozenge nopick no-result" data-brutip="You did not pick this game">
                                <div class="val">0</div>
                                <div class="desc">No pick</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left mono">SPA&nbsp;2&nbsp;-&nbsp;2&nbsp;MOR</td>
                        <td class="text-center">1%</td>
                        <td class="text-right">
                            <div class="wenger-lozenge nopick no-result" data-brutip="You did not pick this game">
                                <div class="val">0</div>
                                <div class="desc">No pick</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left mono">DEN&nbsp;0&nbsp;-&nbsp;0&nbsp;FRA</td>
                        <td class="text-center">20%</td>
                        <td class="text-right">
                            <div class="wenger-lozenge nopick no-result" data-brutip="You did not pick this game">
                                <div class="val">0</div>
                                <div class="desc">No pick</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left mono">AUS&nbsp;0&nbsp;-&nbsp;2&nbsp;PER</td>
                        <td class="text-center">19%</td>
                        <td class="text-right">
                            <div class="wenger-lozenge nopick no-result" data-brutip="You did not pick this game">
                                <div class="val">0</div>
                                <div class="desc">No pick</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left mono">NIG&nbsp;1&nbsp;-&nbsp;2&nbsp;ARG</td>
                        <td class="text-center">64%</td>
                        <td class="text-right">
                            <div class="wenger-lozenge nopick no-result" data-brutip="You did not pick this game">
                                <div class="val">0</div>
                                <div class="desc">No pick</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left mono">ICE&nbsp;1&nbsp;-&nbsp;2&nbsp;CRO</td>
                        <td class="text-center">82%</td>
                        <td class="text-right">
                            <div class="wenger-lozenge nopick no-result" data-brutip="You did not pick this game">
                                <div class="val">0</div>
                                <div class="desc">No pick</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left mono">MEX v SWE</td>
                        <td class="text-center">-</td>
                        <td class="text-right">-</td>
                    </tr>
                    <tr>
                        <td class="text-left mono">SKR v GER</td>
                        <td class="text-center">-</td>
                        <td class="text-right">-</td>
                    </tr>
                    <tr>
                        <td class="text-left mono">SER v BRA</td>
                        <td class="text-center">-</td>
                        <td class="text-right">-</td>
                    </tr>
                    <tr>
                        <td class="text-left mono">SWI v COS</td>
                        <td class="text-center">-</td>
                        <td class="text-right">-</td>
                    </tr>
                    <tr>
                        <td class="text-left mono">JAP v POL</td>
                        <td class="text-center">-</td>
                        <td class="text-right">-</td>
                    </tr>
                    <tr>
                        <td class="text-left mono">SEN v COL</td>
                        <td class="text-center">-</td>
                        <td class="text-right">-</td>
                    </tr>
                    <tr>
                        <td class="text-left mono">PAN v TUN</td>
                        <td class="text-center">-</td>
                        <td class="text-right">-</td>
                    </tr>
                    <tr>
                        <td class="text-left mono">ENG v BEL</td>
                        <td class="text-center">-</td>
                        <td class="text-right">-</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="drop hide-mobile"><a class="link" tabindex="-1" href="javascript:void(0)">Pool Results for
                        Round 3</a>
                    <ul>
                        <li><a href="pool_view.php?t=565&amp;p=11846498&amp;view=rounds&amp;round_id=3">Power Swans</a>
                        </li>
                        <li><a href="pool_view.php?t=565&amp;p=11831074&amp;view=rounds&amp;round_id=3">Argentina
                                Fans</a></li>
                    </ul>
                </div>
                <div class="drop hide-desktop action-sheet-trigger" onclick="bru.ui.openActionSheet($(this))"><a
                            class="link drop" tabindex="-1" href="javascript:void(0)">Pool Results for Round 3</a>
                    <div class="action-sheet">
                        <ul class="slim">
                            <li><a href="pool_view.php?t=565&amp;p=11846498&amp;view=rounds&amp;round_id=3">Power
                                    Swans</a></li>
                            <li><a href="pool_view.php?t=565&amp;p=11831074&amp;view=rounds&amp;round_id=3">Argentina
                                    Fans</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card margin-bottom-only mini-log no-scroll" data-bru-initial="0">
            <div class="card-header">Standings</div>
            <div class="card-content">
                <div class="container">
                    <table class="data max slim mini-log-scrollable">
                        <tbody>
                        <tr>
                            <th colspan="2">Group: A</th>
                            <th class="text-center" data-tooltip="Won">W</th>
                            <th class="text-center" data-tooltip="Lost">L</th>
                            <th class="text-center" data-tooltip="Drawn">D</th>
                            <th class="text-center" data-tooltip="Points">Pts</th>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,630)">
                            <td class="text-center">1</td>
                            <td>
                                <div class="ellipsis ellipsis100">Uruguay</div>
                            </td>
                            <td class="text-center">3</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">9</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,2026)">
                            <td class="text-center">2</td>
                            <td>
                                <div class="ellipsis ellipsis100">Russia</div>
                            </td>
                            <td class="text-center">2</td>
                            <td class="text-center">1</td>
                            <td class="text-center">0</td>
                            <td class="text-center">6</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,59)">
                            <td class="text-center">3</td>
                            <td>
                                <div class="ellipsis ellipsis100">Saudi Arabia</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">2</td>
                            <td class="text-center">0</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,466)">
                            <td class="text-center">4</td>
                            <td>
                                <div class="ellipsis ellipsis100">Egypt</div>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">3</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                        </tr>
                        <tr>
                            <th colspan="2">Group: B</th>
                            <th class="text-center" data-tooltip="Won">W</th>
                            <th class="text-center" data-tooltip="Lost">L</th>
                            <th class="text-center" data-tooltip="Drawn">D</th>
                            <th class="text-center" data-tooltip="Points">Pts</th>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,62)">
                            <td class="text-center">1</td>
                            <td>
                                <div class="ellipsis ellipsis100">Spain</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">0</td>
                            <td class="text-center">2</td>
                            <td class="text-center">5</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,58)">
                            <td class="text-center">2</td>
                            <td>
                                <div class="ellipsis ellipsis100">Portugal</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">0</td>
                            <td class="text-center">2</td>
                            <td class="text-center">5</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,51)">
                            <td class="text-center">3</td>
                            <td>
                                <div class="ellipsis ellipsis100">Iran</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td class="text-center">4</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,734)">
                            <td class="text-center">4</td>
                            <td>
                                <div class="ellipsis ellipsis100">Morocco</div>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">2</td>
                            <td class="text-center">1</td>
                            <td class="text-center">1</td>
                        </tr>
                        <tr>
                            <th colspan="2">Group: C</th>
                            <th class="text-center" data-tooltip="Won">W</th>
                            <th class="text-center" data-tooltip="Lost">L</th>
                            <th class="text-center" data-tooltip="Drawn">D</th>
                            <th class="text-center" data-tooltip="Points">Pts</th>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,47)">
                            <td class="text-center">1</td>
                            <td>
                                <div class="ellipsis ellipsis100">France</div>
                            </td>
                            <td class="text-center">2</td>
                            <td class="text-center">0</td>
                            <td class="text-center">1</td>
                            <td class="text-center">7</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,623)">
                            <td class="text-center">2</td>
                            <td>
                                <div class="ellipsis ellipsis100">Denmark</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">0</td>
                            <td class="text-center">2</td>
                            <td class="text-center">5</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,2390)">
                            <td class="text-center">3</td>
                            <td>
                                <div class="ellipsis ellipsis100">Peru</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">2</td>
                            <td class="text-center">0</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,40)">
                            <td class="text-center">4</td>
                            <td>
                                <div class="ellipsis ellipsis100">Australia</div>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">2</td>
                            <td class="text-center">1</td>
                            <td class="text-center">1</td>
                        </tr>
                        <tr>
                            <th colspan="2">Group: D</th>
                            <th class="text-center" data-tooltip="Won">W</th>
                            <th class="text-center" data-tooltip="Lost">L</th>
                            <th class="text-center" data-tooltip="Drawn">D</th>
                            <th class="text-center" data-tooltip="Points">Pts</th>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,43)">
                            <td class="text-center">1</td>
                            <td>
                                <div class="ellipsis ellipsis100">Croatia</div>
                            </td>
                            <td class="text-center">3</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">9</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,39)">
                            <td class="text-center">2</td>
                            <td>
                                <div class="ellipsis ellipsis100">Argentina</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td class="text-center">4</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,627)">
                            <td class="text-center">3</td>
                            <td>
                                <div class="ellipsis ellipsis100">Nigeria</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">2</td>
                            <td class="text-center">0</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,2506)">
                            <td class="text-center">4</td>
                            <td>
                                <div class="ellipsis ellipsis100">Iceland</div>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">2</td>
                            <td class="text-center">1</td>
                            <td class="text-center">1</td>
                        </tr>
                        <tr>
                            <th colspan="2">Group: E</th>
                            <th class="text-center" data-tooltip="Won">W</th>
                            <th class="text-center" data-tooltip="Lost">L</th>
                            <th class="text-center" data-tooltip="Drawn">D</th>
                            <th class="text-center" data-tooltip="Points">Pts</th>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,41)">
                            <td class="text-center">1</td>
                            <td>
                                <div class="ellipsis ellipsis100">Brazil</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">0</td>
                            <td class="text-center">1</td>
                            <td class="text-center">4</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,64)">
                            <td class="text-center">2</td>
                            <td>
                                <div class="ellipsis ellipsis100">Switzerland</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">0</td>
                            <td class="text-center">1</td>
                            <td class="text-center">4</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,60)">
                            <td class="text-center">3</td>
                            <td>
                                <div class="ellipsis ellipsis100">Serbia</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td class="text-center">0</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,42)">
                            <td class="text-center">4</td>
                            <td>
                                <div class="ellipsis ellipsis100">Costa Rica</div>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">2</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                        </tr>
                        <tr>
                            <th colspan="2">Group: F</th>
                            <th class="text-center" data-tooltip="Won">W</th>
                            <th class="text-center" data-tooltip="Lost">L</th>
                            <th class="text-center" data-tooltip="Drawn">D</th>
                            <th class="text-center" data-tooltip="Points">Pts</th>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,55)">
                            <td class="text-center">1</td>
                            <td>
                                <div class="ellipsis ellipsis100">Mexico</div>
                            </td>
                            <td class="text-center">2</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">6</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,48)">
                            <td class="text-center">2</td>
                            <td>
                                <div class="ellipsis ellipsis100">Germany</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td class="text-center">0</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,63)">
                            <td class="text-center">-</td>
                            <td>
                                <div class="ellipsis ellipsis100">Sweden</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td class="text-center">0</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,61)">
                            <td class="text-center">4</td>
                            <td>
                                <div class="ellipsis ellipsis100">South Korea</div>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">2</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                        </tr>
                        <tr>
                            <th colspan="2">Group: G</th>
                            <th class="text-center" data-tooltip="Won">W</th>
                            <th class="text-center" data-tooltip="Lost">L</th>
                            <th class="text-center" data-tooltip="Drawn">D</th>
                            <th class="text-center" data-tooltip="Points">Pts</th>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,2205)">
                            <td class="text-center">1</td>
                            <td>
                                <div class="ellipsis ellipsis100">Belgium</div>
                            </td>
                            <td class="text-center">2</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">6</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,46)">
                            <td class="text-center">-</td>
                            <td>
                                <div class="ellipsis ellipsis100">England</div>
                            </td>
                            <td class="text-center">2</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">6</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,67)">
                            <td class="text-center">3</td>
                            <td>
                                <div class="ellipsis ellipsis100">Tunisia</div>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">2</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,2513)">
                            <td class="text-center">4</td>
                            <td>
                                <div class="ellipsis ellipsis100">Panama</div>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">2</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                        </tr>
                        <tr>
                            <th colspan="2">Group: H</th>
                            <th class="text-center" data-tooltip="Won">W</th>
                            <th class="text-center" data-tooltip="Lost">L</th>
                            <th class="text-center" data-tooltip="Drawn">D</th>
                            <th class="text-center" data-tooltip="Points">Pts</th>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,54)">
                            <td class="text-center">1</td>
                            <td>
                                <div class="ellipsis ellipsis100">Japan</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">0</td>
                            <td class="text-center">1</td>
                            <td class="text-center">4</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,728)">
                            <td class="text-center">-</td>
                            <td>
                                <div class="ellipsis ellipsis100">Senegal</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">0</td>
                            <td class="text-center">1</td>
                            <td class="text-center">4</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,2202)">
                            <td class="text-center">3</td>
                            <td>
                                <div class="ellipsis ellipsis100">Colombia</div>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td class="text-center">0</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr onclick="bru.ui.openStreak(565,57)">
                            <td class="text-center">4</td>
                            <td>
                                <div class="ellipsis ellipsis100">Poland</div>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">2</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer"><a href="log.php">Full Table</a></div>
        </div>
    </div>
</div>
