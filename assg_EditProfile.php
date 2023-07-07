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

$userId = $_SESSION['userId'];

$queryEditProfile = "SELECT * FROM users WHERE userId = $userId";
$resultEditProfile = mysqli_query($link, $queryEditProfile) or die(mysqli_error($link));
$rowEditProfile = mysqli_fetch_array($resultEditProfile);
if (!empty($rowEditProfile)) {
    $username = $rowEditProfile['username'];
    $password = $rowEditProfile['password'];
    $name = $rowEditProfile['name'];
    $address = $rowEditProfile['address'];
    $email = $rowEditProfile['email'];
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
        <title>Hotel Review App</title>
    </head>
    <body>
        <?php include "assg_Navbar.php" ?>
        <div class="d-flex justify-content-center">
            <div class="colour infoCard cardmargin" style="width:450px">
                <div class="formheader">
                    <div class="infoheader" style="padding-top:10px">
                        <h2>Update Profile</h2>
                        <hr>
                    </div> 
                    <br>
                    <form action="assg_doEditProfile.php" method="post">
                        <div class="formInputMargin">
                            <label class="d-flex justify-self-left" for="username">Username:</label>
                            <input class="userpass100 blocking layout" type="text" name="username" value="<?php echo $username ?>" required size="30" maxlength="60"/>
                            <br>
                            <label class="d-flex justify-self-left" for="name">Name:</label>
                            <input class="userpass100 blocking layout" type="text" name="name" value="<?php echo $name ?>" required size="30" maxlength="80"/>
                            <br>
                            <label class="d-flex justify-self-left" for="address">Address:</label>
                            <input class="userpass100 blocking layout" type="text" name="address" value="<?php echo $address ?>" required size="30" maxlength="80"/>
                            <br>
                            <label class="d-flex justify-self-left" for="email">Email:</label>
                            <input class="userpass100 blocking layout" type="text" name="email" value="<?php echo $email ?>" required size="30" maxlength="80"/>
                            <br>
                        </div>
                        <div>
                            <a href="assg_hotels.php"><button class="btn btn-dark" type="button">Cancel</button></a>
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </body>