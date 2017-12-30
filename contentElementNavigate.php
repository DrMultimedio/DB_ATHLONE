
<?php 
//checking if there's no row defined

if(!isset($row))
	header("Location: 404.php");
?>


<a href="serie.php?id= <?php echo $row["ContentID"] ?>"> - Name: <?php echo $row["Name"] ?> Tipo: <?php echo $row["Type"]  ?></a>

<br>
