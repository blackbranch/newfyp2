<?php
session_start();

include "assg_dbFunctions.php";
var_dunp($_POST);

$entered_username = $_POST['username'];
$entered_password = $_POST['password'];

$msg = "";

// Prepare and bind the parameters for the query
$queryCheck = "SELECT * FROM users WHERE username = ? AND password = SHA1(?)";
$stmtCheck = mysqli_prepare($link, $queryCheck);
mysqli_stmt_bind_param($stmtCheck, "ss", $entered_username, $entered_password);
mysqli_stmt_execute($stmtCheck);
$resultCheck = mysqli_stmt_get_result($stmtCheck);

if (mysqli_num_rows($resultCheck) == 1) {
    $row = mysqli_fetch_array($resultCheck);
    $_SESSION['userId'] = $row['userId'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['address'] = $row['address'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['entered_password'] = $entered_password;

    if (isset($_POST['remember'])) {
        setcookie("cookieName", $entered_username, time() + 3600);
    }
}

if (isset($_SESSION['username'])) {
    $msgWelcome = "<h6>Welcome, " . $_SESSION['username'] . "</h6>";
}
?>
<!DOCTYPE html>
<!--
The rest of the HTML remains unchanged.
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
    <?php if (isset($_SESSION['username'])) { ?>
        <div class="usernameMark">
            <?php echo $msgWelcome ?>
        </div>
        <div class="d-flex justify-content-center">
            <div class="colour infoCard cardmargin" style="width:450px">
                <div class="formheader">
                    <div class="infoheader" style="padding-top:10px">
                        <h1>Welcome</h1>
                        <hr>
                    </div>
                    <br>
                    <div class="formInputMargin" style="text-align: left"><b>Username: </b><?php echo $_SESSION['username'] ?><br></div>
                    <div class="formInputMargin" style="text-align: left"><b>Name: </b><?php echo $_SESSION['name'] ?><br></div>
                    <div class="formInputMargin" style="text-align: left"><b>Address: </b><?php echo $_SESSION['address'] ?><br></div>
                    <div class="formInputMargin" style="text-align: left"><b>Email: </b><?php echo $_SESSION['email'] ?><br></div>
                    <br>
                    <div class="d-flex justify-content-center">
                        <a href="assg_hotels.php"><button class="btn btn-dark" type="button">View Hotels</button></a><br><br>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    <?php } elseif (!isset($_SESSION['username'])) { ?>
        <div class="d-flex justify-content-center">
            <div class="colour infoCard cardmargin" style="width:450px">
                <div class="formheader">
                    <div class="infoheader" style="padding-top:10px">
                        <h1>Login Failed</h1>
                        <hr>
                    </div>
                    <br>
                    <p><h5>No matching record found!</h5></p>
                    <div class="d-flex justify-content-center">
                        <a href="assg_Login.php"><button class="btn btn-dark" type="button">Back to Login</button></a>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    <?php } ?>

</body>
</html>
