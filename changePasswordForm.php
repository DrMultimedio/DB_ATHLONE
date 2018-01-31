<?php

    if(isset(!$_SESSION['login_user'])){
      header("Location: landing.php"); /* Redirección del navegador */

    }
     if($_SERVER["REQUEST_METHOD"] == "POST") {
 		include "connection.php";
 		
    	$pass2 = $_POST['password2'];
     	$pass = $_POST['password']; 
     	$user = $_SESSION['login_user'];
	    if(isset($pass) || isset($pass2)){
	    	if($pass == $pass2){
      			$sqlSelect = "SELECT UserId, Name, RegistrationDate, Password FROM users WHERE name = '$myusername'";
			    $result = mysqli_query($conn,$sqlSelect);
			    if ($result->num_rows ==  0) {
			          header("Location: 404.php"); /* Redirección del navegador */
			        echo " 0 results";
			    }
			      
			      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			      
			      $hash = sha1($row['RegistrationDate'] . $mypassword);

            	$sqlUpdate = "UPDATE Users SET Password = '$hash' WHERE name ='$user ";
	    	}
    	}
  	}
?>

<div class="container text-center">
  <h1 id="title-register">Change password</h1>
      <form class="form-horizontal" role="form" method="post" action="login.php">
      <div class="row">
        <div class="col-lg-4" >
        <input type="text" class="form-control form-style" placeholder="Password" id="password" name="password">
        </div>
        <div class="col-lg-4" >
        <input type="password" class="form-control form-style" placeholder="Repeat password" id="password2" name="password2">
        </div>
        <div class="col-lg-4" >
     		 <button type="submit" class="btn btn-primary button-register">Submit</button>
        </div>
    </form>
  </div>
</div>




