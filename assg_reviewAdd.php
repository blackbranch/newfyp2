<?php
session_start();

if (!isset($_SESSION['userId'])) {
    include "assg_NavBar.php";
    include "assg_doBackToLogin.php";
    exit();
}

include "assg_dbFunctions.php";


$hotelID = $_GET['id'];

$queryHotel = "SELECT * FROM hotels WHERE hotelId=$hotelID";
$resultHotel = mysqli_query($link, $queryHotel) or die(mysqli_error($link));
$row = mysqli_fetch_array($resultHotel);
if (!empty($row)) {
    $picture = $row['picture'];
    $hotelname = $row['hotelName'];
    $hotelAdd = $row['hotelAddress'];
    $contact = $row['contactNo'];
    $description = $row['description'];
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
<?php include "stylesheets/assignmentStylesheet.css"; ?>
        </style>
        <title></title>
    </head>
    <body>
        <?php include "assg_Navbar.php" ?>
        <div class="d-flex justify-content-center">
            <div class="colour infoCard cardmargin" style="width:450px">
                <div class="formheader">
                    <div class="infoheader">
                        <h2>Add new review for <?php echo $hotelname ?></h2>
                        <hr>
                    </div>
                    <br>
                    <div>
                        <form action="assg_doReviewAdd.php?hotelId=<?php echo $hotelID ?>" method="post">
                            <div class="formInputMargin">
                                <label class="d-flex justify-self-left" for="username">Username:</label>
                                <?php if (isset($_SESSION['username'])) { ?>
                                    <input class="userpass100 blocking layout" type="text" value="<?php echo $_SESSION['username'] ?>" disabled name="username" required size="30" maxlength="100" autofocus id="username"/>
                                <?php } else { ?> 
                                    <input class="userpass100 blocking layout" type="text" name="username" placeholder="Enter username" required size="30" maxlength="100" autofocus id="username"/>
                                <?php } ?>
                            </div>
                            <br>
                            <div class="formInputMargin">
                                <label class="d-flex justify-self-left" for="comments">Comments:</label>
                                <textarea class="userpass100" name="comments" rows="5" required></textarea>
                            </div>
                            <br>
                            <div class="formInputMargin">
                                <label class="d-flex justify-self-left" for="ratings">Ratings:</label>
                                <select class="userpass100 blocking layout" placeholder="Select rating" name="rating" required>
                                    <option value="" disabled selected hidden>Select Rating</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <br>
                            <div>
                                <a href="assg_hotelReview.php?id=<?php echo $hotelID ?>"><button class="btn btn-dark" type="button">Cancel</button></a>
                                <button class="btn btn-dark" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </body>
</html>
