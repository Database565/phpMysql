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
    .getButton{
        margin-bottom: 5px;
        margin-top: 5px;
        min-width: 300px;
    }
    .tablePrint{
        margin-top: 5px;
        margin-bottom: 5px;
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
                <!-- Updating the database -->
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Click here Update the database tables
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse">
                        <div class="card-body">
                            <form action="update.php" method="post">
                            <p>This is a update querry for artist style. Select the artist name you want to change the style</p>
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
                            <label>New Style: </label>
                            <input class="form-control" type="text" name="newStyle">
                            <br>
                            <button class="btn btn-primary" type="submit" name="update" value="update" >Update</button>
                            </form>


                        </div>
                    </div>
                </div>


                <!-- Select data from table -->
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Click here to see the database tables
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse">
                        <div class="card-body">

                            <button type="button" class="btn btn-secondary getButton" data-toggle="collapse" data-target="#getArtist" name="artist">Get the list of artist</button>
                            <br>
                            <div id="getArtist" class="collapse tablePrint">

                                <?php
                                $resultArtist = mysqli_query($connection,'SELECT * FROM artist');
                                echo "<table border='1'>";
                                echo"<tr>";
                                echo "<th>AName</th>";
                                echo"<th>Birthplace</th>";
                                echo"<th>Age</th>";
                                echo"<th>Style</th>";
                                echo"</tr>";
                                while($row = mysqli_fetch_array($resultArtist))
                                {
                                    echo "<tr>";
                                    echo "<td>" . $row['AName'] . "</td>";
                                    echo "<td>" . $row['birthplace'] . "</td>";
                                    echo "<td>" . $row['age'] . "</td>";
                                    echo "<td>" . $row['style'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                ?>


                            </div>
                            <button type="button" class="btn btn-secondary getButton" data-toggle="collapse" data-target="#getArtwork" name="artwork">Get the list of the artwork</button>
                            <br>
                            <div id="getArtwork" class="collapse tablePrint">
                                <?php
                                $resultArtist = mysqli_query($connection,'SELECT * FROM artwork');
                                echo "<table border='1'>";
                                echo"<tr>";
                                echo "<th>Title</th>";
                                echo"<th>Year</th>";
                                echo"<th>Type</th>";
                                echo"<th>Price</th>";
                                echo"<th>Artist Name</th>";
                                echo"</tr>";
                                while($row = mysqli_fetch_array($resultArtist))
                                {
                                    echo "<tr>";
                                    echo "<td>" . $row['title'] . "</td>";
                                    echo "<td>" . $row['year'] . "</td>";
                                    echo "<td>" . $row['type'] . "</td>";
                                    echo "<td>" . $row['price'] . "</td>";
                                    echo "<td>" . $row['AName'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                ?>
                            </div>
                            <button type="button" class="btn btn-secondary getButton" data-toggle="collapse" data-target="#getCustomer" name="customer">Get the list of the customer</button>
                            <br>
                            <div id="getCustomer" class="collapse tablePrint">
                                <?php
                                $resultArtist = mysqli_query($connection,'SELECT * FROM customer');
                                echo "<table border='1'>";
                                echo"<tr>";
                                echo "<th>Customer Id</th>";
                                echo"<th>Customer Name</th>";
                                echo"<th>Address</th>";
                                echo"<th>Amount</th>";

                                echo"</tr>";
                                while($row = mysqli_fetch_array($resultArtist))
                                {
                                    echo "<tr>";
                                    echo "<td>" . $row['custId'] . "</td>";
                                    echo "<td>" . $row['CName'] . "</td>";
                                    echo "<td>" . $row['address'] . "</td>";
                                    echo "<td>" . $row['amount'] . "</td>";

                                    echo "</tr>";
                                }
                                echo "</table>";
                                ?>


                            </div>
                            <button type="button" class="btn btn-secondary getButton" data-toggle="collapse" data-target="#getClassify" name="classify">Get the list of classify entries</button>
                            <br>
                            <div id="getClassify" class="collapse tablePrint">
                                <?php
                                $resultArtist = mysqli_query($connection,'SELECT * FROM classify');
                                echo "<table border='1'>";
                                echo"<tr>";
                                echo "<th>Title</th>";
                                echo"<th>Group Name</th>";


                                echo"</tr>";
                                while($row = mysqli_fetch_array($resultArtist))
                                {
                                    echo "<tr>";
                                    echo "<td>" . $row['title'] . "</td>";
                                    echo "<td>" . $row['GName'] . "</td>";


                                    echo "</tr>";
                                }
                                echo "</table>";
                                ?>



                            </div>
                            <button type="button" class="btn btn-secondary getButton" data-toggle="collapse" data-target="#getGroupEntries" name="groupEntries">Get the list of like group entries</button>
                            <br>
                            <div id="getGroupEntries" class="collapse tablePrint">
                                <?php
                                $resultArtist = mysqli_query($connection,'SELECT GName FROM group');
                                echo "<table border='1'>";
                                echo"<tr>";
                                echo"<th>Group Name</th>";
                                echo"</tr>";
                                while($row = mysqli_fetch_array($resultArtist))
                                {
                                    echo "<tr>";
                                    echo "<td>" . $row['GName'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                ?>


                            </div>
                            <button type="button" class="btn btn-secondary getButton" data-toggle="collapse" data-target="#getArtistEntries" name="artistEntries">Get the list of like artist entries</button>
                            <div id="getArtistEntries" class="collapse">
                                <p>here i will write to get the artist entries</p>


                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>
</html>