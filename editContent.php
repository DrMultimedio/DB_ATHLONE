<?php
include 'head.php';

?>
<body>
<?php
include 'header.php';

?>
<?php
    //echo $content;
  
  if(isset($_SESSION['login_user']) && isset($_GET['id'])){
      include 'connection.php';
      $content = $_GET['id'];

     if($_SERVER["REQUEST_METHOD"] == "POST")  {

      $name = $_POST['title'];
      $photo = $_POST['photo']; 
      $background = $_POST['background']; 

      $genre = $_POST['genre']; 
      $description = $_POST['description']; 

      $correct = true;
      if($name == "" || strpos($name, "\"")){
        $correct = false;
        echo "name contains forbidden characters or is empty";

      }
      if(strpos($photo, "\"")){
        $correct = false;
        echo "photo contains forbidden characters";

      }
      if(strpos($background, "\"")){
        $correct = false;
        echo "background contains forbidden characters";

      }
      if(strpos($genre, "\"")){
        $correct = false;
        echo "genre contains forbidden characters";

      }
      if(strpos($description, "\"")){
        $correct = false;
        echo "description contains forbidden characters";

      }
      //add here regex to check email
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

              $sql = "UPDATE  content  
              set Name = \"" . $name ."\"," .
              " Photo = \"" . $photo ."\"," .
              " BackgroundPhoto = \"" . $background ."\"," .
              " Genre = \"" . $genre ."\"," .
              " Description = \"" . $description .
               "\" WHERE ContentID =". $_GET['id'] ;
               echo $sql;
              $result = mysqli_query($conn,$sql);
              header("location: serie.php?id=".$_GET['id']);
          }
       }
   }
   $sqldata = "SELECT * FROM content WHERE ContentID = $content ";
   $resultdata = mysqli_query($conn,$sqldata);
    if ($resultdata->num_rows >0) {
        // output data of each row
      $row = $resultdata->fetch_assoc();

    } 
    else {
          header("Location: 404.php"); /* Redirección del navegador */
        echo " 0 results";
    }

 }
 else{
    header("Location: 404.php"); /* Redirección del navegador */
 }
      
?>


  <h1 id="title-register">Register, it's free !</h1>
  <div class="createContent-wrapper">
  <form class="form-vertical" role="form" method="post" action="editContent.php?id=<?php echo $_GET['id'] ?>">
    <?php 
        //cambiar el action de a landing a la página actual, así podremos registrarnos en todas las páginas
        //change action from landing to the actual page, that way we can register in all pages
    ?>
	  <div class="form-group">
	    <label for="title">Title:</label>
	    <input type="text" class="form-control" id="title" name="title"  value = "<?php echo $row['Name'] ?>">
	  </div>

	<?php
	//cambiar aqui esto por seleccionar tu propia foto o subir una foto de por ahi 
	?>
	  <div class="form-group">
	    <label for="Photo">Photo URL:</label>
	    <input type="text" class="form-control" id="photo" name = "photo" value = "<?php echo $row['Photo'] ?>">
	  </div>
    <div class="form-group">
      <label for="Background">Background URL:</label>
      <input type="text" class="form-control" id="background" name = "background" value = "<?php echo $row['BackgroundPhoto'] ?>">
    </div>

	  <div class="form-group">
	    <label for="genre">Genre:</label>
	    <input type="text" class="form-control" id="genre" name = "genre" value = "<?php echo $row['Genre'] ?>">
	  </div>


	  <div class="form-group">
	    <label for="description">Description:</label>
	    <textarea type="text" class="form-control" id="description" name="description"><?php echo $row['Description'] ?></textarea>
	  </div>
	  
	  <button type="submit" class="btn btn-default">Submit</button>


    </form>
  </div>
</body>


</html>