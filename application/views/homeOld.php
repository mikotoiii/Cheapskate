<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Cheapskate - Find Tonight's Specials, You Cheap Prick!</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/flexslider.css" type="text/css">
    <link rel="stylesheet" href="css/main.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
    <div id="main">
        <div id="daysWrapper" class="flexslider">
             <div id="venueDetailsContainer" style="display:none;">
                <div id="venueDetailsCloseBtn"><i class="fa fa-close"></i></div>
                <div id="venueTitle"></div>
                <div id="venueDetails"></div>
                <div id="venueMap">
                    <div id="map-canvas"></div>
                </div>
                <div id="venueDirections"></div>
            </div>
            <ul id="daysContainer" class="slides">
                <li id="day0"></li>
                <li id="day1"></li>
                <li id="day2"></li>
                <li id="day3"></li>
                <li id="day4"></li>
                <li id="day5"></li>
                <li id="day6"></li>
            </ul>
           
        </div>
								<div class="footer">
												<a href="login">Login</a> | <a href="register">Sign Up</a>
												<a href="about">About</a> | <a href="api">API</a> | <a href="contact">Contact Us</a> | 
												<a href="submit">Submit an Event or Deal</a>
								</div>
    </div>
				
    <script src="js/vendor/jquery-1.9.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/testData.js"></script>
    <script src="js/main.js"></script>


    <script src="js/vendor/jquery.flexslider.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>
    <script type="text/javascript" src="js/maps.js"></script>

</body>
</html>
