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

	$sql = "SELECT * FROM content WHERE ContentID =" . $_GET['id'] . " AND Type = 'Serie'";
	//echo $sql;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
		$row = $result->fetch_assoc();

	} 
	else {
      	header("Location: 404.php"); /* Redirección del navegador */
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
	     	if(isset($_POST['note']))
	     	{
	   			$note = $_POST['note'];
	   			//prompt this somehow instead of echoing
	   			//$error = "Not valid characters on the note, try again"; //implment this if we get a not valid char like ", with regex if possible

	     	}

	     	if(mysqli_num_rows($resultActualStatus) == 0 && !isset($error)){

		     	$sqlUpdate = "INSERT INTO status (Content, User, Completed, Dropped, Faved, Watching, Note) values (" .
		     	$_GET['id'] .", " .
		     	$_SESSION['login_user'] .", " .
		     	$completed .", " .
		     	$dropped .", " .
		     	$fav .", " .
		     	$watching .", \"" .
		     	$note ."\")";

	 			$resultUpdate = $conn->query($sqlUpdate);

	     	}
	     	else{
		     	$sqlUpdate = "UPDATE status SET Completed = " .$completed . ", ".
				"Dropped = " . $dropped . ", " .
				"Faved = " . $fav .", " .
				"Watching = " . $watching . ", " .
				"Note = \"" . $note . "\"" .

				" WHERE Content =" . $_GET['id'] ." AND User = " .$_SESSION['login_user'];

	 			$resultUpdate = $conn->query($sqlUpdate);
	     	}
	     	echo $sqlUpdate;
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
      <div class='content-title'><h3><?php echo $row['Name']?></h3></div>

    </section>

    <section id="content-page-container">
		<div class="container">
		  <div class="row text-center">
		    <div class="col-lg-4 content-img center-block" >
				<img class="" src=" <?php echo $row['Photo']?> "alt="">
		    </div>
		    <div class="col-lg-8" >
				<h4>Description</h4>
				<p><?php echo $row['Description']?> </p>
			    <div class="add-content">
			    	<form method="POST" action="
					<?php if(isset($_SESSION['login_user'])){ echo "serie.php?id=" .$_GET['id'];} else echo "landing.php" ?>
			    	">
				    	<label class="checkbox-inline"><input 
				    		<?php if( isset($rowStatus) && $rowStatus['Completed'] == 1) echo "checked" ?>
				    		type="checkbox" value="" id="completed" name="completed"
	    			 	>Completed</label>
						<label class="checkbox-inline"><input 
							<?php if(isset($rowStatus) &&  $rowStatus['Watching'] == 1) echo "checked" ?>
							type="checkbox" value="" id="watching" name="watching">Watching</label>
						<label class="checkbox-inline"><input 
							<?php if(isset($rowStatus) &&  $rowStatus['Dropped'] == 1) echo "checked" ?>
							type="checkbox" value="" id="dropped" name="dropped">Dropped</label>
						<label class="checkbox-inline"><input 
							<?php if(isset($rowStatus) &&  $rowStatus['Faved'] == 1) echo "checked" ?>
							type="checkbox" value="" id="fav" name="fav">Favourite</label><br>
						<label for="note">Note</label><br>
						<textarea name="note" id="note" cols="50" rows="2"><?php if(isset($rowStatus) && isset($rowStatus['Note'])) echo $rowStatus['Note'] ?> </textarea><br>
						<button type="submit" class=".btn-default">Add to my list</button>

						<a href="editContent.php?id=<?php echo $_GET['id']?>" > Edit</a>

					</form>

			    </div>

		    </div>


		  </div>
		</div>
    </section>
	


</body>


</html>