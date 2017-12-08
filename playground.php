<?php
include 'head.php';

?>
<body>
<?php
include 'header.php';

?>

<?php
    include 'connection.php';
      //add here MD5 
	  $sql = "SELECT RegistrationDate, password FROM users WHERE name = 'mike' ";
	  $result = mysqli_query($conn,$sql);

	    $row = $result->fetch_assoc();

	    print_r($row) ." ";

	  $hash = sha1($row['RegistrationDate'] . $row['password']);

	  $sql3 = "UPDATE Users SET Password = '$hash' WHERE name ='mike' ";
	  echo "<br>" . $sql3 ; 
	 // $result = mysqli_query($conn,$sql3);

      // If result matched $myusername and $mypassword, table row must be 1 row
        
	  echo "<br>" . sha1($row['RegistrationDate'] . 'lilith') . "<br>";


	echo $hash . " " . $row['password'] . " " . $row['RegistrationDate'];

?>






</body>


</html>