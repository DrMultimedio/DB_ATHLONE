<?php
include 'head.php';

?>

<body>

<?php
include 'header.php';
	
	if(isset($_GET['id'])){
		$content = $_GET['id'];
		//echo $content;
	}
	include "connection.php";

	$sql = "SELECT * FROM content WHERE ContentID =" . $_GET['id'];

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
		$row = $result->fetch_assoc();

	} 
	else {
		//head to 404
	    echo " 0 results";
	}



?>

    <section id="header-content" style="background-image: url(<?php echo $row['BackgroundPhoto']?>)">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center ">


          </div>
        </div>

      </div>
      <div class='content-title'><h3>Titulo y eso</h3></div>

    </section>

    <section id="content-page-container">
		<div class="container">
		  <div class="row text-center">
		    <div class="col-lg-4 content-img center-block" >
				<img class="" src=" <?php echo $row['Photo']?> "alt="">
		    </div>
		    <div class="col-lg-8" >
				<h3><?php echo $row['Name']?></h3>
				<h4>Description</h4>
				<p><?php echo $row['Description']?> </p>
			    <div class="add-content">
			    
			    	<label class="checkbox-inline"><input type="checkbox" value="">Completed</label>
					<label class="checkbox-inline"><input type="checkbox" value="">Watching</label>
					<label class="checkbox-inline"><input type="checkbox" value="">Dropped</label>
					<label class="checkbox-inline"><input type="checkbox" value="">Favourite</label>

					<button type="button" class=".btn-default">Add to my list</button>


			    </div>

		    </div>


		  </div>
		</div>
    </section>
	


</body>


</html>