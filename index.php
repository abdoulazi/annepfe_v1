<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> DOT-IT Migration </title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css">

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
 

    </head>

    <body style="background-image: url('img/backgrounds/1.jpg');background-repeat: no-repeat;background-size: 100% 100%;">
        <!-- Top content -->
        <div class="top-content">
            <div class="container">
                
                <div class="row">
                    <div class="col-sm-7 col-sm-offset-3 text">
                        <h1><strong>DOT-IT MIGRATION </strong></h1>
                        <div class="description">
                       	    <p>
                                This is a free platform for Database Migration 
                                <ul class="progressbar">
                                    <li class="<?php if(isset($_GET['step'])) {  if($_GET['step'] == '1') { echo 'active'; } } else { echo 'active'; }  ?> ">Step 1</li>
                                    <li class="<?php if(isset($_GET['step'])) {  if($_GET['step'] == '2') { echo 'active'; } }  ?> ">Step 2</li>
                                    <li class="<?php if(isset($_GET['step'])) {  if($_GET['step'] == '3') { echo 'active'; } }  ?> ">Step 3</li>
                                    <li class="<?php if(isset($_GET['step'])) {  if($_GET['step'] == '4') { echo 'active'; } }  ?> ">Step 4</li>
                                    <li class="<?php if(isset($_GET['step'])) {  if($_GET['step'] == '5') { echo 'active'; } }  ?> ">Step 5</li>
                                    <li class="<?php if(isset($_GET['step'])) {  if($_GET['step'] == '6') { echo 'active'; } }  ?> ">Step 6</li> 
                                    <li class="<?php if(isset($_GET['step'])) {  if($_GET['step'] == '7') { echo 'active'; } }  ?> ">Step 7</li> 
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>

                 <?php 

                 if(isset($_SESSION['id'])) {
 
                 	if(isset($_GET['page'])) {
                 		$page = $_GET['page'];
                 		switch ($page) {
                 			case 'db_type':
                 				require 'pages/db_type.php';
                 				break;

                 			case 'db_connect':
                 				require 'pages/db_connect.php';
                 				break;

                 			case 'listing_db':
                 				require 'pages/listing_db.php';
                 				break;

                 			case 'listing_table':
                 				require 'pages/listing_table.php';
                 				break;

                            case 'add_database':
                                require 'pages/add_database.php';
                                break;
                 			
                 			default:
                 				require 'pages/db_type.php';
                 				break;
                 		}

                 	} else {
                 		require 'pages/db_type.php';
                 	} 
                 } else {
                 	require 'pages/login.php';
                 }

                 ?> 
            </div>  
        </div>
 
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

        <script>
            function getcheckboxes() {
                var node_list = document.getElementsByTagName('input');
                var checkboxes = [];
                for (var i = 0; i < node_list.length; i++) 
                {
                    var node = node_list[i];
                    if (node.getAttribute('type') == 'checkbox') 
                {
                        checkboxes.push(node);
                    }
                } 
                return checkboxes;
            }
            function toggle(source) {
              checkboxes = getcheckboxes();
              for(var i=0, n=checkboxes.length;i<n;i++) 
              {
                checkboxes[i].checked = source.checked;
              }
            }
        </script>
    </body>

</html>