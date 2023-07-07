<?php
include "assg_dbFunctions.php";

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];

$userCheck = "SELECT * FROM users WHERE username = '$username'";
$userCheckResult = mysqli_query($link, $userCheck) or die(mysqli_error($link));

if (mysqli_num_rows($userCheckResult) == 0) {
    $query = "INSERT INTO users (username, password, name, address, email)"
            . "VALUES ('$username',SHA1('$password'),'$name','$address','$email')";

    $status = mysqli_query($link, $query);

    if ($status) {
        $msg = "<p><h2>Your new account has been successfully created.</h2><br>Login <a href='assg_Login.php'>here</a>.</p>";
    } else {
        $msg = "<p>Failed to create account</p>";
    }
} else {
    $msg = "<p>The username " . $username . " already exists.</p>";
    $msg .= "<p><a href='assg_Register.php'>Try again!</a></p>";
}

mysqli_close($link);
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
        <div class="d-flex justify-content-center">
            <div class="colour infoCard cardmargin" style="width:450px">
                <div class="formheader">
                    <div class="infoheader" style="padding-top:10px">
                        <h1>Account Registered</h1>
                        <hr>
                    </div>
                    <br>
                    <p>Your account is ready. Please login below!</p>
                    <div class="d-flex justify-content-center">
                        <a href="assg_Login.php"><button class="btn btn-dark" type="button">Login</button></a>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </body>
</html>
