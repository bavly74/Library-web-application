<?php
require_once"connect.php";
require_once"header.php";
$orderValidation="";
$isAvailable="";
$userID=$_SESSION['userID'];
if(!isset($_SESSION['userID'])){
  header("Location:http://localhost/Library/sign-in.php");
}

if(isset($_GET['bookID'])){
  $bookID=$_GET['bookID'];
  $updatecart="update cart set quantity=quantity-1 where  bookID='$bookID' and quantity>0";
  $result=$connect->query($updatecart);
  $updateBook="update book set number = number+1 where id='$bookID'";
  $bookres=$connect->query($updateBook);
  
}

if($_POST){
  $cartQuery="select * from cart where userID='$userID'";
  $cartQueryRes=$connect->query($cartQuery);

  if($cartQueryRes->num_rows==0){
    $orderValidation="the cart is empty";

  } else {
    $insertInvoice="insert into invoice (userID) values ('$userID')";
    $insertres=$connect->query($insertInvoice);
    if($connect->query($insertInvoice)){
      $invoiceID=$connect->insert_id;
    }
    $selectCart="select book.id as bookID , book.number as bookNumber , cart.bookID as bookID,cart.quantity as quantity, book.price as price from cart inner join book on 
    book.id=cart.bookID where cart.userID='$userID'";
    
    $cartRes=$connect->query($selectCart);
    if($cartRes){

    while($row=$cartRes->fetch_assoc()){
      $item=$row["bookID"];
      $price=$row["price"];
      $quantity=$row["quantity"];
      $number=$row["bookNumber"];
      $bookID=$row["bookID"];

if($number<0){$isAvailable="the books must be available";}
   else { 
    $insertQuery="INSERT INTO `orders`  (`bookID`, `quantity`, `price`,`invoiceID`) VALUES ('$item','$quantity','$price','$invoiceID')";
  
      $insertOrder=$connect->query($insertQuery);
    $deleteCart="delete from cart where userID='$userID'";
    $deleteRes=$connect->query($deleteCart);
    $update="update book set number=number-1 where id='$bookID'";
    $updateres=$connect->query($update);

    header('location: http://localhost/Library/done.php');

     }  
    }
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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php 
        $selectStmt="select book.number as bookNumber,book.id as bookID, cart.id as cartID, book.title as bookTitle , book.price as price , cart.quantity as quantity from book 
        join cart on book.id=cart.bookID where cart.userID='$userID'";
         $res=$connect->query($selectStmt);
         ?>
    <table>
    <?php if($orderValidation) ?> <p style="text-align:center;margin-top:10px;"><?php echo $orderValidation ;?></p>
        <tr>
        <th>book</th>
        <th>price</th>
        <th>quantity</th>
        <th>total</th>

        </tr>
       
      
      <?php
      while($arr=$res->fetch_assoc()) { ?>

        <tr>
        <td><?php echo $arr['bookTitle'];?></td>
        <td><?php echo $arr['price']; ?></td>
        <td><?php echo $arr['quantity']; ?></td>
        <td><?php echo $arr['quantity']*$arr['price'];?></td>
        <td><?php

        if($arr['bookNumber']>=0){?>
        <p style="color:green;"><?php echo "available"?></p>

       <?php } else if($arr['bookNumber']<0) {?><p style="color:red;display:inline-block;"><?php echo "unavailable"?> </p> 
        <div class="minusone"><a  href="cart.php?bookID=<?php echo $arr['bookID'];?>">-1</a></div>
        <?php }?>
        
      </td>

        <td style="color:red;font-weight:bold;font-size:20px;"> <a href="deleteFromCart.php?cartID=<?php echo $arr['cartID'];?> & bookID=<?php echo $arr['bookID'];?>"> X </a> </td>
        </tr>
    
        <?php }?>
        
    </table>
   
 
    <form class="form-inline my-2 my-lg-0" method="post">
      <input style="background:orange;margin:auto;" name="order" class="btn btn-outline-success my-2 my-sm-0" type="submit" value="submit order"/>

    </form>
<?php if($isAvailable) ?><p style="text-align:center;color:red;"><?php echo $isAvailable ;?></p>
</body>
</html>