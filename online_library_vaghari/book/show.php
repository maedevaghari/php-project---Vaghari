<?php
    session_start();
    include "../setting/connect.php";

    if(!isset($_SESSION['user_login'])){
        header("location:../user/login.php");

    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>books</title>
</head>
<body>
    <?php
        $bid=$_REQUEST['bid'];
        $mysql=new mysqli($mysql_server , $mysql_username , $mysql_password , $mysql_db);
        $sql="SELECT * FROM books WHERE id='$bid'";
        $resault=$mysql->query($sql);
        if($resault->num_rows>0){
        $row=$resault->fetch_assoc();
        $bid=$row['id'];
        $bookname=$row['name'];
        $bookauthor=$row['author'];
        $bookimg=$row['tasvir'];
        $bookabs=$row['abstract'];

    ?>

            <div>
                <div>
                    <?php
                        
                        echo "<div>";
                        echo "<img src='../picture/$bookimg' style='width:500; height:400px;'>";
                        echo "</div>";
                        
                    ?>
                </div>
                <div class="">
                    <?php
                        echo "<p style='font-size:21px;' >book name : <strong>$bookname</strong></p>";
                        echo "<p style='font-size:21px;'>book author : <strong>$bookauthor </strong></p>";
                        echo "<p style='font-size:21px;' >abstract  : <strong> $bookabs </strong> </p>";
                        echo "<div><a href='study.php?bid=$bid' style='padding:10px 20px; 
                        background-color:yellow; color:black; border-radius:5px;'> study </a></div>"."<br><br>";

                    ?>
                </div>
            </div>

    <?php } ?>
</body>
</html>