<?php
include 'head.php';

?>
<body>
<?php
include 'header.php';

?>
<?php
include "connection.php";

$sql = "SELECT * FROM users";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $ids = array();
    $names = array();
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["UserID"]. " - Name: " . $row["Name"]. " " . $row["Email"]. "<br>";
        array_push($ids, $row["UserID"]);
        array_push($names, $row["Name"]);

    }
    echo implode(",",$ids)."<br>";
	echo "'".  implode("','",$names) . "'" ;
} else {
    echo "0 results";
}



?>

</body>


</html>