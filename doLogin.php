<?php
session_start();

// php file that contains the common database connection code
include "dbFunctions.php";
var_dump($_POST);

$entered_username = $_POST['username'];
$entered_password = $_POST['password'];

$msg = "";

$queryCheck = "SELECT * FROM account
          WHERE username='$entered_username'
          AND password = '$entered_password'";
$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

if (mysqli_num_rows($resultCheck) == 1) {
    $row = mysqli_fetch_array($resultCheck);
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $row['username'];

    $msg = "<p><i>You are logged in as " . $_SESSION['username'] . "</p>";
    $msg .= "<p><a href='homePage.php'>Home</a></p>";
} elseif (mysqli_num_rows($resultCheck) == 0) {
    $msg = "<p>Sorry, you must enter a valid username and password to log in</p>";
    $msg .= "<p><a href='login.php'>Go back to log in page</a></p>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Login</title>
    </head>
    <body style="color:white;">
        <header>
            <a class="logo" href="#"><img width="100%" height="50px" src="images/logo.jpg"></a>
            <nav>
                <ul class="nav__links">
                    <li><a href="homePage.php">Home</a></li>
                    <li><a href="carsPage.php">Cars</a></li>
                    <li><a href="loginPage.php">Login</a></li>
                </ul>
            </nav>
        </header>
        <br><br>
        <div class="logged" style="text-align: center;";>
            <h3>Successful!</h3>
            <?php
            echo $msg;
            ?>
        </div>
    </body>
</html>
