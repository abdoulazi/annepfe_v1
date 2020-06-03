
<?php
 

session_start();
$bdd= new PDO('mysql:host=127.0.0.1;dbname=dotit','root' ,'test123');

if(isset($_POST['formport']))
{
    $hostname = $_POST['hostname'];
    $port = $_POST['port'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($hostname) AND !empty($port) AND! empty($username) AND !empty($password))
    {
        if(($username!="root") AND ($password!="root"))

            {
                $erreur = "username ou password incorrect!";
            }
            else
                {
                  header("Location: baseSQL.php");
                }
  }


    else
    {
        $erreur = "Tous les champs doivent �tre remplis";
    }
}

?>
  
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box"> 
                    	<form role="form" action="" method="post" class="f1">
						<fieldset>
                               <center> <h2>Connexion à SqlServer</h2></center>
                    			<div class="form-group">
								<label> <strong> Hostname: </strong></label>
 
                    			    <label class="sr-only" for="f1-first-hostname">Hostname</label>
                                    <input type="text" name="hostname" placeholder="Enter Your Hostname ..." class="f1-first-hostname form-control" id="f1-hostname"/>
                                </div>
								<div class="form-group">
								<label> <strong> Port: </strong></label>
                    			    <label class="sr-only" for="f1-first-port">Port</label>
                                    <input type="text" name="port" placeholder="3306" class="f1-first-port form-control" id="f1-port"/>
                                </div>
								<div class="form-group">
								<label> <strong> Username: </strong></label>
                    			    <label class="sr-only" for="f1-first-username">Username</label>
                                    <input type="text" name="username" placeholder="Enter Your Username ..." class="f1-first-username form-control" id="f1-username"/>
                                </div>
                                <div class="form-group">
								<label> <strong> Password:</strong></label>
                                    <label class="sr-only" for="f1-last-name">Password</label>
									<input type="password" name="password" id="f1-password"  placeholder="Enter Your Password ..." class="f1-password form-control"  />
                                        <span id="error_password" class="f1-password-danger"></span> <br>
								</div>

						    </fieldset>

                                <div class="f1-buttons">
                                   <a href="dbtype.php"> <button type="button" class="btn btn-previous">Previous</button>
                                    <a href="base.php"> <button type="submit" name="formport" class="btn btn-next">Next</button>
                                </div>

                                                 <?php
                                                    if(isset($erreur))
                                                        {
                                                            echo '<font color="red">'.$erreur."</font>";
                                                        }
                                                ?>


                    	</form>
                    </div>
                </div>
 