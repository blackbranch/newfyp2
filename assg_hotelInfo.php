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

$searchBar = FALSE;

if (isset($_GET['search'])) {
    $searchBar = TRUE;
    $userInput = $_GET['userSearch'];
    $querySearch = "SELECT * FROM hotels WHERE hotelName LIKE '%$userInput%'";
    $resultSearch = mysqli_query($link, $querySearch) or die(mysqli_error($link));
    $rowSearch = mysqli_fetch_array($resultSearch);
    if (!empty($rowSearch)) {
        $hotelId = $rowSearch['hotelId'];
    } else {
        echo $hotelId;
    }
    $query = "SELECT * FROM hotels WHERE hotelId=$hotelId";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $row = mysqli_fetch_array($result);
    if (!empty($row)) {
        $picture = $row['picture'];
        $hotelname = $row['hotelName'];
        $hotelAdd = $row['hotelAddress'];
        $contact = $row['contactNo'];
        $description = $row['description'];
    }
}

if ($searchBar == FALSE) {
    $hotelId = $_GET['id'];
    $query = "SELECT * FROM hotels WHERE hotelId=$hotelId";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $row = mysqli_fetch_array($result);
    if (!empty($row)) {
        $picture = $row['picture'];
        $hotelname = $row['hotelName'];
        $hotelAdd = $row['hotelAddress'];
        $contact = $row['contactNo'];
        $description = $row['description'];
    }
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
        <div class="formheader hotelListHeader">
            <h1>Hotel Information</h1>
            <hr>
        </div>
        <div class="d-flex justify-content-center">
            <div class="cardmargin colour infoCard" style="width:1000px">
                <div class="formheader">
                    <div class="infoheader">
                        <b><h4><?php echo $hotelname ?></h4></b>
                        <hr>
                    </div>
                    <br>
                    <b>Address:</b> <?php echo $hotelAdd ?>
                    <br>
                    <b>Contact No:</b> <?php echo $contact ?>
                    <br>
                    <br>
                    <div style="text-align:center">
                        <p class="reviewTableMargin"><?php echo $description ?></p>
                    </div>

                </div>
                <div class="d-flex justify-content-center" style="margin-bottom:15px">
                    <a href="assg_hotelReview.php?id=<?php echo $hotelId ?>"><button class="btn btn-dark" type="button">See reviews</button></a>
                </div>
                <div>
                <img class="card-img-bottom picBottom" src="pictures/<?php echo $picture ?>"/>
                </div>
            </div>
        </div>
    </body>
</html>
