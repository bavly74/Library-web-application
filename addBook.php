<?php
require_once"connect.php";
require_once"header.php";
$userID=$_SESSION['userID'];
if(!isset($_SESSION['userID'])){
  header("Location:http://localhost/Library/sign-in.php");
}
$validation="";
if($_POST){
    $title=$_POST['title'];
    $author=$_POST['author'];

    $number=$_POST['number'];

    $edition=$_POST['edition'];
    $submissionDate=$_POST['submessionDate'];

    $imgPath=$_POST['imgPath'];
    $price=$_POST['price'];



    $insertStmt="INSERT INTO `book`(`title`, `author`, `edition`, `number`, `submission date`, `imgpath`,`price`) VALUES ('$title','$author','$edition','$number','$submissionDate','$imgPath','$price')";
$insertResult=$connect->query($insertStmt);

if($insertResult){
$validation="book added";
}

}

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
<h1 style="text-align: center;margin-bottom:20px;">Add book</h1>
<form class="container form" action="" method="post">
  <div class="form-row">

  <div class="form-group  col-md-6 ">
    <label for="inputAddress">Title</label>
    <input type="text" class="form-control input" id="inputAddress" placeholder="1234 Main St" name="title">
  </div> 

    <div class="form-group col-md-6 ">
      <label for="inputEmail4">Author</label>
      <input type="text" class="form-control input" id="inputEmail4" name="author">
    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">number</label>
      <input type="text" class="form-control" id="inputCity" name="number">
    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">edition</label>
      <input type="text" class="form-control" id="inputCity" name="edition">
    </div>

  

    <div class="form-group col-md-6">
      <label for="inputPassword4">submission date</label>
      <input type="date" class="form-control input" id="inputPassword4" name="submessionDate"> 
    </div>


    
    <div class="form-group col-md-6">
      <label for="inputPassword4">image path</label>
      <input type="text " class="form-control input" id="inputPassword4" name="imgPath"> 
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">price</label>
      <input type="text " class="form-control input" id="inputPassword4" name="price"> 
    </div>

  </div>
 


  <button type="submit" class="btn btn-primary ">Add</button>
  <?php if($validation)  ?> <p style="color:green;margin-left:20px;"><?php echo $validation ;?></p>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>