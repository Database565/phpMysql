<?php
require_once('connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Gallery</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="javascript.js"></script>

<body>
    <div>
        <h1>Do an add to the databases</h1>
        <p>Click to see the options</p>

        <form action="add.php" method="post">
            <h3>Add to Artist table:</h3>
            <input type="hidden" name="addToArtist" value="addToArtist">
            <label>Artist Name:</label><input type="text" name="artistName">
            <label>Birthplace:</label><input type="text" name="birthplace">
            <label> Age: </label><input type="text" name="age">
            <label>Style: </label><input type="text" name="style">
            <button type="submit" name="add" value="add" >Add</button>


        </form>
        <form action="add.php" method="post">

            <h3>Add to Artwork table:</h3>
            <input type="hidden" name="addToArtwork" value="addToArtwork">
            <label>Title:</label><input type="text" name="title">
            <label>Year:</label><input type="text" name="year">
            <label> Type: </label><input type="text" name="type">
            <label>Price: </label><input type="text" name="price">
            <label>Artist Name: </label><input type="text" name="artistName">
            <button type="submit" name="add" value="add" >Add</button>


        </form>
        <form action="add.php" method="post" >
            <h3>Add to Customer</h3>
            <input type="hidden" name="addToCustomer" value="addToCustomer">
            <label>Customer ID:</label><input type="text" name="customerID">
            <label>Costumer Name:</label><input type="text" name="costumerName">
            <label> Adress: </label><input type="text" name="adress">
            <label>Amount: </label><input type="text" name="amount">
            <button type="submit" name="add" value="add" >Add</button>


        </form>
    </div>
    <div>
        <h1> Do an update to the existing table </h1>
        <p>Click to see the options</p>
    </div>
    <div>
        <h1>See the database</h1>
        <p>See all the tables</p>

        <p>Get the list of artists</p>
        <p>Get the list of artworks</p>
        <p>Get the list of groups</p>
        <p>Get the list of classify entries</p>
        <p>Get the list of like group entries</p>
        <p>Get the list of like artist entries</p>
    </div>
</body>
</html>