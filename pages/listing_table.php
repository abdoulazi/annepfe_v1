
<?php 

$server_connect = new PDO( "mysql:host=".$_SESSION['server'], $_SESSION['username'], $_SESSION['password']);

$all_database1 = $server_connect->query( "SELECT schema_name FROM information_schema.schemata WHERE schema_name
   NOT IN ('information_schema', 'mysql', 'performance_schema','sys')");

$all_database2 = $server_connect->query( "SELECT schema_name FROM information_schema.schemata WHERE schema_name
   NOT IN ('information_schema', 'mysql', 'performance_schema','sys')");


if(isset($_POST['db_selected'])) {
    $_SESSION['database1'] = $_POST['database1'];
    $_SESSION['database2'] = $_POST['database2'];

    header('location: ?view=listing_table&step=5');
}
?>

<div class="row">
    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
        <?php 

                    if(isset($_POST['migrate'])) {
                         
                         $tables = $_POST['table'];
                         $table_statut = array();
                         foreach ($tables as $table => $value) {
                           
                            // On recupère son schema
                            $bdd1 = new PDO( "mysql:host=".$_SESSION['server'].";dbname=".$_SESSION['database1'], $_SESSION['username'], $_SESSION['password']);

                            $statement = $bdd1->query('DESCRIBE ' . $table);
  
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            
                            // requete de selection des données BDD1
                            $select_data_bdd1 = $bdd1->query('SELECT * FROM '.$table);
                            
                            // On se connecte a la bd2
                            $bdd2 = new PDO( "mysql:host=".$_SESSION['server'].";dbname=".$_SESSION['database2'], $_SESSION['username'], $_SESSION['password']);

                            // On créer les tables
                            // $sql = "CREATE TABLE IF NOT EXISTS ".$table." (
                            //                 task_id     INT AUTO_INCREMENT PRIMARY KEY,
                            //                 subject     VARCHAR (255)        DEFAULT NULL,
                            //                 start_date  DATE                 DEFAULT NULL,
                            //                 end_date    DATE                 DEFAULT NULL,
                            //                 description VARCHAR (400)        DEFAULT NULL
                            //             )";
                            $chaine_sql = ""; 
                            $nbre = count($result);
                            foreach($result as $k => $column){
                                if($k + 1 == $nbre) {
                                    $chaine_sql = $chaine_sql.' '.$column['Field'].' '.$column['Type'];
                                } else {
                                    $chaine_sql = $chaine_sql.' '.$column['Field'].' '.$column['Type'].', ';
                                }
                                
                                // echo $column['Field'] . ' - ' . $column['Type'], '<br>';
                            } 

                            $sql = "CREATE TABLE IF NOT EXISTS ".$table." (
                                            ".$chaine_sql."
                                        )"; 

                            $statut = $bdd2->exec($sql);

                            // Insert Data on BDD2 
                            $list_champ = '';
                            $taille = count($result);
                            foreach($result as $i => $champ){
                                if($i + 1 == 1) {
                                   $list_champ = $list_champ.' '.$champ['Field'].', ';
                                } elseif($i + 1 == $taille) {
                                    $list_champ = $list_champ.' '.$champ['Field'];
                                } else {
                                    $list_champ = $list_champ.' '.$champ['Field'].', ';
                                } 
                            } 

                            // Recuperation des donnees dans la base de donnée 1
                            while ($data = $select_data_bdd1->fetch()) { 
                                // var_dump($data); 
                                $list_values = ""; 
                                foreach($result as $i => $champ){
                                    if($i + 1 == 1) {
                                        if(is_int($data[$champ['Field']])) {
                                            $list_values = $list_values."  ".$data[$champ['Field']]." , ";
                                        } else {
                                            $list_values = $list_values." ' ".$data[$champ['Field']]." ', ";
                                        } 
                                    } elseif($i + 1 == $taille) {

                                      if(is_int($data[$champ['Field']])) {
                                          $list_values = $list_values."  ".$data[$champ['Field']]."  ";
                                        } else {
                                            $list_values = $list_values." ' ".$data[$champ['Field']]." ' ";
                                        }  
                                    } else {
                                        if(is_int($data[$champ['Field']])) {
                                            $list_values = $list_values."  ".$data[$champ['Field']]." , ";
                                        } else {
                                            $list_values = $list_values." ' ".$data[$champ['Field']]." ', ";
                                        } 
                                    } 
                                } 
                                // var_dump($list_champ);
                                // var_dump($list_values);
                                // die;
                                // $sql2 = "INSERT INTO ".$table."(id, name, lastname, email, password) VALUES(1, 'azino4real', 'azouz', 'aziz@gmail.com', 'test123')";
                                $sql2 = "INSERT INTO ".$table."(".$list_champ.") VALUES(".$list_values.")";
                                $insert_data_bdd2 = $bdd2->query($sql2);
                            }
                             
                            array_push($table_statut, $statut);
                         }  
 
                        ?> 
                            <div class="alert alert-success">La migration est effectué avec succès ! 
                            </div>
                        <?php 
                        
                    } 

                ?>
        <form role="form" action="?page=listing_table&step=5" method="post" class="f1">

    <h1>Select Tables </h1>
    <!--<label class="container">
        <label style="float:left;"> -->
    <fieldset>
        <div class="form-group">
        <label class="container">
            
                   <div class="row">
                        <div class="col-lg-6">
                            <h3> A : <?= $_SESSION['database1'] ?></h3>
                            <?php 

                                $show_tables_1 = $server_connect->query("SHOW TABLES FROM ".$_SESSION['database1']);

                            ?>
                             <!-- <button class="btn btn-primary">Migrer toutes les tables</button> -->
                             <table class="table">
                                    <tr style="background: rgb(216,207,207);">
                                        <td><input type="checkbox" onClick="toggle(this)"></td>
                                        <td>Liste des tables</td>
                                    </tr>
                                <?php while($table1 = $show_tables_1->fetch()): ?>
                                    <tr>
                                        <td><input type="checkbox" name="table[<?= $table1[0] ?>]"></td>
                                        <td><?= $table1[0] ?></td>
                                    </tr>
                                <?php endwhile; ?>  
                             </table>
                        </div>
                        <div class="col-lg-6">
                            <h3> B : <?= $_SESSION['database2'] ?></h3>
                            <?php  
                                $show_tables_2 = $server_connect->query("SHOW TABLES FROM ".$_SESSION['database2']); 
                            ?>
                             <table class="table">
                                   <tr style="background: rgb(216,207,207);">
                                        <td>#</td>
                                        <td>Liste des tables</td>
                                    </tr>
                                <?php while($table2 = $show_tables_2->fetch()): ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $table2[0] ?></td>
                                    </tr>
                                <?php endwhile; ?>
                             </table>
                        </div> 
                    </div>
         </label>

            <div class="f1-buttons">
            <a href="?page=listing_db&step=4">
                <button type="button" class="btn btn-previous">Previous</button>
           </a>
 
            <button type="submit" name="migrate" class="btn btn-next">Migrer</button>
                   
            

            <!-- <button type="submit" name="db_selected" name="formbase" class="btn btn-next">Next</button> -->
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
 
