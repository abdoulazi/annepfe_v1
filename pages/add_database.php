
<?php 

$server_connect = new PDO( "mysql:host=".$_SESSION['server'], $_SESSION['username'], $_SESSION['password']);

  

if(isset($_POST['create'])) {

    $dbname = $_POST['dbname'];
    // Creation de la base
    $requete = $server_connect->query('CREATE DATABASE '.$dbname);

    if($requete) {
        $_SESSION['message'] = '<font color="green">La base de données "'.$dbname.'" a été créée avec succès</font>';  
    } else {
        $_SESSION['message'] = '<font color="red">Une erreur est survenue lors de la création de la base de données</font>';
    }

    // Redirection vers la page listingdb

    header('location: ?page=listing_db');
}
?>
 

<div class="row">
    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
    	<form role="form" action="?page=add_database" method="post" class="f1">

    <h1>Créer une nouvelle Base de donnée </h1>
    <!--<label class="container">
        <label style="float:left;"> -->
    <fieldset>
        <div class="form-group">
        <label class="container">
            
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nom de la base<font color="red">*</font></label>
                                <input type="text" name="dbname" class="form-control" placeholder="Nom de la base" required>
                            </div>
                        </div> 
                    </div>  
         </label>

            <div class="f1-buttons">
           <!--  <button type="button" class="btn btn-previous">Previous</button> -->
            <button type="submit"  name="create" class="btn btn-next">Créer la base</button>
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
 
