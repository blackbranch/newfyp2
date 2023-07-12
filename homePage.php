<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Signature Motors - Home Page</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/styles.css">
<!--    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    
    <div id="demo" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">src="images/information.png"
                <div class="carousel-item active" data-interval="500">
                    <div class="overlay-image" style="background-image:url(./images/car6.jpg);"></div>
                    <div class="container">
                        <h1>About us</h1>
                        <p>Welcome to Signature Motors, the ultimate destination for automotive enthusiasts. 
                            Our review website provides unbiased and comprehensive evaluations of the latest vehicles, helping you make informed decisions. We're passionate about cars and committed to delivering exceptional content and fostering a vibrant community. 
                            Join us on your automotive journey and discover the power of knowledge.</p>
                        <a href="carsPage.php" type="submit" class="btn btn-lg btn-primary">Review Cars</a>
                    </div>
                </div>
                <div class="carousel-item" data-interval="500">
                    <div class="overlay-image" style="background-image:url(./images/car5.jpg);"></div>
                    <div class="container">
                        <h1>Vision</h1>
                        <p>At Signature Motors, our vision is to redefine the way people engage with and understand the automotive world. 
                            We aim to be the ultimate resource for car enthusiasts and prospective buyers, 
                            empowering them to make educated choices and shape the future of automotive knowledge sharing.</p>
                        <a href="carsPage.php" type="submit" class="btn btn-lg btn-primary">Review Cars</a>
                    </div>
                </div>

                <div class="carousel-item" data-interval="500">
                    <div class="overlay-image" style="background-image:url(./images/car3.jpg)"></div>
                    <div class="container">
                        <h1>Contact Us</h1>
                        <p>For any inquiries, feedback, or suggestions, feel free to reach out to us at smfeedback@gmail.com. 
                            We value your input and look forward to assisting you on your automotive journey.</p>
                        <a href="carsPage.php" type="submit" class="btn btn-lg btn-primary">Review Cars</a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

    <div class="container-card">
        <div class="card">
            <img src="images/khairul.jpg" alt="Profile 1">
            <h2>Khairul Az</h2>
            <p>Chief executive officer</p>
        </div>

        <div class="card">
            <img src="images/syukri.jpg" alt="Profile 2">
            <h2>Adi Syukri</h2>
            <p>President</p>
        </div>

        <div class="card">
            <img src="images/irfan.jpg" alt="Profile 3">
            <h2>Nur Irfan</h2>
            <p>Chief financial officer</p>
        </div>
    </div>

</body>
</html>