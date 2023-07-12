<?php
// php file that contains the common database connection code
include "dbFunctions.php";

$username = $_POST['username'];
$password = $_POST['password'];

$usernameCheck = "SELECT * FROM account WHERE username = '$username'";
$resultCheck = mysqli_query($link, $usernameCheck) or die (mysqli_error($link));

if (mysqli_num_rows($resultCheck) == 0) {
    $query = "INSERT INTO account
              (name,gender,birthdate,username,password) 
              VALUES 
               '$username',SHA1('$password'))";

    $status = mysqli_query($link, $query);

    if ($status) {
        $message = "<p>Your new account has been successfully created. 
                    You are now ready to <a href='login.php'>login</a>.</p>";
    }
    else {
        $message = "account creation failed";
    }

} 
else {
    $message = "<p>The username " . $username . " already exists.</p>";
    $message .= "<a href='register.php'>Try again!</a>";

}

mysqli_close($link);

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <title>Get Together - Where the neighborhood comes together!</title>
        <link rel="stylesheet" type="text/css" href="Solution/style.css">
    </head>
    <body>
        <h3>Get Together - Register</h3>
        <?php
        echo $message;
        ?>
    </body>
</html>