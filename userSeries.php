<?php
include 'head.php';

?>

<body>

<?php
include 'header.php';

include "connection.php";
if(isset($_SESSION['login_user'])){
	$sql = "SELECT * FROM content as c INNER JOIN status as s ON c.ContentId = s.Content WHERE c.Type = 'Serie' AND s.User =" .$_SESSION['login_user'];

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    $ids = array();
	    $names = array();
	    while($row = $result->fetch_assoc()) {
	    	if($row['Liked'] != 0 || $row['Liked'] != 0 || $row['Faved'] != 0 || $row['Watched'] != 0 || $row['Completed'] != 0 || $row['Dropped'] != 0 || $row['Watching'] != 0){
		        echo "<a href='serie.php?id=" . $row["ContentID"] ."'> - Name: " . $row["Name"]. " Tipo: " . $row["Type"] ."</a>";
		        echo "<br>";
		    }
	    }
	} 
	else {
	    echo "0 results";
	}

	}
else{
    header("Location: series.php"); /* Redirección del navegador */

}

?>







</body>


</html>