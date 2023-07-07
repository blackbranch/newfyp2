<?php
session_start();

if (!isset($_SESSION['userId'])) {
    include "assg_NavBar.php";
    include "assg_doBackToLogin.php";
    exit();
}

$currentPassword = $_POST['currentPassword'];
$userPassword = $_SESSION['entered_password'];

$status = 0;

if ($currentPassword == $userPassword) {
    $status = 1;
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
        <?php if ($status == TRUE) { ?>
            <div class="d-flex justify-content-center">
                <div class="colour infoCard cardmargin" style="width:450px">
                    <div class="formheader">
                        <div class="infoheader">
                            <h2>Enter new password</h2>
                            <hr>
                        </div>
                        <br>
                        <div>
                            <form action="assg_doUpdatePassword.php" method="post">
                                <div class="formInputMargin">
                                    <label class="d-flex justify-self-left" for="passwordNew">New Password:</label>
                                    <input class="userpass100 blocking layout" type="password" name="passwordNew" placeholder="Enter new password" required size="30" maxlength="100" autofocus id="username"/>
                                </div>
                                <br>
                                <div class="formInputMargin">
                                    <label class="d-flex justify-self-left" for="passwordReEnter">Enter again:</label>
                                    <input class="userpass100 blocking layout" type="password" name="passwordReEnter" placeholder="Enter password again" required size="30" maxlength="100" autofocus id="username"/>
                                </div>
                                <br>
                                <div>
                                    <a href="assg_hotels.php"><button class="btn btn-dark" type="button">Cancel</button></a>
                                    <button class="btn btn-dark" type="submit">Enter</button>
                                </div>
                            </form>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        <?php } elseif ($status == FALSE) { ?>
            <div class="d-flex justify-content-center">
                <div class="colour infoCard cardmargin" style="width:450px">
                    <div class="formheader">
                        <div class="infoheader" style="padding-top:10px">
                            <h1>Wrong password</h1>
                            <hr>
                        </div>
                        <br>
                        <p><h5>Password entered invalid!</h5></p>
                        <div class="d-flex justify-content-center">
                            <a href="assg_hotels.php"><button class="btn btn-dark" type="button">Back</button></a>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        <?php } ?>
    </body>
</html>