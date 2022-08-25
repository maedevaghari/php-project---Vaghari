<?php
include ( "../setting/connect.php" );
$show=true;

session_start();
    if(isset($_SESSION['user_login'])){
        header("location:../index.php");
}
?>
<?php
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $pass=md5($password);

    if(empty($email) or empty($pass)){
        array_push($errors,"Please complete all requested information");
         $show=true;
     }else{

    $mysqli=new mysqli($mysql_server,$mysql_username,$mysql_password,$mysql_db);
    $sql="SELECT * FROM user WHERE email='$email' AND password='$pass'";
    $result=$mysqli->query($sql);
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
        $_SESSION['fname']=$row['firstname'];
        $_SESSION['lname']=$row['lastname'];
        $_SESSION['email']=$row['email'];
        if($row['activation']=='yes'){
            $_SESSION['user_login']=$email;
            header("location:../index.php");
        }else{
            $show=false;
        }
    }
        else{
            echo '<p style="color:red;"> Worng Email or Password !</p>';
          }}}
            ?>

    <?php
    if(isset($_POST['active'])){
        $email=$_SESSION['email'];
        $code=$_POST['act_code'];

        $mysql= new mysqli($mysql_server , $mysql_username , $mysql_password, $mysql_db );
        if($mysql->connect_error)
             die('connection error');
         $sql="SELECT * FROM user WHERE email='$email'AND confirmCode='$code' ";
         $result=$mysql->query($sql);
        if($result->num_rows>0){
             $mysqli=new mysqli($mysql_server,$mysql_username,$mysql_password,$mysql_db);
              $sql="UPDATE user SET activation='yes',confirmCode='' WHERE confirmCode='$code'";
              $result=$mysqli->query($sql);
              if($result==true){
              $_SESSION['user_login']=$email;
              header("location:../index.php");
         }}else{
            echo '<p style="color:red;"> The activation code in invalid !</p>';
            $show=false;
        }
        }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <?php
    if($show==true){
?>

<form action="#" method="POST" >
    <?php
include ("../errors.php");
?>
<p style='font-size:18px;color:rgb(255,215,0);'> Enter your email and pssword to log in .</p>
    <input type="text" name="email" placeholder="Email" ><br><br>
    <input type="text" name="pass" placeholder="Password" ><br><br><br>

    <input type="submit" value="Submit" name="submit" 
    style="background-color: rgb(240,230,131); width:80px;height:30px;"><br><br>
    <a href="signin.php"> if you dont have an account ...</a>
   </form>
   <?php
    } 
    ?>
    <?php
    if($show==false){
        ?>
        <form action="#" method="POST">
            <?php
            echo "<p style='font-size:18px;'> User Email :</p>".
            "<p style='color:rgb(255,215,0);font-size:18px;'> $email</p>";

            ?>
        Activation Code :
        <input type="text" name="act_code" placeholder="Enter your activation code ...">
        <input type="submit" name="active" value="Active" id="submit"
        style="background-color: rgb(240,230,131); width:80px;height:30px;"  >

        <?php
    }?>
</body>
</html>