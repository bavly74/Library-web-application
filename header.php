<?php 
session_start();
require_once "connect.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<?php

if(isset($_SESSION['userID'])){
  $id=$_SESSION['userID'];
  $selectstmt="SELECT * FROM `user` WHERE id=$id";
  $res=$connect->query($selectstmt);
  $row=$res->fetch_assoc();

if($row['admin']==1){
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home.php">LOGO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addBook.php">Add Book</a>
      </li>

      <li class="nav-item menu">
                <a class="nav-link" href="#"> <i class="fas fa-user"></i>my account</a>
                <div class="sub">
                    <ul>
                        <li><a href="editProfile.php?userID=<?php $row['id']; ?>"> update profile</a></li>
                            
                        </li>
                        <hr>
                        <li><a href="logout.php"> log out</a></li>
                    </ul>
                </div>
            </li>
      
            <li class="nav-item">
            <p class="nav-link" style="color:black;font-weight:bold;"><?php echo "Welcome"." ".$row['username']." !";?></p>
      </li>
    </ul>
    

    <form class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Search for a book" aria-label="Search" name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>  
  </div>

</nav>
<?php } else if($row['admin']==0){ ?> 



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home.php">LOGO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
     

      <li class="nav-item menu">
                <a class="nav-link" href="#"> <i class="fas fa-user"></i>my account</a>
                <div class="sub">
                    <ul>
                        <li><a href="editProfile.php?userID=<?php $row['id']; ?>"> update profile</a></li>
                            
                        </li>
                        <hr>
                        <li><a href="logout.php"> log out</a></li>
                    </ul>
                </div>
            </li>
      <li class="nav-item" style="text-align:center;">
      <p class="dropdown-item"><?php echo "Welcome"." ".$row['username']." !";?></p>
      </li>
      
    </ul>

    
    <form class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Search for a book" aria-label="Search" name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>  
  </div>
</nav>



<?php } else{ ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home.php">LOGO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="sign-in.php">login</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="sign-up.php">sign up</a>
      </li>

    </ul>
    
    <form class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Search for a book" aria-label="Search" name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>  
  </div>
</nav>
<?php } }?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>