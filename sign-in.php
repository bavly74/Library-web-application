<?php 
require_once "connect.php";
session_start();
if(!empty($_POST['username'])&&!empty($_POST['password'])){
    $loginValidation="";
    $username=trim($_POST['username']);
    $password=trim($_POST['password']);
    $selectStatement="SELECT * FROM `user` where username='$username' and  password='$password'";
    $selectResult=$connect->query($selectStatement);
    if($selectResult->num_rows==1){
        $arr=$selectResult->fetch_assoc();
        $_SESSION['userID']=$arr['id'];
        header('location:http://localhost/Library/home.php');
    }else{$loginValidation="invalid username or password";}

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
    <h1 style="text-align:center;">LOG IN</h1>
<form class="container form" method="post">
 
    <div class="form-group col-md-12">
      <label for="inputEmail4">username</label>
      <input type="text" class="form-control" id="inputEmail4" name="username">
    </div>
    <div class="form-group col-md-12">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" name="password">
    </div>
<?php if(!empty($loginValidation)) { ?> <p style="color:red;"><?php echo $loginValidation ;?></p><?php } ?>
  
  <button type="submit" class="btn btn-primary">Sign in</button>
  <p>dont have account ? <a style="color:blue;" href="sign-up.php">sign up</a></p>
</form>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>