<?php
session_start();

if (!isset($_SESSION['userId'])) {
    include "assg_NavBar.php";
    include "assg_doBackToLogin.php";
    exit();
}

include "assg_dbFunctions.php";

if (isset($_SESSION['username'])) {
    $msg = "<h6>Welcome, " . $_SESSION['username'] . "</h6>";
}

$reviewId = $_GET['reviewId'];
$hotelId = $_GET['hotelId'];

$queryDoDelete = "DELETE FROM reviews WHERE reviewId=$reviewId";
$resultDoDelete = mysqli_query($link, $queryDoDelete) or die(mysqli_error($link));
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
                        <h1>Review Deleted</h1>
                        <hr>
                    </div>
                    <br>
                    <div>
                        <a href="assg_hotelReview.php?id=<?php echo $hotelId ?>"><button class="btn btn-dark" type="button">Back to Reviews</button></a><br><br>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </body>
</html>
