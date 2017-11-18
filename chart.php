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
<canvas id="myChart" width="200" height="200"></canvas>
<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo "'".  implode("','",$names) . "'" ;?>],
        datasets: [{
            label: '# of Votes',
            data: [<?php echo implode(",",$ids);?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'

            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>

</body>


</html>