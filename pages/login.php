<?php
 
$bdd= new PDO('mysql:host=127.0.0.1;dbname=dotit','root' ,'test123');

if(isset($_POST['formconnexion']))
{
    $loginconnect = ($_POST['loginconnect']);
    $mdpconnect = ($_POST['mdpconnect']);
    if (!empty($loginconnect) AND !empty($mdpconnect))
    {
        $requser = $bdd -> prepare("SELECT * FROM membres WHERE login=? AND mdp=?");
        $requser -> execute(array($loginconnect, $mdpconnect));
        $userexist = $requser -> rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser -> fetch();
            $_SESSION['id']= $userinfo['id'];
            $_SESSION['nom']= $userinfo['nom'];
            $_SESSION['prenom']= $userinfo['prenom'];
            $_SESSION['login'] = $userinfo['login'];
            
            header("Location: ?page=db_type&step=2");
        }
        else
        {
            $erreur= "Votre login ou mot de passe n'est pas correct";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent être remplis";
    }
}

?> 

                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                    	<form role="form" action="" method="post" class="f1">
                    		<fieldset>
                    			<div class="form-group">
								<label> <strong> Login: </strong></label>
                    			    <label class="sr-only" for="f1-first-name">Login</label>
                                    <input type="text" name="loginconnect" placeholder="Enter Your Login ..." class="f1-first-name form-control" id="f1-login">
                                </div>
                                <div class="form-group">
								<label> <strong> Password:</strong></label>
                                    <label class="sr-only" for="f1-last-name">Password</label>
									<input type="password" name="mdpconnect" id="f1-password"  placeholder="Enter Your Password ..." class="f1-password form-control"  />
                                        <span id="error_password" class="f1-password-danger"></span> <br>
								 <div class="f1-buttons">
                                    <button type="submit" name="formconnexion" class="btn btn-next"> OK </button>
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

