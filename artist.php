<?php
require_once('connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Gallery</title>
</head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<style>
    lable{
        padding-bottom: 5px;
        padding-top: 5px;
    }
</style>
<body>
    <div class="container">

<!--        <div>-->
<!--            <h1> Do an update to the existing table </h1>-->
<!--            <p>Click to see the options</p>-->
<!--        </div>-->
<!--        <div>-->
<!--            <h1>See the database</h1>-->
<!--            <p>See all the tables</p>-->
<!---->
<!--            <p>Get the list of artists</p>-->
<!--            <p>Get the list of artworks</p>-->
<!--            <p>Get the list of groups</p>-->
<!--            <p>Get the list of classify entries</p>-->
<!--            <p>Get the list of like group entries</p>-->
<!--            <p>Get the list of like artist entries</p>-->
<!--        </div>-->
        <div>
            <div class="jumbotron" align="center">
                <h1>CS575 Database Homework3</h1>
                <p>A PHP-MYSQL application to perform CRUD Operations.</p>
            </div>
            <div id="accordion">
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Click here to add to Database
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse">
                        <div class="card-body">
                            <form action="add.php" method="post">
                                <h5>Add to Artist table:</h5>
                                <input class="form-control" type="hidden" name="addToArtist" value="addToArtist">
                                <label>Artist Name:</label>
                                <input class="form-control" type="text" name="artistName">
                                <label>Birthplace:</label>
                                <input class="form-control" type="text" name="birthplace">
                                <label> Age: </label>
                                <input class="form-control" type="text" name="age">
                                <label>Style: </label>
                                <input class="form-control" type="text" name="style">
                                <br>
                                <button type="submit" class="btn btn-primary" name="add" value="add" >Add</button>
                            </form>
                            <br>
                            <form action="add.php" method="post">
                                <h5>Add to Artwork table:</h5>
                                <input class="form-control" type="hidden" name="addToArtwork" value="addToArtwork">
                                <label>Title:</label>
                                <input class="form-control" type="text" name="title">
                                <label>Year:</label>
                                <input class="form-control" type="text" name="year">
                                <label> Type: </label>
                                <input class="form-control" type="text" name="type">
                                <label>Price: </label>
                                <input class="form-control" type="text" name="price">

                                <?php
                                $getArtistName=mysqli_query($connection,"SELECT AName FROM artist");
                                ?>
                                <label>Choose Artist Name:</label>
                                <select class="form-control" name="artistName">
                                <?php
                                while($row = mysqli_fetch_array($getArtistName))
                                {?>
                                     <option value="<?php echo($row['AName']);?>"> <?php echo($row['AName']);?> </option>
                               <?php }
                                ?>
                                </select>
<!--                                <label>Artist Name: </label>-->
<!--                                <input class="form-control" type="text" name="artistName">-->
                                <label>Group Name: </label>
                                <input class="form-control" type="text" name="groupName">
                                <br>
                                <button class="btn btn-primary" type="submit" name="add" value="add" >Add</button>
                            </form>
                            <form action="add.php" method="post" >
                                <h5>Add to Customer</h5>
                                <input class="form-control" type="hidden" name="addToCustomer" value="addToCustomer">
                                <label>Customer ID:</label>
                                <input class="form-control" type="text" name="customerID">
                                <label>Costumer Name:</label>
                                <input class="form-control" type="text" name="costumerName">
                                <label> Adress: </label>
                                <input class="form-control" type="text" name="adress">
                                <label>Amount: </label>
                                <input class="form-control" type="text" name="amount">
                                <br>
                                <button class="btn btn-primary" type="submit" name="add" value="add" >Add</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Collapsible Group Item #2
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>
</html>