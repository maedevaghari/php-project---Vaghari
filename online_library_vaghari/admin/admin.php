<?php
include ( "../setting/connect.php" );
session_start();
$show=true;

?>
<?php
if(isset($_POST['submit'])){
    $username=$_POST['user'];   //vaghari
    $password=$_POST['pass'];   //admin

    $mysqli=new mysqli($mysql_server,$mysql_username,$mysql_password,$mysql_db);
    $sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result=$mysqli->query($sql);
    if($result->num_rows>0){
     $_SESSION['admin_login']=$username;
     header("location:management.php");


}else{
    echo "<p style='color:red;'> Error</p>";
    echo "<p style='color:red;' >Worng Username or Password ...</p>".'<br>';
}
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> ADMIN  </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <?php
    if($show==true){
?>

<form action="#" method="POST" >
<p style='font-size:18px;color:rgb(148,0,211);'> Enter the admin login information.</p>
    username : <input type="text" name="user" placeholder="username" ><br><br>
    password : <input type="text" name="pass" placeholder="Password" ><br><br><br>

    <input type="submit" value="Submit" name="submit" 
    style="background-color: #DA70D6; width:80px;height:30px;">
   </form>
   <?php
    } 
    ?>
    
    </body>
</html>