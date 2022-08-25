<?php
session_start();
$user_login=false;
$username="";
if(isset($_SESSION['user_login'])){
    $user_login=true;
    $firstname=$_SESSION['fname'];
    $lastname=$_SESSION['lname'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> online library </title>
</head>
<body>
    <?php
        if($user_login==true){
            echo "<p style='color:rgb(75,0,130);font-size:30px; '> welcome $firstname  $lastname </p>"."<br>";
                 ?>
                 <button style="width:100px;height:50px; background-color:rgb(240,128,128);"> 
                <a href="user/logout.php"> <h3> Logout </h3> </a>
                 </button><br><br>



            <?php 
        }
        else{
            ?>
            
            <button style="width:100px;height:50px; background-color:rgb(240,128,128);"> 
                <a href="user/login.php"><h3> Login </h3> </a>
            </button><br><br>
            <button style="width:100px;height:50px; background-color:rgb(240,128,128);">
            <a href="user/signin.php"><h3> Sign in </h3> </a>
        
        </button>
           
            <br><br>
            <button style="width:100px;height:50px; background-color:rgb(240,128,128);">
            <a href="admin/admin.php"><h3> Admin </h3>  </a>
        
        </button>
            
            <br><br><br>
            <?php
        }
        ?>
        <section>
            

        <div >
            <form action="search.php" method="POST">
            <p style="font-size: ;20px;"> Search for the Name of the book ...</p>
                <input type="text" name="search" placeholder=" Search ..."  size="30px" >
                <input type="submit" id="search_button" value="Search" name="search_sub"
                 style="background-color: rgb(102,205,170); width:80px;height:30px;" >
            </form>
        </div>

        <div >
            <p style="font-size:40px;">books Category</p>
        </div>
        <div >
            <a href="book/book_category.php?type=educational">
                <div><p style="color:rgb(128,0,0); font-size:25px;">educational books</p></div>
            </a>
            <a href="book/book_category.php?type=romance">
                <div><p style="color:#C71585; font-size:25px;">romance books</p></div>
            </a>
            <a href="book/book_category.php?type=historical">
                <div><p style="color:#FFA500; font-size:25px;">historical books</p></div>
            </a>
            <a href="book/book_category.php?type=geography">
                <div><p style="color:#4B0082; font-size:25px;">geography books</p></div>
            </a>
            
            <a href="book/book_category.php?type=psychology">
                <div><p style="color:#228B22; font-size:25px;">psychology books</p></div>
            </a>
            <a href="book/book_category.php?type=fictional">
                <div><p style="color:#DC143C; font-size:25px;">fictional books</p></div>
            </a>
            
        </div>
    </section>



    
</body>
</html>