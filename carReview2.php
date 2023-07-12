<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Signature Motors - Car Reviews</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

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

        <br><br><br><br>
        <div class="formBox">
            <form method="post" action="doReview2.php">
                Car Name:<br><input type="text" name="carname" size="41" value="Bugatti Chiron" readonly><br><br>
                Username:<br><input type="text" name="username" size="41"><br><br>
                Comments:<br>
                <textarea name="comment" rows="5" cols="40"></textarea><br><br>
                <input class="submitButton" type="submit" value="Submit">
            </form>
        </div>


    </body>
</html>
