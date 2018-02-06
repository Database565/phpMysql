<?php
require_once('connection.php');
$artistName = $_POST['artistName'];
$birthplace = $_POST['birthplace'];
$age = $_POST['age'];
$style = $_POST['style'];

$res=mysqli_query($connection,"INSERT INTO artist (AName,birthplace,age,style) VALUES ('$artistName','$birthplace','$age','$style')");
if(!$res){
     echo 'not inserted';
}
else{
    echo 'inserted';
}
?>