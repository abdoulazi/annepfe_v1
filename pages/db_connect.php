<?php 

if(isset($_GET['schema'])) {
    $schema = $_GET['schema'];

    if($schema == 'mysql') {

        require 'db_connect/mysql_connect.php';

    } elseif($schema == 'sqlserver') {

         require 'db_connect/sqlserver_connect.php';

    } elseif($schema == 'oracle') {

         require 'db_connect/oracle_connect.php';

    } else {

        header('location: ?page=db_type');
    }
} else {
    header('location: ?page=db_type');
}

?>