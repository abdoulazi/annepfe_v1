<?php
session_start();
$bdd= new PDO('mysql:host=127.0.0.1;dbname=dotit','root' ,'test123');

if(isset($_POST['formnbase']))
{
    $nombase = ($_POST['nombase']);
    
    if (!empty($nombase))
    {
        $sql = "CREATE DATABASE $nombase";
        $bdd->exec($sql);
        $erreur = "Base de données créée !";

    }
    else
    {
        $erreur = "Tous les champs doivent être remplis";
    }
}

?>

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
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1><strong>DOT-IT MIGRATION </strong></h1>
                        <div class="description">
                       	    <p>
                                This is a free platform for Database Migration 
                                <ul class="progressbar">
                                    <li> <a href=login.php>Step 1</a></li>
                                    <li><a href="dbtype.php">Step 2</a></li>
                                    <li><a href="portSQL.php">Step 3</a></li>
                                    <li><a href="baseSQL.php">Step 4</a></li>
                                    <li><a href="tableSQL.php">Step 5</a></li>
                                    <li><a href="dbdestination.php">Step 6</a></li>
                                    <li class="active">Step 7</li>
                                    <li>Step 8</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                    	<form role="form" action="" method="post" class="f1">
                    		<fieldset>
                    			<div class="form-group">
								<label> <strong> Entrer le nom de la nouvelle base de données: </strong></label>
                    			    <label class="sr-only" for="f1-first-name">Name</label>
                                    <input type="text" name="nombase" placeholder="Name..." class="f1-first-name form-control" id="f1-login">
                                </div>
								
								 <div class="f1-buttons">
                                    <button type="submit" name="formnbase" class="btn btn-next"> OK </button>
                                </div>	
                                </div>
						    </fieldset>

                            <?php
        if(isset($erreur))
        {
            echo '<font color="red">'.$erreur."</font>";
        }
        ?>
                    	</form>


                    </div>
                </div>
            </div>  
        </div>
        

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

        
    </body>

</html>