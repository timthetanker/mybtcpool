<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>
        <?php
        if(isset($meta_title) && !empty($meta_title)) echo $meta_title; else echo 'Pickem APP'
        ?>
    </title>
    <style>
        body{
            margin: 0 auto;
            max-width: 1200px;
        }
    </style>
    <?php
    echo link_tag('public/css/style.css');
    echo link_tag('public/css/sports.css');
    #TODO fix navbar ahref possible solution link_tag
    ?>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Pickem APP</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="/index">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="<?php echo site_url('users/dashboard') ?>">Play</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            if(!isset($_SESSION['userID'])){?>
                <li><a href="/users/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="/users/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php
            }
            if(isset($_SESSION['userID'])){?>
                <li><a href="/users/logout"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
                <li><a href="/users/profile"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
                <?php
            }
            ?>
        </ul>
    </div>
</nav>
<div class="container">
