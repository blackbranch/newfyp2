<?php
session_start();

if (!isset($_SESSION['userId'])) {
    include "assg_NavBar.php";
    include "assg_doBackToLogin.php";
    exit();
}

include "assg_dbFunctions.php";

$passwordNew = $_POST['passwordNew'];
$passwordReEnter = $_POST['passwordReEnter'];
$userId = $_SESSION['userId'];
$userPassword = $_SESSION['entered_password'];
$status = FALSE;
$passReuse = FALSE;


if ($passwordReEnter == $userPassword) {
    $passReuse = TRUE;
} else {
    if ($passwordNew == $passwordReEnter) {
        $queryUpdatePassword = "UPDATE users SET password= SHA1('$passwordReEnter') WHERE userId=$userId";
        $resultUpdatePassword = mysqli_query($link, $queryUpdatePassword) or die(mysqli_error($link));
        $status = TRUE;
    } else {
        $status = FALSE;
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
        <?php if ($passReuse == TRUE) { ?>
            <div class="d-flex justify-content-center">
                <div class="colour infoCard cardmargin" style="width:450px">
                    <div class="formheader">
                        <div class="infoheader" style="padding-top:10px">
                            <h1>Password update failed!</h1>
                            <hr>
                        </div>
                        <h5>You cannot use the same password again</h5>
                        <br>
                        <div>
                            <a href="assg_ChangePassword.php"><button class="btn btn-dark" type="button">Try again</button></a><br><br>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <?php if ($status == TRUE) { ?>
                <div class="d-flex justify-content-center">
                    <div class="colour infoCard cardmargin" style="width:450px">
                        <div class="formheader">
                            <div class="infoheader" style="padding-top:10px">
                                <h1>Password updated</h1>
                                <hr>
                            </div>
                            <br>
                            <div>
                                <a href="assg_hotels.php"><button class="btn btn-dark" type="button">Back</button></a><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="d-flex justify-content-center">
                    <div class="colour infoCard cardmargin" style="width:450px">
                        <div class="formheader">
                            <div class="infoheader" style="padding-top:10px">
                                <h1>Password update failed</h1>
                                <hr>
                            </div>
                            <br>
                            <div class="d-flex justify-content-center">
                                <div class="d-flex flex-row justify-content-around" style="width:170px">
                                    <a href="assg_hotels.php"><button class="btn btn-dark" type="button">Back</button></a><br><br>
                                    <a href="assg_ChangePassword.php"><button class="btn btn-dark" type="button">Try again</button></a><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </body>
</html>
