<?php
require_once('connection.php');

if($_POST['addToArtist']){

    $artistName = $_POST['artistName'];
    $birthplace = $_POST['birthplace'];
    $age = $_POST['age'];
    $style = $_POST['style'];

    $res=mysqli_query($connection,"INSERT INTO artist (AName,birthplace,age,style) VALUES ('$artistName','$birthplace','$age','$style')");
    if(!$res){
        echo "<script>window.alert('not inserted');</script>";
        echo"<script>window.location.href = 'artist.php';</script>";
    }
    else{
        echo "<script>window.alert('inserted');</script>";
        echo"<script>window.location.href = 'artist.php';</script>";
    }

}


if($_POST['addToArtwork']){

    $title = $_POST['title'];
    $year = $_POST['year'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $artistName = $_POST['artistName'];

    $res=mysqli_query($connection,"INSERT INTO artwork (title,year,type,price,AName) VALUES ('$title','$year','$type','$price','$artistName')");
    if(!$res){
        echo "<script>window.alert('not inserted');</script>";
        echo"<script>window.location.href = 'artist.php';</script>";
    }
    else{
        echo "<script>window.alert('inserted');</script>";
        echo"<script>window.location.href = 'artist.php';</script>";
    }

}

if($_POST['addToCustomer']){

    $customerID = $_POST['customerID'];
    $costumerName = $_POST['costumerName'];
    $adress = $_POST['adress'];
    $amount = $_POST['amount'];

    $res=mysqli_query($connection,"INSERT INTO customer (custId,CName,address,amount) VALUES ('$customerID','$costumerName','$adress','$amount')");
    if(!$res){
        echo "<script>window.alert('not inserted');</script>";
        echo"<script>window.location.href = 'artist.php';</script>";
    }
    else{
        echo "<script>window.alert('inserted');</script>";
        echo"<script>window.location.href = 'artist.php';</script>";
    }

}


?>