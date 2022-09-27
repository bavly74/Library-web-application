<?php require_once "header.php" ;
require_once "connect.php";
$id=$_SESSION['userID'];


if(isset($_GET['bookID'])){
  $bookID=$_GET['bookID'];
  $selectCart ="select * from cart where bookID = $bookID and userID=$id";
  $resCart=$connect->query($selectCart);
  $insrtStmt="";
  $update="";
    if($resCart-> num_rows ==0){
$insrtStmt="insert into cart (bookID,userID,quantity) values ('$bookID','$id',1)";
$update="update book set number=number-1 where id='$bookID'";
  }else {
    $insrtStmt="update cart set quantity=quantity+1 where bookID = $bookID and userID=$id";
    $update="update book set number=number-1 where id='$bookID'";

  }
  $updateres=$connect->query($update);

  $insertRes=$connect->query($insrtStmt);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>    
<h1 style="text-align:center;margin-top: 19px;">Library items :</h1>
<hr>
<div class="container main">
<div class="row items">
  
<?php 
if(isset($_SESSION['userID'])){
$selectbookStmt="SELECT * FROM `book`";
$selectusers="SELECT * FROM `user` where id =$id";
$resultuserStmt=$connect->query($selectusers);

    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $selectbookStmt.= " where title like '%$search%' ";
    }
    $resultbookStmt=$connect->query($selectbookStmt);

$rowuser=$resultuserStmt->fetch_assoc();


if($rowuser['admin']==1){

while($rowbook=$resultbookStmt->fetch_assoc()){ 
?>


<div class="card" style="width: 18rem;">
  <img src="img/<?php echo $rowbook['imgpath'];?>" class="card-img-top crdimg" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $rowbook['title'];?></h5>
    <a href="bookDetails.php?bookID=<?php echo $rowbook['id'];?>" class="btn btn-primary">book details</a>
    <p style="display: inline-block;margin-left: 20px;font-weight:bold;"><?php echo $rowbook['price']." $";?></p>

    <a href="bookEdit.php?bookID=<?php echo $rowbook['id'];?>" style="margin-top:17px;" class="btn btn-primary">edit book details<?php echo" number: ".$rowbook['id'];?></a>

  </div>
  <a href="deleteBook.php?bookID=<?php echo $rowbook['id'];?>" style="margin-bottom:0px;background-color:red;width:100%" class="btn btn-primary">delete</a>

</div>
   
  <?php }} else if ($rowuser['admin']==0){ ?>

      <?php
      while($rowbook=$resultbookStmt->fetch_assoc()){ 

?>

<div class="card" style="width: 18rem;">
 <div class="crdimg">
  <img src="img/<?php echo $rowbook['imgpath'];?>" class="card-img-top " alt="...">
  <div class="layer"><a href="home.php?bookID=<?php echo $rowbook['id']; ?>">+</a></div>
</div> 
 
  <div class="card-body">
    <h5 class="card-title"><?php echo $rowbook['title'];?></h5>
    <a href="bookDetails.php?bookID=<?php echo $rowbook['id'];?>" class="btn btn-primary">book details</a>
    <p style="display: inline-block;margin-left: 20px;font-weight:bold;"><?php echo $rowbook['price']." $";?></p>
  </div>
</div>

   
    <?php  }}}else header("Location:http://localhost/Library/sign-in.php"); ?>

    </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
