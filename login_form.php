

<?php 

    if(isset($_SESSION['login_user'])){
      header("Location: landing.php"); /* Redirección del navegador */

    }
      include 'connection.php';

     if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
  
      //add here MD5 
      $sql = "SELECT UserId, Name, RegistrationDate, Password FROM users WHERE name = '$myusername'";
      $result = mysqli_query($conn,$sql);
      if ($result->num_rows ==  0) {
            header("Location: 404.php"); /* Redirección del navegador */
          echo " 0 results";
      }

      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $hash = sha1($row['RegistrationDate'] . $mypassword);

      echo $hash. "<br>" ;
      echo $row['Password'] . "<br>";
      echo $mypassword . "<br>";
      $count = mysqli_num_rows($result);

        
      if($row['Password'] == $hash) {
        print_r($row); 
        echo $row['UserId']; 
        $sql2 = "INSERT INTO logins(User) VALUES (".$row['UserId'].") ";
        mysqli_query($conn,$sql2);
        $_SESSION['login_user']= $row['UserId'];  // Initializing Session with value of PHP Variable
        $_SESSION['username']= $row['Name'];  // Initializing Session with value of PHP Variable

        header("Location: landing.php"); /* Redirección del navegador */

      }
      else {
         $error = "Your Login Name or Password is invalid";
         echo "wrong passaword hermano";
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
