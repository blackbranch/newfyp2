<?php
session_start();

if (!isset($_SESSION['userId'])) {
    include "assg_NavBar.php";
    include "assg_doBackToLogin.php";
    exit();
}

include "assg_dbFunctions.php";

$msg = "";

if (!isset($_SESSION['username'])) {
    $msg = "<h3>GEt Together</h3>";
    $msg .= "<h4>Please <a href='assg_login.php'>Log in</a> .</h4>";
} else {
    $msg = "<h6>Welcome, " . $_SESSION['username'] . "</h6>";
}

$query = "SELECT * FROM hotels";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
while ($row = mysqli_fetch_array($result)) {
    $arrContent[] = $row;
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
        <title>Hotel Review App - Login</title>
    </head>
    <body>
        <?php include "assg_Navbar.php" ?>
        <div class="usernameMark">
            <?php echo $msg ?>
        </div>
        <div class="formheader hotelListHeader">
            <h1>List of hotels</h1>
            <hr>
        </div>
        <div class="card-group flex-coloum d-flex justify-content-center">
            <?php
            for ($x = 0; $x < count($arrContent); $x++) {
                $id = $arrContent[$x]['hotelId'];
                $hotelname = $arrContent[$x]['hotelName'];
                $hotelAdd = $arrContent[$x]['hotelAddress'];
                $hotelPicture = $arrContent[$x]['picture'];
                $contact = $arrContent[$x]['contactNo'];
                $info = $arrContent[$x]['description'];
                ?>
                <div class="row allMargin">
                    <div class="column ">
                        <div class="card shadowHotel imageSize borderHotels cardSize">
                            <img class="card-img-top picTop" src="pictures/<?php echo $hotelPicture; ?>" alt="missing">
                            <div class="card-body" style="height:170px">
                                <p class="padName"><h4><b><?php echo $hotelname ?></b></h4></P>
                                <p><h6><?php echo $hotelAdd ?></h6></p>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <a href="assg_hotelInfo.php?id=<?php echo $id ?>"><button class="btn btn-dark" type="button">See More</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </body>
</html>
