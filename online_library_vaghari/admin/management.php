<?php
session_start();
include ( "../setting/connect.php" );
$show=true;
if(!isset($_SESSION['admin_login'])){
    header("location:admin.php");
}
?>

<?php
if(isset($_POST['submit'])){
    $b_name=$_POST['b_name'];
    $b_author=$_POST['b_author'];
    $subject=$_POST['subject'];
    $abstract=$_POST['abstract'];

    $tasvir=$_FILES['tasvir']['name'];
    $addr_tasvir=$_FILES['tasvir']['tmp_name'];
    $type_tasvir=$_FILES['tasvir']['type'];

    $pdf=$_FILES['pdf']['name'];
    $addr_pdf=$_FILES['pdf']['tmp_name'];
    $type_pdf=$_FILES['pdf']['type'];

    //----------error_check
    if(empty($b_name) or empty($b_author) or empty($subject) or
     empty($abstract) or empty($tasvir) or empty($pdf)){
        array_push($errors,"Please complete all requested information");
         $show=true;
     }else{


    if(is_uploaded_file($addr_tasvir)) {
        $type1=array("image/jpg","image/png","image/jpeg");
        if(in_array($type_tasvir,$type1)) {
            if((move_uploaded_file($addr_tasvir,"../picture/".$tasvir)) and 
        (move_uploaded_file($addr_pdf,"../file/".$pdf))){

            echo "<p style='color:#4682B4;font-size:18px;'> uploaded successfuly .... </p>";
            $mysqli=new mysqli($mysql_server,$mysql_username,$mysql_password,$mysql_db);
             $sql="INSERT INTO books (name,author,subject,abstract,tasvir,pdf)
                  VALUES ('$b_name','$b_author','$subject','$abstract','$tasvir','$pdf')";
                $result=$mysqli->query($sql);
               echo "<p style='color:#4682B4;font-size:18px;'> Submit Done ... </p>"."<br>";
               echo "<a href=management.php> Go to management ...  </a>.<br>";
               echo "<a href=../user/logout.php> finish   </a>";
              $show=false;

}else{
                echo "<p style='color:#FF4500;font-size:18px;'> file cant uploaded </p>";
            }
        }
        else{
            echo "<p style='color:#FF4500;font-size:18px;'> Enter image in jpg/png/jpeg formats </p>";
        }}
        else{
        echo "<p style='color:#FF4500;font-size:18px;'> The file has not been uploaded ...  </p>";
    }
}}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> management book </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <?php
    if($show==true){
?>
<body>
   <form action="#" method="post" enctype="multipart/form-data" >
   <?php
   include ("../errors.php");
   ?> 
   <p style='font-size:18px;color:#2E8B57;'>  To add a new book to the site,
complete the following information </p>
    Book name :
    <input type="text" name="b_name" placeholder="The name of the book"  ><br><br>
    Author name :
    <input type="text" name="b_author" placeholder="Author name" ><br><br>
    Subject :
    <input type="text" name="subject" placeholder="book's subject" ><br><br>
    Abstract :
    <input type="text" name="abstract" placeholder="Abstract of the book"   size="45px" ><br><br>
    Book Image :
    <input type="file" name="tasvir" placeholder="Book image" ><br><br>
    Book File :
    <input type="file" name="pdf" placeholder="Pdf book" ><br><br><br>
    <input type="submit" value="Submit" name="submit"
    style="background-color: #98FB98; width:80px;height:30px;" >
   </form>
   <?php
   echo "<br>"."<a href=../user/logout.php> finish  </a>";
 }

    ?>
    </body>
</html>