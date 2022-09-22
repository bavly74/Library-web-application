<?php
require_once"connect.php";
require_once"header.php";

$bookID=$_GET['bookID'] ;
   if($_POST){
    $title=$_REQUEST['title'];
    $author=$_REQUEST['author'];
    $number=$_REQUEST['number'];
    $edition=$_REQUEST['edition'];
    $subDate=$_REQUEST['subDate'];
    $imgpath=$_REQUEST['imgpath'];

$selectlstmt="update book set title='$title' , author='$author' , edition='$edition' , number='$number' 
, submission date='$subDate' imgpath='$imgpath'  where id= '$bookID'";
$result=$connect->query($selectlstmt); 

if($result){
header("Location:http://localhost/Library/editBook.php");
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<form class="container form" action="" method="POST">
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

  </div>


  <button name="submit" type="submit" class="btn btn-primary ">Save</button>


</form>
</body>
</html>