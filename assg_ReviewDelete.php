<?php
session_start();

if (!isset($_SESSION['userId'])) {
    include "assg_NavBar.php";
    include "assg_doBackToLogin.php";
    exit();
}

include "assg_dbFunctions.php";

$hotelId = $_GET['hotelId'];
$reviewId = $_GET['reviewId'];

if (isset($_SESSION['username'])) {
    $msg = "<h6>Welcome, " . $_SESSION['username'] . "</h6>";
}

$queryHotelPull = "SELECT * FROM hotels WHERE hotelId=$hotelId";
$resultHotelPull = mysqli_query($link, $queryHotelPull);
$rowHotelPull = mysqli_fetch_array($resultHotelPull);
if (!empty($rowHotelPull)) {
    $hotelName = $rowHotelPull['hotelName'];
}

$queryReviewPull = "SELECT * FROM reviews WHERE reviewId=$reviewId";
$resultReviewPull = mysqli_query($link, $queryReviewPull);
$rowReviewPull = mysqli_fetch_array($resultReviewPull);
if (!empty($rowReviewPull)) {
    $review = $rowReviewPull['review'];
    $rating = $rowReviewPull['rating'];
    $datePosted = $rowReviewPull['datePosted'];
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
        <div class="usernameMark">
            <?php echo $msg ?>
        </div>
        <div class="d-flex justify-content-center">
            <div class="colour  infoCard cardmargin" style="width:450px">
                <div class="formheader">
                    <div class="infoheader" style="padding-top:10px">
                        <h1>Delete Review</h1>
                        <hr>

                    </div>
                    <br>
                    <div class="formInputMargin" style="text-align: left"><b>Hotel Name:</b><br></div>
                    <div class="formInputMargin" style="text-align: left"><?php echo $hotelName ?></div><br>
                    <div class="formInputMargin" style="text-align: left"><b>Comments:</b><br></div>
                    <div class="formInputMargin" style="text-align: left"><?php echo $review ?></div><br>
                    <div class="formInputMargin" style="text-align: left"><b>Ratings:</b><br></div>
                    <div class="formInputMargin" style="text-align: left"><?php echo $rating ?></div><br>
                    <div class="formInputMargin" style="text-align: left"><b>Date:</b><br></div>
                    <div class="formInputMargin" style="text-align: left"><?php echo $datePosted ?></div><br>
                    <div class="d-flex justify-content-center">
                        <form class="d-flex flex-row justify-content-around" style="width:170px">
                            <a href="assg_hotelReview.php?id=<?php echo $hotelId ?>"><button class="btn btn-dark" type="button">Cancel</button></a><br><br>
                            <a href="assg_doReviewDelete.php?reviewId=<?php echo $reviewId ?>&hotelId=<?php echo $hotelId ?>"><button class="btn btn-danger" type="button">Confirm</button></a>
                        </form>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </body>
</html>
