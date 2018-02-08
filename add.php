<?php
require_once('connection.php');


if(isset($_POST['addToArtist']) && $_POST['addToArtist']){

    $artistName = $_POST['artistName'];
    $birthplace = $_POST['birthplace'];
    $age = $_POST['age'];
    $style = $_POST['style'];

    $res=mysqli_query($connection,"INSERT INTO artist (AName,Birthplace,Age,Style) VALUES ('$artistName','$birthplace','$age','$style')");
    $resLikeArtist=mysqli_query($connection,"insert into artbase.like_artist(CustID,AName) select c.CustID,a.AName from artbase.customer c join artbase.artist a where a.AName not in (select AName from artbase.like_artist)");
    if(!$res){
        echo "<script>window.alert('not inserted');</script>";
        echo"<script>window.location.href = 'artist.php';</script>";
    }
    else{
        echo "<script>window.alert('Record Inserted');</script>";
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
        {//$msg=$msg.".... group name inserting".$groupName;
            $resGroup=mysqli_query($connection,"INSERT INTO artbase.group (GName) VALUES ('$groupName')");
             $resLikeGroup=mysqli_query($connection,"insert into artbase.like_group(CustID,GName) select c.CustID,a.GName from artbase.customer c join artbase.group a where a.GName not in (select GName from artbase.like_group) ");
   
        //$msg=$msg."....group name inserted";
        }
        $res=mysqli_query($connection,"INSERT INTO artwork (Title,Year,Type,Price,AName) VALUES ('$title','$year','$type','$price','$artistName')");

        $cntClassify = mysqli_query($connection,"SELECT * from classify where title='$title' and GName='$groupName'");
     if(!empty($cntClassify) && mysqli_num_rows($cntClassify)<1)
     {$resClassify=mysqli_query($connection,"INSERT INTO classify (title,GName) VALUES ('$title','$groupName')");}

        if(!$res){
            echo "<script>window.alert('Duplicate artwork');</script>";
            echo"<script>window.location.href = 'artist.php';</script>";
        }
        else{

            echo "<script>window.alert('Record inserted');</script>";
            echo"<script>window.location.href = 'artist.php';</script>";
        }
    }


}

if(isset($_POST['addToCustomer']) && $_POST['addToCustomer']){

    $customerID = $_POST['customerID'];
    $costumerName = $_POST['costumerName'];
    $adress = $_POST['adress'];
    $amount = $_POST['amount'];

    $res=mysqli_query($connection,"INSERT INTO customer (CName,address,amount) VALUES ('$costumerName','$adress','$amount')");
    $resLikeArtist=mysqli_query($connection,"insert into artbase.like_artist(CustID,AName) select c.CustID,a.AName from artbase.customer c join artbase.artist a where c.CustID not in (select CustID from artbase.like_artist) ");
     $resLikeGroup=mysqli_query($connection,"insert into artbase.like_group(CustID,GName) select c.CustID,a.GName from artbase.customer c join artbase.group a where c.CustID not in (select CustID from artbase.like_group) ");
    if(!$res){
        echo "<script>window.alert('not inserted');</script>";
        echo"<script>window.location.href = 'artist.php';</script>";
    }
    else{
        echo "<script>window.alert('Record inserted');</script>";
        echo"<script>window.location.href = 'artist.php';</script>";
    }

}


?>