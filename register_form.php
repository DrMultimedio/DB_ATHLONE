<?php 
      include 'connection.php';
      echo isset($_SESSION['login_user']);

    if($_SERVER["REQUEST_METHOD"] == "POST"){

      $username = $_POST['username'];
      $password = $_POST['password']; 
      $password2 = $_POST['password2']; 
      $email = $_POST['email']; 

      if(isset($username)  && isset($password2)  && isset($password)  && isset($email) && !isset($_SESSION['login_user'])) {



      $correct = true;
      if($password == ""){
        $correct = false;
        echo "password is empty";

      }
      if($password != $password2){
        $correct = false;
        echo "passwords dont match";
      }
      //add here regex to check email
      if($email == "") {
        $correct = false;
        echo "email is empty";

      }
      //add here regex to check user

      if($username == "" ){
        $correct = false;
        echo "user is empty";

      }
      if($correct == true){
          ECHO "entra";
          $sql = "SELECT UserId FROM users WHERE name = '$username' ";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

          $count = mysqli_num_rows($result);
          
          // If result matched $myusername and $mypassword, table row must be 1 row
            
          if($count == 1) {
             $correct = false;
             echo "That name is not avaliable";
          }
          else {

              $sql = "INSERT users 
              (name, email, password)
              VALUES('".
              $username ."','" .
              $email ."','" .
              $password.
               "');" ;
               echo $sql;
              $result = mysqli_query($conn,$sql);
              echo $result; 
          
              $sql = "SELECT RegistrationDate, password FROM users WHERE name = '$username' ";
              $result = mysqli_query($conn,$sql);

                $row = $result->fetch_assoc();

                print_r($row);
              
              $hash = sha1($row['RegistrationDate'] . $row['password']);

              $sql3 = "UPDATE Users SET Password = '$hash' WHERE name ='$username' ";
              echo $sql3; 
              $result = mysqli_query($conn,$sql3);


          
        }
      
      }
      //add here MD5 


    }
  }

?>


<div class="container text-center">
  <h1 id="title-register">Register, it's free !</h1>
  <div class="row">
    <form class="form-horizontal" role="form" method="post" action="landing.php">
    <?php 
        //cambiar el action de a landing a la página actual, así podremos registrarnos en todas las páginas
        //change action from landing to the actual page, that way we can register in all pages
    ?>
        <div class="col-lg-2" >
        <input type="text" class="form-control form-style" placeholder="Username" id="username" name="username">
        </div>
        <div class="col-lg-3" >
        <input type="email" class="form-control form-style" placeholder="Email" id="email" name="email">
        </div>
        <div class="col-lg-2" >
        <input type="password" class="form-control form-style" placeholder="Password" id="password" name="password">
        </div>
        <div class="col-lg-2" >
        <input type="password" class="form-control form-style" placeholder="Repeat password" id="password2" name="password2">
        </div>
        <div class="col-lg-3" >
     		 <button type="submit" class="btn btn-primary button-register">Submit</button>
        </div>
    </form>
  </div>