<?php
require_once"connect.php";
require_once"header.php";
if(isset($_GET['cartID']))
$cartID=$_GET['cartID'];
$bookID=$_GET['bookID'];

$delete="DELETE FROM `cart` WHERE id='$cartID'";
$res=$connect->query($delete);
$select="select book.number as number , cart.quantity as quantity from book join cart on book.id=cart.bookID where card.id=$cardID";
$selectres=$connect->query($select);
if($selectres){
    $row=$selectres->fetch_assoc();
$row['number']+=$row['quantity'];
$number =$row['number'];
$insertstmt="insert into book (number) values ('$number') where id=$bookID";
}


if($res){
    header("Location:http://localhost/Library/cart.php");
}
?>