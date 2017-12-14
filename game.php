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

     if(isset($_SESSION['login_user'])) {
		
		$sqlActualStatus = "SELECT * FROM status WHERE Content =" . $_GET['id'] ." AND User = " .$_SESSION['login_user'] ;
		$resultActualStatus = $conn->query($sqlActualStatus);




     	if($_SERVER["REQUEST_METHOD"] == "POST"){
	     	$completed = 0;
	     	$dropped = 0;
	     	$fav = 0;
	     	$watching = 0;
	     	if(isset($_POST['completed']))
	     	{
	   			$completed = 1;

	     	}
	     	if(isset($_POST['dropped']))
	     	{
	   			$dropped = 1;

	     	}
	     	if(isset($_POST['fav']))
	     	{
	   			$fav = 1;

	     	}
	     	if(isset($_POST['watching']))
	     	{
	   			$watching = 1;

	     	}
	     	if(mysqli_num_rows($resultActualStatus) == 0){

		     	$sqlUpdate = "INSERT INTO status (Content, User, Completed, Dropped, Faved, Watching) values (" .
		     	$_GET['id'] .", " .
		     	$_SESSION['login_user'] .", " .
		     	$completed .", " .
		     	$dropped .", " .
		     	$fav .", " .
		     	$watching .")";
	 			$resultUpdate = $conn->query($sqlUpdate);

	     	}
	     	else{
		     	$sqlUpdate = "UPDATE status SET Completed = " .$completed . ", ".
				"Dropped = " . $dropped . ", " .
				"Faved = " . $fav .", " .
				"Watching = " . $watching .
				" WHERE Content =" . $_GET['id'] ." AND User = " .$_SESSION['login_user'];

	 			$resultUpdate = $conn->query($sqlUpdate);
	     	}
	     	//echo $sqlUpdate;
		}	
		$sqlActualStatus = "SELECT * FROM status WHERE Content =" . $_GET['id'] ." AND User = " .$_SESSION['login_user'] ;
		$resultActualStatus = $conn->query($sqlActualStatus);

		$rowStatus = $resultActualStatus->fetch_assoc();

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
			    	<form method="POST" action="game.php?id=<?php echo $_GET['id'] ?>">
				    	<label class="checkbox-inline"><input 
				    		<?php if( $rowStatus['Completed'] == 1) echo "checked" ?>
				    		type="checkbox" value="" id="completed" name="completed"
	    			 	>Completed</label>
						<label class="checkbox-inline"><input 
							<?php if( $rowStatus['Watching'] == 1) echo "checked" ?>
							type="checkbox" value="" id="watching" name="watching">Watching</label>
						<label class="checkbox-inline"><input 
							<?php if( $rowStatus['Dropped'] == 1) echo "checked" ?>
							type="checkbox" value="" id="dropped" name="dropped">Dropped</label>
						<label class="checkbox-inline"><input 
							<?php if( $rowStatus['Faved'] == 1) echo "checked" ?>
							type="checkbox" value="" id="fav" name="fav">Favourite</label>

						<button type="submit" class=".btn-default">Add to my list</button>
					</form>

			    </div>

		    </div>


		  </div>
		</div>
    </section>
	


</body>


</html>