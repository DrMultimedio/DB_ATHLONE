<?php
include 'head.php';

?>

<body>

<?php
include 'header.php';

include "connection.php";

$sql = "SELECT * FROM content WHERE type = 'Serie'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $ids = array();
    $names = array();
    while($row = $result->fetch_assoc()) {
        echo "<a href='serie.php?id=" . $row["ContentID"] ."'> - Name: " . $row["Name"]. " Tipo: " . $row["Type"] ."</a>";
        echo "<br>";

    }
} 
else {
    echo "0 results";
}



?>







</body>


</html>