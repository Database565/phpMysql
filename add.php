<?php
require_once('connection.php');


if(isset($_POST['addToArtist']) && $_POST['addToArtist']){

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


if(isset($_POST['addToArtwork']) &&  $_POST['addToArtwork']){

    $groupName = $_POST['groupName'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $artistName = $_POST['artistName'];
    $getGroupName = mysqli_query($connection,"SELECT GName from group where GName='$groupName' LIMIT 1");
   // $getArtistName = mysqli_query($connection,"SELECT * FROM artist where AName = '$artistName'");
    $getTitle = mysqli_query($connection,"SELECT title FROM artwork where title = '$title' LIMIT 1");

//    if(!empty($getArtistName)){
//        echo "<script>window.alert('No primary key value for the artist name in artist table');</script>";
//        echo"<script>window.location.href = 'artist.php';</script>";
//    }
    $msg=" insert started";
    if (!empty($title) && !empty($getTitle)&& $title != $getTitle )
    {
        if(!empty($groupName) && empty($getGroupName) )
        {$msg=$msg.".... group name inserting".$groupName;
            $resGroup=mysqli_query($connection,"INSERT INTO artgallery.group (GName) VALUES ('$groupName')");
        $msg=$msg."....group name inserted";
        }
        $res=mysqli_query($connection,"INSERT INTO artwork (title,year,type,price,AName) VALUES ('$title','$year','$type','$price','$artistName')");

        $cntClassify = mysqli_query($connection,"SELECT * from classify where title='$title' and GName='$groupName'");
     if(!empty($cntClassify) && mysqli_num_rows($cntClassify)<1)
     {$resClassify=mysqli_query($connection,"INSERT INTO classify (title,GName) VALUES ('$title','$groupName')");}

        if(!$res){
            echo "<script>window.alert('Duplicate artwork');</script>";
            echo"<script>window.location.href = 'artist.php';</script>";
        }
        else{

            echo "<script>window.alert('inserted group name ".$msg."');</script>";
            echo"<script>window.location.href = 'artist.php';</script>";
        }
    }


}

if(isset($_POST['addToCustomer']) && $_POST['addToCustomer']){

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