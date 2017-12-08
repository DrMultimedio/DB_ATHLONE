<?php
include 'head.php';

?>
<body>
<?php
include 'header.php';

?>

<?php
include "connection.php";

$sql = "SELECT name as Name, c.ContentID, SUM(watching) as Watching, SUM(faved) as Faved, SUM(completed) as Completed, SUM(dropped) as Dropped, SUM(liked) as Liked, SUM(mark) as TotalMarks, count(*) as Quantity FROM content as c INNER JOIN status as s ON c.ContentId = s.Content WHERE c.Type = 'Serie' GROUP BY Name ORDER BY Quantity DESC limit 5

";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $data = array();

    while($row = $result->fetch_assoc()) {
        array_push($data, $row);
    }
} else {
    echo "0 results";
}
$data_json = json_encode($data);


?>
<script src="https://code.highcharts.com/highcharts.src.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>


<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    <script type="text/javascript">
    data = <?php echo $data_json ?> ;
    console.log(data);
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Basic drilldown'
        },
        xAxis: {
            type: 'category'
        },

        legend: {
            enabled: false
        },

        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true
                }
            }
        },

        series: [{
            name: 'Series',
            colorByPoint: true,
            data: [
            {
                name: data[0].Name,
                y: parseFloat(data[0].Quantity),
                drilldown: '0'
            }, {
                name: data[1].Name,
                y: parseFloat(data[1].Quantity),
                drilldown: '1'
            }, {
                name: data[2].Name,
                y: parseFloat(data[2].Quantity),
                drilldown: '1'
            }, {
                name: data[3].Name,
                y: parseFloat(data[3].Quantity),
                drilldown: '1'
            }, {
                name: data[4].Name,
                y: parseFloat(data[4].Quantity),
                drilldown: '1'
            }
            ]
        }],
        drilldown: {
            series: [{
                id: '0',
                data: [
                    ['Completed', parseFloat(data[0].Completed)],
                    ['Faved', parseFloat(data[0].Faved)],
                    ['Dropped', parseFloat(data[0].Dropped)],
                    ['Watching', parseFloat(data[0].Watching)],
                ]
            }, {
                id: '1',
                data: [
                    ['Completed', parseFloat(data[1].Completed)],
                    ['Faved', parseFloat(data[1].Faved)],
                    ['Dropped', parseFloat(data[1].Dropped)],
                    ['Watching', parseFloat(data[1].Watching)],
                ]
            }, {
                id: '2',
                data: [
                    ['Completed', parseFloat(data[2].Completed)],
                    ['Faved', parseFloat(data[2].Faved)],
                    ['Dropped', parseFloat(data[2].Dropped)],
                    ['Watching', parseFloat(data[2].Watching)],
                ]
            }, {
                id: '3',
                data: [
                    ['Completed', parseFloat(data[3].Completed)],
                    ['Faved', parseFloat(data[3].Faved)],
                    ['Dropped', parseFloat(data[3].Dropped)],
                    ['Watching', parseFloat(data[3].Watching)],
                ]
            }, {
                id: '4',
                data: [
                    ['Completed', parseFloat(data[4].Completed)],
                    ['Faved', parseFloat(data[4].Faved)],
                    ['Dropped', parseFloat(data[4].Dropped)],
                    ['Watching', parseFloat(data[4].Watching)],
                ]
            }
            ]
        }
    });

    </script>

</body>


</html>