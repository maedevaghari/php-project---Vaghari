<?php
include ("../setting/connect.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>study </title>
</head>
<body>
    <?php
    $bid=$_REQUEST['bid'];
    $mysql=new mysqli($mysql_server , $mysql_username , $mysql_password , $mysql_db);
    $sql="SELECT pdf FROM books WHERE id='$bid'";
    $resault=$mysql->query($sql);
    if($resault->num_rows>0){
        $row=$resault->fetch_assoc();
        $bookpdf=$row['pdf'];
        echo $bookpdf;

        
        header("Content-type:application/pdf");
        header("Content-Disposition:attachment;filename='downloaded.pdf'");
        readfile("../file/$bookfile");


    }



    ?>
    
</body>
</html>