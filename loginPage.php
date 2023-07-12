<!--<!DOCTYPE html>
<html>
    <head>
        <title>Signature Motors - Login</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/styles.css">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="homePage.php">Home</a></li>
                    <li><a href="carsPage.php">Cars</a></li>
                    <li><a href="loginPage.php">Login</a></li>
                </ul>
            </nav>
        </header>

        <div class="container">
            <h1>Login</h1>

            <form action="login.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>

                <input type="submit" value="Login">
            </form>
        </div>
    </body>
</html>-->
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Signature Motors - Home Page</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/styles.css">
    <!--        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" !important>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
    <div class="loginBody">
        <div class="login-box">
            <h2>Login</h2>
            <form action="doLogin.php" method="post">
                <div class="user-box">
                    <input type="text" name="username" required="">
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" required="">
                    <label>Password</label>
                </div>
                <button class="btn">
                    <a class="button" type="submit">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Submit
                    </a>
                </button>
            </form>
        </div>
    </div>
</body>
</html>
