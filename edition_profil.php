<!--php
session_start();
$bdd= new PDO('mysql:host=127.0.0.1;dbname=dotit','root' ,'');

if(isset($_POST['formconnexion']))
{
    $login = htmlspecialchars($_POST['login']);
    $password = sha1($_POST['password']);
    if (!empty($login) AND !empty($password))
    {
        $requser = $bdd -> prepare("SELECT * FROM essai WHERE login=? AND password=?");
        $requser -> execute(array($login, $password));
        $userexist = $requser -> rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser -> fetch();
            $_SESSION['id']= $userinfo['id'];
            $_SESSION['login']= $userinfo['login'];
            $_SESSION['password'] = $userinfo['password'];
            header("Location: profil.php?id=".$_SESSION['id']);
        }
        else
        {
            $erreur= "Votre mail ou mot de passe n'est pas correct";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent être remplis";
    }
}

?>   -->

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
                                    <li class="active">Step 3</li>
                                    <li>Step 4</li>
                                    <li>Step 5</li>
                                    <li>Step 6</li>
                                    <li>Step 7</li>
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
								<label> <strong> Nouveau login: </strong></label>
                                

                                
                    			    <label class="sr-only" for="f1-first-hostname">Nouveau login</label>
                                    <input type="text" name="f1-first-hostname" placeholder="Enter Your Hostname ..." class="f1-first-hostname form-control" id="f1-hostname"/>
                                </div>
								<div class="form-group">
								<label> <strong> Nouvelle adresse mail: </strong></label>
                    			    <label class="sr-only" for="f1-first-port">Nouvelle adresse mail</label>
                                    <input type="text" name="f1-first-port" placeholder="3306" class="f1-first-port form-control" id="f1-port"/>
                                </div>
								<div class="form-group">
								<label> <strong> Username: </strong></label>
                    			    <label class="sr-only" for="f1-first-username">Username</label>
                                    <input type="text" name="f1-first-username" placeholder="Enter Your Username ..." class="f1-first-username form-control" id="f1-username"/>
                                </div>
                                <div class="form-group">
								<label> <strong> Password:</strong></label>
                                    <label class="sr-only" for="f1-last-name">Password</label>
									<input type="password" name="f1-password" id="f1-password"  placeholder="Enter Your Password ..." class="f1-password form-control"  />
                                        <span id="error_password" class="f1-password-danger"></span> <br>
								</div>	
                                
						    </fieldset>
				
                                <div class="f1-buttons">
                                   <a href="dbtype.php"> <button type="button" class="btn btn-previous">Previous</button>
                                    <a href="base.php"> <button type="button" class="btn btn-next">Next</button>
                                </div>
                            
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