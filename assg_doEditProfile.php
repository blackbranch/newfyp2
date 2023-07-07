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

$newUsername = $_POST['username'];
$newName = $_POST['name'];
$newAddress = $_POST['address'];
$newEmail = $_POST['email'];
$userId = $_SESSION['userId'];

$queryProfileEdit = "UPDATE users SET username='$newUsername', name='$newName', address='$newAddress', email='$newEmail' WHERE userId='$userId'";
$resultProfileEdit = mysqli_query($link, $queryProfileEdit) or die(mysqli_error($link));
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
            <?php if ($resultProfileEdit) { ?>
                <div class="colour infoCard cardmargin" style="width:450px">
                    <div class="formheader">
                        <div class="infoheader" style="padding-top:10px">
                            <h1>Profile Edited</h1>
                            <hr>
                        </div>
                        <br>
                        <div class="formInputMargin" style="text-align: left"><b>Username:</b><br></div>
                        <div class="formInputMargin" style="text-align: left"><?php echo $newUsername ?></div><br>
                        <div class="formInputMargin" style="text-align: left"><b>Name:</b><br></div>
                        <div class="formInputMargin" style="text-align: left"><?php echo $newName ?></div><br>
                        <div class="formInputMargin" style="text-align: left"><b>Address:</b><br></div>
                        <div class="formInputMargin" style="text-align: left"><?php echo $newAddress ?></div><br>
                        <div class="formInputMargin" style="text-align: left"><b>Email:</b><br></div>
                        <div class="formInputMargin" style="text-align: left"><?php echo $newEmail ?></div><br>
                        <a href="assg_hotels.php"><button class="btn btn-dark" type="button">Back to Hotels</button></a><br><br>
                    </div>
                </div>
            <?php } ?>
        </div>
    </body>
</html>

