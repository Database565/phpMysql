<?php
require_once('connection.php');
if (isset($_POST['newStyle']) && $_POST['newStyle'] && isset($_POST['artistName']) && $_POST['artistName']) {
    $newStyle = $_POST['newStyle'];
    $artistName = $_POST['artistName'];
    $res = mysqli_query($connection, "UPDATE artist SET style = '$newStyle' WHERE AName = '$artistName'");
    if (!$res) {
        echo "<script>window.alert('not inserted');</script>";
        echo "<script>window.location.href = 'artist.php';</script>";
    } else {
        echo "<script>window.alert('inserted');</script>";
        echo "<script>window.location.href = 'artist.php';</script>";
    }


} else {
    echo "<script>window.alert('Please enter all the fields'); </script>";
    echo "<script>window.location.href = 'artist.php';</script>";
}
?>