<?php 

header('Content-Type', 'Application/json');

// Connexion a la BD
$bdd= new PDO('mysql:host=127.0.0.1;dbname=dotit','root' ,'test123');
 

// Recuperer les enregistrements d'une table
$requette = $bdd->query('DESCRIBE membres');  

?>

<table>
	<tr>
		<td>Field</td>
		<td>Type</td>
		<td>Null</td>
		<td>Key</td>
		<td>Default</td>
		<td>Extra</td>
	</tr> 
<?php
while ($row = $requette->fetch()) {
	  ?>
	  <tr>
	  	<td><?= $row['Field'] ?></td>
	  	<td><?= $row['Type'] ?></td>
	  	<td><?= $row['Null'] ?></td>
	  	<td><?= $row['Key'] ?></td>
	  	<td><?= $row['Default'] ?></td>
	  	<td><?= $row['Extra'] ?></td>
	  </tr> 
	  <?php
} 
?>
</table>