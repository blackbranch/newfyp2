<?php
session_start();

if (!isset($_SESSION['userId'])) {
    include "assg_NavBar.php";
    include "assg_doBackToLogin.php";
    exit();
}

include "assg_dbFunctions.php";

$userId = $_GET['userId'];

$queryDeactivate = "DELETE FROM users WHERE userId= $userId";
$resultDeativate = mysqli_query($link, $queryDeactivate) or die(mysqli_error($link));
if ($resultDeativate) {
    session_destroy();
    setcookie("cookieName", "", time() - (86400 * 30));
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
    </head>
    <body>
        <?php include "assg_Navbar.php" ?>
        <div class="d-flex justify-content-center">
            <div class="colour infoCard cardmargin" style="width:450px">
                <div class="formheader">
                    <div class="infoheader" style="padding-top:10px">
                        <h1>Account Deactivated</h1>
                        <hr>
                    </div>
                    <h5>We hope you have enjoyed your time with us</h5>
                    <br>
                    <div>
                        <a href="assg_Login.php"><button class="btn btn-dark" type="button">Exit</button></a><br><br>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
