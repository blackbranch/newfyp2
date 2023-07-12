<?php
session_start();
// php file that contains the common database connection code
include "dbFunctions.php";

 if(isset($_SESSION['username'])){
     session_destroy();
 }

$message = "<p>You have logged out.<br /><br/>
        <a href='login.php'>Go back to login page</a></p>";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Get Together - Where the neighborhood comes together!</title>
        <link rel="stylesheet" type="text/css" href="Solution/style.css" />
    </head>
    <body>
        <h3>Get Together - Logout</h3>
        <?php
        echo $message;
        ?>
    </body>
</html>