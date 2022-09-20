<?php
require_once"connect.php";
require_once"header.php";
$validation="";


if(isset($_GET['bookID'])){
    if($_GET['submit']){

    $bookID=$_GET['bookID'];
    $title=$_GET['title'];
    $author=$_GET['author'];
    $edition=$_GET['edition'];
    $number=$_GET['number'];
    $subDate=$_GET['subDate'];
    $imgPath=trim($_GET['imgpath']);

$updateStmt="UPDATE `book` SET `title`='$title',`author`='$author',`edition`='$edition',`number`='$number',`submission date`='$subDate',`imgpath`=' $imgPath'";
$result=$connect->query($updateStmt);
if($result){
$validation="update succsseded";
}
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
$userData="SELECT * FROM `book` WHERE id='$bookID'";
$selectRow=$connect->query($userData);
if($selectRow->num_rows==1){
$arr=$selectRow->fetch_assoc();
}
?>

<h1 style="text-align: center;margin-bottom:20px;">Edit Book</h1>
<form class="container form" action="" method="GET">
  <div class="form-row">

  <div class="form-group  col-md-6 ">
    <label for="inputAddress">title</label>
    <input type="text" class="form-control input" id="inputAddress"  name="title" value="<?php echo $arr['title'] ?>">
  </div> 

  <div class="form-group  col-md-6 ">
    <label for="inputAddress">author</label>
    <input type="text" class="form-control input" id="inputAddress"  name="author" value="<?php echo $arr['author'] ?>">
  </div> 

    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">edition</label>
      <input type="text" class="form-control" id="inputCity" name="edition" value="<?php echo $arr['edition'] ?>">
    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">number</label>
      <input type="text" class="form-control" id="inputCity" name="number" value="<?php echo $arr['number'] ?>">
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">submission date</label>
      <input type="date" class="form-control input" id="inputPassword4" name="subDate" value="<?php echo $arr['submission date'] ?>"> 
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">image path</label>
      <input type="text" class="form-control input" id="inputPassword4" name="imgpath" value="<?php echo $arr['imgpath'] ?>"> 
    </div>

  </div>


  <button name="submit" type="submit" class="btn btn-primary ">Save</button>
  <?php if($validation) ?> <p style="color:green;margin-left:20px;"><?php echo $validation ;?></p>

</form>
</body>
</html>