<?php
include 'head.php';

?>
<body>
<?php
include 'header.php';

?>
<?php

      include 'connection.php';

     if($_SERVER["REQUEST_METHOD"] == "POST") {

      $name = $_POST['title'];
      $type = $_POST['type']; 
      $author = $_POST['author']; 
      $photo = $_POST['photo']; 
      $genre = $_POST['genre']; 
      $description = $_POST['description']; 

      $correct = true;
      if($name == ""){
        $correct = false;
        echo "name is empty";

      }

      //add here regex to check email
      if($type == "") {
        $correct = false;
        echo "type is empty";

      }
      //add here regex to check user

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

              $sql = "INSERT content 
              (name, type, author, genre, photo, description)
              VALUES('".
              $name ."','" .
              $type ."','" .
              $author."','" .
	          $genre."','" .

              $photo . "','" .
              $description .
               "');" ;
               echo $sql;
              $result = mysqli_query($conn,$sql);
              echo $result;                      
          }
       }
   }
      
?>


  <h1 id="title-register">Register, it's free !</h1>
  <div class="createContent-wrapper">
    <form class="form-vertical" role="form" method="post" action="createContent.php">
    <?php 
        //cambiar el action de a landing a la página actual, así podremos registrarnos en todas las páginas
        //change action from landing to the actual page, that way we can register in all pages
    ?>
	  <div class="form-group">
	    <label for="title">Title:</label>
	    <input type="text" class="form-control" id="title" name="title">
	  </div>
	  <div class="form-group">
  	      <label for="type">Type:</label>
	      <select class="form-control" id="type" name = "type">
	        <option>Game</option>
	        <option>Serie</option>
	        <option>Movie</option>
      	</select>
	  </div>
	<?php
	//cambiar aqui esto por seleccionar tu propia foto o subir una foto de por ahi 
	?>
	  <div class="form-group">
	    <label for="Photo">Photo:</label>
	    <input type="text" class="form-control" id="photo" name = "photo">
	  </div>

	  <div class="form-group">
	    <label for="genre">Genre:</label>
	    <input type="text" class="form-control" id="genre" name = "genre">
	  </div>

	  <div class="form-group">
	    <label for="author">Author:</label>
	    <input type="text" class="form-control" id="author" name="author">
	  </div>

	  <div class="form-group">
	    <label for="description">Description:</label>
	    <textarea type="text" class="form-control" id="description" name="description"></textarea>
	  </div>
	  
	  <button type="submit" class="btn btn-default">Submit</button>


    </form>
  </div>
</body>


</html>