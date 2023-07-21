
<?php
session_start();

// Error handling for MySQL connection
$link = mysqli_connect('localhost', $user, $pass);
if (!$link) {
    die('Error connecting to the database: ' . mysqli_connect_error());
}

if (!isset($_SESSION['userId'])) {
    include "assg_NavBar.php";
    include "assg_doBackToLogin.php";
    exit();
}

include "assg_dbFunctions.php";

if (isset($_SESSION['username'])) {
    $msg = "<h6>Welcome, " . $_SESSION['username'] . "</h6>";
}

$hotelID = $_GET['id'];
$reviewId = $_GET['reviewId'];
$userId = $_GET['userId'];

// Error handling for the database queries
$queryHotel = "SELECT * FROM hotels WHERE hotelId=$hotelID";
$resultHotel = mysqli_query($link, $queryHotel);
if (!$resultHotel) {
    die('Error executing the query: ' . mysqli_error($link));
}
$row = mysqli_fetch_array($resultHotel);
if (!empty($row)) {
    $picture = $row['picture'];
    $hotelname = $row['hotelName'];
    $hotelAdd = $row['hotelAddress'];
    $contact = $row['contactNo'];
    $description = $row['description'];
}

$queryReviewSpecific = "SELECT * FROM reviews WHERE reviewId=$reviewId";
$resultReviewSpecific = mysqli_query($link, $queryReviewSpecific);
if (!$resultReviewSpecific) {
    die('Error executing the query: ' . mysqli_error($link));
}
$rowReviewSpecific = mysqli_fetch_array($resultReviewSpecific);
if (!empty($rowReviewSpecific)) {
    $rating = $rowReviewSpecific['rating'];
    $datePosted = $rowReviewSpecific['datePosted'];
    $review = $rowReviewSpecific['review'];
}

$queryUserReview = "SELECT * FROM users WHERE userId=$userId";
$resultUserReview = mysqli_query($link, $queryUserReview);
if (!$resultUserReview) {
    die('Error executing the query: ' . mysqli_error($link));
}
$rowUserReview = mysqli_fetch_array($resultUserReview);
if (!empty($rowUserReview)) {
    $username = $rowUserReview['username'];
}
?>

<!DOCTYPE html>
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
    <div class="usernameMark">
        <?php echo $msg ?>
    </div>
    <div class="d-flex justify-content-center">
        <div class="colour infoCard cardmargin" style="width:450px">
            <div class="formheader">
                <div class="infoheader" style="padding-top:10px">
                    <h1>Edit review</h1>
                    <hr>
                </div>
                <br>
                <div>
                    <form action="assg_doReviewEdit.php?reviewId=<?php echo $reviewId ?>&userId=<?php echo $userId ?>&hotelId=<?php echo $hotelID ?>" method="post">
                        <div class="formInputMargin">
                            <label class="d-flex justify-self-left" for="username">Username:</label>
                            <input class="userpass100 blocking layout" value="<?php echo $username ?>" disabled type="text" name="username" placeholder="Enter username" required size="30" maxlength="100" autofocus id="username"/>
                        </div>
                        <br>
                        <div class="formInputMargin">
                            <label class="d-flex justify-self-left" for="comments">Comments:</label>
                            <textarea class="userpass100" name="comments" rows="5"><?php echo $review ?></textarea>
                        </div>
                        <br>
                        <div class="formInputMargin">
                            <label class="d-flex justify-self-left" for="ratings">Ratings:</label>
                            <?php if (isset($rating)) { ?>
                                <select class="userpass100 blocking layout" name="rating" required placeholder="Select rating">
                                    <option value="" disabled selected hidden><?php echo $rating ?></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            <?php } ?>
                        </div>
                        <br>
                        <div>
                            <a href="assg_hotelReview.php?id=<?php echo $hotelID ?>"><button class="btn btn-dark" type="button">Cancel</button></a>
                            <button class="btn btn-success" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
                <br>
            </div>
        </div>
    </div>
</body>
</html>

