
<?php

require_once"connect.php";
require_once"header.php";
$bookID=$_GET['bookID'];
if(isset($_GET['bookID']))
$delete="DELETE FROM `book` WHERE id='$bookID'";
$res=$connect->query($delete);
if($res){
    header("Location:http://localhost/Library/home.php");
}

?>
