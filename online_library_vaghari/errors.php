<?php
if(count($errors)>0){
    ?>
    <div style="color: red; border:2px black solid; width:300px ; height:40px;">
    <?php
    foreach ($errors as $error){
        echo "<p> $error </p>";
?>
</div>
<?php
echo "<br><br>";
    }}

    ?>

