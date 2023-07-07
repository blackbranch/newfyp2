<?php
session_start();

if (!isset($_SESSION['userId'])) {
    include "assg_NavBar.php";
    include "assg_doBackToLogin.php";
    exit();
}

include "assg_dbFunctions.php";


$msg = "";

if (isset($_SESSION['username'])) {
    $msg = "<h6>Welcome, " . $_SESSION['username'] . "</h6>";
}

$hotelId = $_GET['hotelId'];
$addReview = $_POST['comments'];
$addRating = $_POST['rating'];
$addDate = date('Y-m-d');
$userId = $_SESSION['userId'];

$queryAddReview = "INSERT INTO reviews (hotelId, userId, review, rating, datePosted)"
        . "VALUES ('$hotelId','$userId','$addReview','$addRating','$addDate')";
$status = mysqli_query($link, $queryAddReview);
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
        <div class="usernameMark">
            <?php echo $msg ?>
        </div>
        <div class="d-flex justify-content-center">
            <div class="colour infoCard cardmargin" style="width:450px">
                <div class="formheader">
                    <div class="infoheader" style="padding-top:10px">
                        <h1>Review Added</h1>
                        <hr>
                    </div>
                    <br>
                    <div class="formInputMargin" style="text-align: left"><b>Comments:</b><br></div>
                    <div class="formInputMargin" style="text-align: left"><?php echo $addReview ?></div><br>
                    <div class="formInputMargin" style="text-align: left"><b>Ratings:</b><br></div>
                    <div class="formInputMargin" style="text-align: left"><?php echo $addRating ?></div><br>
                    <div class="formInputMargin" style="text-align: left"><b>Date:</b><br></div>
                    <div class="formInputMargin" style="text-align: left"><?php echo $addDate ?></div><br>
                    <a href="assg_hotelReview.php?id=<?php echo $hotelId ?>"><button class="btn btn-dark" type="button">Back to reviews</button></a><br><br>
                </div>
            </div>
        </div>
    </body>
</html>
