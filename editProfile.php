
<?php 
require_once"connect.php";
require_once"header.php";
session_start();
$userID=$_SESSION['userID'];
if($_POST){
    $passValidation="";
$usernameValidation="";
$username=trim($_POST['username']);
$email=trim($_POST['email']);
$password=$_POST['password'];
$confirmPass=$_POST['confirmPassword'];
$city=$_POST['city'];
$phone=$_POST['phone'];
if($password==$confirmPass){
$updateStatement="UPDATE `users` SET username='$username', email='$email', password ='$password' , city='$city' , phone ='$phone' WHERE id='$userID'";
$updateResult=$connect->query($updateStatement);
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

<h1 style="text-align: center;margin-bottom:20px;">UPDATE</h1>

<?php 
$userData="SELECT * FROM `users` WHERE id='$userID'";
$selectRow=$connect->query($userData);
if($selectRow->num_rows==1){
$arr=$selectRow->fetch_assoc();
}
?>

<form class="container form" action="" method="post">
  <div class="form-row">

  <div class="form-group  col-md-6 ">
    <label for="inputAddress">username</label>
    <input value="<?php echo $arr['username'];?>" type="text" class="form-control input" id="inputAddress" placeholder="1234 Main St" name="username"><?php if(!empty($usernameValidation)){?>
       <p style="color:red;"> <?php echo $usernameValidation ;?></p> <?php }?>
  </div> 

    <div class="form-group col-md-6 ">
      <label for="inputEmail4">Email</label>
      <input value="<?php echo $arr['email'];?>" type="email" class="form-control input" id="inputEmail4" name="email">
    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input value="<?php echo $arr['city'];?>" type="text" class="form-control" id="inputCity" name="city">
    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">phone</label>
      <input value="<?php echo $arr['phone'];?>" type="text" class="form-control" id="inputCity" name="phone">
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input value="<?php echo $arr['password'];?>" type="password" class="form-control input" id="inputPassword4" name="password">
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">confirm Password</label>
      <input value="<?php echo $arr['password'];?>" type="password" class="form-control input" id="inputPassword4" name="confirmPassword"> <?php if(!empty($passValidation)){?>
       <p style="color:red;"> <?php echo $passValidation ;?></p> <?php }?>
    </div>

  </div>
 


  <button type="submit" class="btn btn-primary ">Sign up</button>
</form>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>