<?php
include ( "../setting/connect.php" );
?>
<?php
$show=true;
$errors=array();
if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $addr=$_POST['addr'];
    $pass=$_POST['pass'];

    //----------error_check
    if(empty($fname) or empty($lname) or empty($email) or empty($mobile) or empty($addr) or empty($pass)){
        array_push($errors,"Please complete all requested information");
         $show=true;
     }else{

    $mysqli=new mysqli($mysql_server,$mysql_username,$mysql_password,$mysql_db);
    $sql="SELECT * FROM user WHERE email='$email'";
    $result=$mysqli->query($sql);
    if($result->num_rows>0){
        echo "<p style='color: rgb(0,128,0);font-size:18px'>Email already exist !</p>";
        echo "<a href='signin.php'> sign in again </a>";
        die();
        
        
    }
    $pass=md5($pass);
    $confirmCode   = substr( rand() * 900000 + 100000, 0, 6 );

    $sql="INSERT INTO user (firstname,lastname,email
    ,mobile,address,password,confirmCode,activation)
    VALUES ('$fname','$lname','$email','$mobile','$addr','$pass','$confirmCode','no')";

    $result=$mysqli->query($sql);
    echo " <p style='color: rgb(0,128,0); font-size:18px;'> Submit Done ... </p>";
    echo "<p style='color: rgb(0,128,0); font-size:18px;'>  Your activation code is : </p>".$confirmCode."<br>";
    echo "<a href=../index.php> Go to main page  </a>";
    $show=false;

}}
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sign in</title>
</head>
<?php
    if($show){
?>
<body>
   <form action="#" method="post" >
    <?php
   include ("../errors.php");
   ?>
   <p style="color: rgb(0,128,0); font-size:18px;"> Complete the form below with the correct information .</p>
   Firstname : 
    <input type="text" name="fname" placeholder="First name"  ><br><br>
    Lastname :
    <input type="text" name="lname" placeholder="Last name" ><br><br>
    Email :
    <input type="text" name="email" placeholder="Email" ><br><br>
    Mobile :
    <input type="text" name="mobile" placeholder="Mobile" ><br><br>
    Address :
    <input type="text" name="addr" placeholder="Address" ><br><br>
    Password :
    <input type="text" name="pass" placeholder="Password" ><br><br><br>
    <input type="submit" value="Submit" name="submit"
    style="background-color: rgb(173,255,47); width:80px;height:30px;" >
   </form>
   <?php
    }
    ?>

    
</body>
</html>