<?php 
  session_start();
 // print_r($_SESSION);
?>
<nav class="navbar navbar-default my-navbar">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>

        <!-- Burger menu icon  -->
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>

        <!-- Burger menu icon  -->
      </button>
      <a class="navbar-brand" href="#">Animu and more</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>



        <?php 

        if(isset($_SESSION['login_user'])){
          include 'headerMyCollection.html';
        }

          ?>



          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Explore <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="series.php">Series</a></li>
            <li><a href="games.php">Games</a></li>
            <li><a href="#">Comics</a></li>
            <li><a href="#">Books</a></li>
            <li><a href="#">Movies</a></li>

          </ul>
        </li>
      </ul>
      <?php 
        if(isset($_SESSION['login_user'])){
          include 'headerLoggedSettings.php';
        }
        else{
          include 'headerUnloggedSettings.php';
        }


      ?>

      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
