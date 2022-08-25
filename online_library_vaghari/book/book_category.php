<?php
    session_start();
    include "../setting/connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>books </title>
</head>
<body>
<?php
        $type=$_REQUEST['type'];
        $mysql=new mysqli($mysql_server , $mysql_username , $mysql_password , $mysql_db);

        $sql="SELECT * FROM books WHERE subject='$type'";
        $resault=$mysql->query($sql);
        if($resault->num_rows>0){
            $count=$resault->num_rows;
            echo "<p style='color:rgb(0,128,128);font-size:20px;'> $count book exist.</p>"."<br>";
            for($i=0 ; $i<$resault->num_rows; $i++){
                $row=$resault->fetch_assoc();
                $bid=$row['id'];
                $bookname=$row['name'];
                $bookauthor=$row['author'];
                $bookimg=$row['tasvir'];
               


                echo "<a href='show.php?bid=$bid'>";
                    echo "<div style='border:thin solid black;width:300px; height:300px;'";
                        echo "<div style='border-bottom:thin solid black;'>
                        <img src='../picture/$bookimg' style='width:300px; height:300px;'></div>";
                        echo "<div style='padding:5px;'><p style='font-size:20px;color:rgb(0,0,139)'>book name :$bookname</p>
                        <p style='font-size:20px;color:rgb(0,0,139)'> author name :$bookauthor </p><br>
                        </div>";
                    echo "</div>";
                echo "</a>";
            }
            echo "</div>";
        }

        else{
            echo "no item exist";
        }




        
    ?>
    
</body>
</html>