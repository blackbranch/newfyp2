<?php

session_start();

if (!isset($_SESSION['userId'])) {
    include "assg_NavBar.php";
    include "assg_doBackToLogin.php";
    exit();
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
        <div class="d-flex justify-content-center">
            <div class="colour infoCard cardmargin" style="width:450px">
                <div class="formheader">
                    <div class="infoheader">
                        <h2>Change password</h2>
                        <hr>
                    </div>
                    <br>
                    <div>
                        <form action="assg_doChangePassword.php" method="post">
                            <div class="formInputMargin">
                                <label class="d-flex justify-self-left" for="currentPassword">Current Password:</label>
                                <input class="userpass100 blocking layout" type="password" name="currentPassword" placeholder="Enter current password" required size="30" maxlength="100" autofocus id="username"/>
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
    </body>
</html>