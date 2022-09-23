<?php
require_once"connect.php";
require_once"header.php";
if(isset($_GET['bookID'])){
    $bookID=$_GET['bookID'];
   $select="SELECT * FROM `book` WHERE id='$bookID'";
   $result=$connect->query($select);
   if($result->num_rows==1){
    $row=$result->fetch_assoc();
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
<h1 style="text-align:center;margin-top: 29px;">Book Details :</h1>

<div class="container mainBox">
    <div class="bookImg" ><img src="img/<?php echo $row['imgpath']; ?>" ></div>
    <div class="bookDetails" >
        <h3>Title :<span style="color:black;"> <?php echo $row['title'];?></span> </h3>
        <h3>author name : <span style="color:black;"><?php echo $row['author'];?></span></h3>
        <h3>submission date :<span style="color:black;"> <?php echo $row['submission date'];?></span></h3>
        <h3>edition: <span style="color:black;"><?php echo $row['edition'];?></span></h3>


    </div>
</div>


</body>
</html>