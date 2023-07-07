<?php

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
                        <h2>Register</h2>
                        <hr>
                    </div> 
                    <br>
                    <form action="assg_doRegister.php" method="post">
                        <div class="formInputMargin">
                            <label class="d-flex justify-self-left" for="username">Username:</label>
                            <input class="userpass100 blocking layout" type="text" name="username" placeholder="Enter username" required size="30" maxlength="60"/>
                            <br>
                            <label class="d-flex justify-self-left" for="password">Password:</label>
                            <input class="userpass100 blocking layout" type="password" name="password" placeholder="Enter password" required size="30" maxlength="40"/>
                            <br>
                            <label class="d-flex justify-self-left" for="name">Name:</label>
                            <input class="userpass100 blocking layout" type="text" name="name" placeholder="Enter name" required size="30" maxlength="80"/>
                            <br>
                            <label class="d-flex justify-self-left" for="address">Address:</label>
                            <input class="userpass100 blocking layout" type="text" name="address" placeholder="Enter address" required size="30" maxlength="80"/>
                            <br>
                            <label class="d-flex justify-self-left" for="email">Email:</label>
                            <input class="userpass100 blocking layout" type="text" name="email" placeholder="Enter email" required size="30" maxlength="80"/>
                            <br>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-dark" type="submit">Submit</button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
        <div >
            <h6 class="formheader">Already a member? <a href="assg_Login.php">login</a> now!</h6>
        </div>
    </body>