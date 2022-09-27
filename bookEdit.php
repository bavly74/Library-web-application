
<?php 
require_once"connect.php";
require_once"header.php";
$bookValidation="";
if(!isset($_SESSION['userID'])){
  header("Location:http://localhost/Library/sign-in.php");
}
$bookID=$_GET['bookID'] ;
if(!empty($_POST['search']))
{
   echo"nothing to search";
   header("Location:http://localhost/Library/home.php");
}
 else if($_POST){
    $title=$_POST['title'];
    $author=$_POST['author'];
    $number=$_POST['number'];
    $edition=$_POST['edition'];
    $subDate=$_POST['subDate'];
    $imgpath=$_POST['imgpath'];
    $price=$_POST['price'];
$update="update book set title='$title',author='$author',edition='$edition',number='$number' , price='$price' 
 where id='$bookID'";
$res=$connect->query($update); 
if($res){
  $bookValidation="the book updated";
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

<?php 
if(isset($_GET['bookID'])){
$bookData="SELECT * FROM `book` WHERE id='$bookID'";
$selectRow=$connect->query($bookData);
if($selectRow->num_rows==1){
$arr=$selectRow->fetch_assoc();
}
}
?>

<h1 style="text-align: center;margin-bottom:20px;">Edit Book</h1>

<form class="container form" action="" method="post">
  <div class="form-row">

  <div class="form-group  col-md-6 ">
    <label for="inputAddress">title</label>
    <input type="text" class="form-control input" id="inputAddress"  value="<?php echo $arr['title'] ?>"  name="title">
  </div> 

  <div class="form-group  col-md-6 ">
    <label for="inputAddress">author</label>
    <input type="text" class="form-control input" id="inputAddress"   value="<?php echo $arr['author'] ?>" name="author">
  </div> 

    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">edition</label>
      <input type="text" class="form-control" id="inputCity"  value="<?php echo $arr['edition'] ?>" name="edition">
    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">number</label>
      <input type="text" class="form-control" id="inputCity"  value="<?php echo $arr['number'] ?>" name="number">
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">submission date</label>
      <input type="date" class="form-control input" id="inputPassword4"  value="<?php echo $arr['submission date'] ?>" name="subDate"> 
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">image path</label>
      <input type="text" class="form-control input" id="inputPassword4"  value="<?php echo $arr['imgpath'] ?>" name="imgpath"> 
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">price</label>
      <input type="text" class="form-control input" id="inputPassword4"  value="<?php echo $arr['price'] ?>" name="price"> 
    </div>

  </div>


  <button name="submit" type="submit" class="btn btn-primary ">Save</button>

  <?php if($bookValidation)  ?> <p style="color:green;margin-left:20px;"><?php echo $bookValidation ;?></p>

</form>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>