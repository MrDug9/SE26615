<?php
/**
 * Created by PhpStorm.
 * User: gamer
 * Date: 10/29/2017
 * Time: 10:16 AM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        <?php echo($title)  ?>
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
<?php
include("stylesheet.css");
?>
</style>
<body>
<div class="jumbotron text-center">

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?action=home"><img class="logo-1" src="assets/images/logo-2.png"
                                                              alt="logo-1" height="30px"></a>
            </div>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="?action=home">Home</a></li>
                     <li><a href="#">Page 1</a></li>
                     <li><a href="#">Page 2</a></li>
                    </ul>
                <ul class="nav navbar-nav navbar-right">
                   <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                   <li><a href="?action=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>



