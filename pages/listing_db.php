
<?php 

$server_connect = new PDO( "mysql:host=".$_SESSION['server'], $_SESSION['username'], $_SESSION['password']);

$all_database1 = $server_connect->query( "SELECT schema_name FROM information_schema.schemata WHERE schema_name
   NOT IN ('information_schema', 'mysql', 'performance_schema','sys')");

$all_database2 = $server_connect->query( "SELECT schema_name FROM information_schema.schemata WHERE schema_name
   NOT IN ('information_schema', 'mysql', 'performance_schema','sys')");


if(isset($_POST['db_selected'])) {
    $_SESSION['database1'] = $_POST['database1'];
    $_SESSION['database2'] = $_POST['database2'];

    header('location: ?page=listing_table');
}
?>
 

<div class="row">
    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
    	<form role="form" action="?page=listing_db" method="post" class="f1">

    <h1>Select Database </h1>
    <!--<label class="container">
        <label style="float:left;"> -->
    <fieldset>
        <div class="form-group">
        <label class="container">
            
                    <div class="row">
                        <div class="col-lg-6">
                            <label>BD de depart</label>
                            <select name="database1" class="form-control" required>
                                <?php while($db_name = $all_database1->fetchColumn()): ?>
                                    <option value="<?= $db_name ?>"><?= $db_name ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label> BD destination</label>
                            <select name="database2" class="form-control" required>
                                <?php while($db_name2 = $all_database2->fetchColumn()): ?>
                                    <option value="<?= $db_name2 ?>"><?= $db_name2 ?></option>
                                <?php endwhile; ?>
                            </select>
                            <a href="#"><small>+ Ajouter une BD</small></a><br>  
                        </div> 
                    </div>  
         </label>

            <div class="f1-buttons">
            <button type="button" class="btn btn-previous">Previous</button>
            <button type="submit" name="db_selected" name="formbase" class="btn btn-next">Next</button>
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
 
