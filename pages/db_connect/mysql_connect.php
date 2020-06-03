
<?php
 

session_start();
$bdd= new PDO('mysql:host=127.0.0.1;dbname=dotit','root' ,'test123');

if(isset($_POST['formport']))
{ 
    $_SESSION['server'] = $_POST['hostname'];
    $_SESSION['port'] = $_POST['port'];
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];

    $server_connect = NULL;
    $server_connect = new PDO( "mysql:host=".$_SESSION['server'], $_SESSION['username'], $_SESSION['password']);

    if($server_connect != NULL) {
        header('location: ?page=listing_db');
    } else {
        $_SESSION['error'] = "Une erreur s'est établie lors de la connexion au serveur !";
    }
}  
    ?> 
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box"> 
            <form role="form" action="" method="post" class="f1">
            <fieldset>
                   <center> <h2>Connexion au serveur Mysql</h2></center><br>

                   <?php if(isset($_SESSION['error'])): ?>
                        <font color="red"><?= $_SESSION['error'] ?></font>
                   <?php endif; ?>
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
 