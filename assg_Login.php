<?php ?>
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
                    <div class="infoheader" style="padding-top:10px">
                        <h2>Login</h2>
                        <hr>
                    </div>
                    <br>
                    <div class="formInputMargin">
                        <form action="assg_doLogin.php" method="post">
                            <label class="d-flex justify-self-left" for="username">Username:</label>
                            <?php if (!empty($_COOKIE['cookieName'])) { ?>
                                <input class="userpass100 blocking layout" type="text" name="username" value="<?php echo $_COOKIE['cookieName'] ?>" required size="30" maxlength="100" autofocus/>
                            <?php } else { ?>
                                <input class="userpass100 blocking layout" type="text" name="username" placeholder="Enter username"required size="30" maxlength="100" autofocus/>
                            <?php } ?>
                            <br>
                            <label class="d-flex justify-self-left" for="password">Password:</label>
                            <input class="userpass100 blocking layout" type="password" name="password" placeholder="Enter password" required size="30" maxlength="100"/>
                            <br>
                            <div class="d-flex flex-row">
                                <div>
                                    <input class="checkmark" type="checkbox" name="remember" id="remember">
                                </div>
                                <div>
                                    Remember me
                                </div>
                                <br><br>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="d-flex flex-row justify-content-around" style="width:170px">
                                    <a href="assg_Register.php"><button class="btn btn-dark" type="button">Register</button></a>
                                    <button class="btn btn-dark" type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>