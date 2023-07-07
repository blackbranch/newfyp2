<?php
session_start();

if (!isset($_SESSION['userId'])) {
    include "assg_NavBar.php";
    include "assg_doBackToLogin.php";
    exit();
} 

include "assg_dbFunctions.php";

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
$count = 0;
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
                    <div class="infoheader" style="padding-top:10px">
                        <h1>Deactivate Account</h1>
                        <hr>
                    </div>
                    <br>
                    <div class="formInputMargin" style="text-align: left"><b>Username:</b><br></div>
                    <div class="formInputMargin" style="text-align: left"><?php echo $username ?></div><br>
                    <div class="formInputMargin" style="text-align: left"><b>Name:</b><br></div>
                    <div class="formInputMargin" style="text-align: left"><?php echo $name ?></div><br>
                    <div class="formInputMargin" style="text-align: left"><b>Address:</b><br></div>
                    <div class="formInputMargin" style="text-align: left"><?php echo $address ?></div><br>
                    <div class="formInputMargin" style="text-align: left"><b>Email:</b><br></div>
                    <div class="formInputMargin" style="text-align: left"><?php echo $email ?></div><br>
                </div>
                <div class="d-flex justify-content-center">
                    <form class="d-flex flex-row justify-content-around" style="width:200px" action="assg_doDeactivate.php?userId=<?php echo $userId ?>" method="post">
                        <a href="assg_hotels.php"><button class="btn btn-dark" type="button">Cancel</button></a>               
                        <button class="btn btn-danger" type="submit">Deactivate</button>
                    </form>
                </div>
                <br>
            </div>
        </div>
    </body>
</html>
