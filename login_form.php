

<?php 
      include 'connection.php';

     if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
  
      //add here MD5 
      $sql = "SELECT UserId FROM users WHERE name = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
        
      if($count == 1) {
         
      print_r($row); 
      echo $row['UserId']; 
      $sql2 = "INSERT INTO logins(User) VALUES (".$row['UserId'].") ";
      mysqli_query($conn,$sql2);
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }

?>

<div class="container text-center">
  <h1 id="title-register">Login or somethin</h1>
      <form class="form-horizontal" role="form" method="post" action="login.php">
      <div class="row">
        <div class="col-lg-4" >
        <input type="text" class="form-control form-style" placeholder="Username or email" id="username" name="username">
        </div>
        <div class="col-lg-4" >
        <input type="password" class="form-control form-style" placeholder="Password" id="password" name="password">
        </div>
        <div class="col-lg-4" >
     		 <button type="submit" class="btn btn-primary button-register">Submit</button>
        </div>
    </form>
  </div>
</div>
