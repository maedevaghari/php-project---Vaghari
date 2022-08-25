<?php
    session_start();
    include "setting/connect.php";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>search resault</title>
</head>
<body>
    <?php
        
        if(isset($_POST['search_sub'])){
            $search=$_POST['search'];
            $mysql= new mysqli($mysql_server , $mysql_username , $mysql_password, $mysql_db );
            if($mysql->connect_error)
                die('connection error');
    
            $sql="SELECT * FROM books WHERE name  like '%$search%' ";
            $resault= $mysql->query($sql);
            if($resault->num_rows==0){
                echo "<p>No items found</p>";
            }
            else{
                echo "<p style='color:blue;'>$resault->num_rows book Found...</p>";
            ?>

            <div >
            <?php
                for($i=0 ; $i<$resault->num_rows ; $i++){
                    $row=$resault->fetch_assoc();
                    $bid=$row['id'];
                    $bookname=$row['name'];
                    $bookauthor=$row['author'];
                    $bookimg=$row['tasvir'];
                    echo "<a href='book/show.php?bid=$bid'>";
                    echo "<div style='border:thin solid black;width:300px; height:300px;'";
                        echo "<div style='border-bottom:thin solid black;'>
                        <img src='picture/$bookimg' style='width:300px; height:300px;'></div>";
                        echo "<div style='padding:5px;'><p>book name :$bookname</p>
                        <p> author name :$bookauthor </p>
                        </div>";
                    echo "</div>";
                echo "</a>";
                }

            ?>
            </div>
            <?php
            }

        }
    ?>
</body>
</html>