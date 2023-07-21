<?php
session_start();

try {
    // Connect to the database
    $link = mysqli_connect('localhost', $user, $pass);
    if (!$link) {
        throw new Exception('Error connecting to the database: ' . mysqli_connect_error());
    }

    if (!isset($_SESSION['userId'])) {
        include "assg_NavBar.php";
        include "assg_doBackToLogin.php";
        exit();
    }

    include "assg_dbFunctions.php";

    $msg = "";

    if (isset($_SESSION['username'])) {
        $msg = "<h6>Welcome, " . $_SESSION['username'] . "</h6>";
    }

    $hotelID = $_GET['id'];

    // Fetch reviews
    $queryReview = "SELECT * FROM reviews WHERE hotelId=$hotelID ORDER BY rating DESC";
    $resultReview = mysqli_query($link, $queryReview);
    if (!$resultReview) {
        throw new Exception('Error executing the query: ' . mysqli_error($link));
    }

    $arrReview = array();
    while ($row = mysqli_fetch_array($resultReview)) {
        $arrReview[] = $row;
    }

    // Fetch hotel details
    $queryHotel = "SELECT * FROM hotels WHERE hotelId=$hotelID";
    $resultHotel = mysqli_query($link, $queryHotel);
    if (!$resultHotel) {
        throw new Exception('Error executing the query: ' . mysqli_error($link));
    }
    $row = mysqli_fetch_array($resultHotel);
    if (!empty($row)) {
        $hotelname = $row['hotelName'];
    }
} catch (Exception $e) {
    // Handle the exception gracefully
    echo 'An error occurred: ' . $e->getMessage();
    exit();
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
    <div class="formheader hotelListHeader">
        <h1>Hotel Reviews for <?php echo $hotelname ?></h1>
        <hr>
    </div>
    <br>
    <div class="reviewTableMargin">
        <table class="table table-dark table-striped table-hover" border="1" cellspacing="2" cellpadding="2">
            <tr>
                <th>Review</th>
                <th>Rating</th>
                <th>Date posted</th>
                <th>Username</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php if (!empty($arrReview)) { ?>
                <?php for ($x = 0; $x < count($arrReview); $x++) {
                    $reviewId = $arrReview[$x]['reviewId'];
                    $hotelId = $arrReview[$x]['hotelId'];
                    $userId = $arrReview[$x]['userId'];
                    $review = $arrReview[$x]['review'];
                    $datePosted = $arrReview[$x]['datePosted'];
                    $rating = $arrReview[$x]['rating'];

                    $queryUsername = "SELECT username FROM users WHERE userId = '$userId'";
                    $resultUsername = mysqli_query($link, $queryUsername);
                    $rowUsername = mysqli_fetch_array($resultUsername);
                    if (!empty($rowUsername)) {
                        $username = $rowUsername['username'];
                    }
                ?>
                    <tr>
                        <td><?php echo $review; ?></td>
                        <td><?php echo $rating; ?></td>
                        <td><?php echo $datePosted; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php if ($userId == $_SESSION['userId']) { ?>
                                <a href="assg_reviewEdit.php?id=<?php echo $hotelID ?>&reviewId=<?php echo $reviewId ?>&userId=<?php echo $userId ?>">
                                    <button class="btn btn-light" type="button">Edit</button>
                                </a>
                            <?php } ?>
                        </td>
                        <td><?php if ($userId == $_SESSION['userId']) { ?>
                                <a href="assg_ReviewDelete.php?hotelId=<?php echo $hotelId ?>&reviewId=<?php echo $reviewId ?>">
                                    <button class="btn btn-danger" type="button">Delete</button>
                                </a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </div>
    <br>
    <br>
    <div class="d-flex justify-content-center">
        <div class="d-flex flex-row justify-content-around" style="width:250px">
            <a href="assg_hotels.php">
                <button class="btn btn-dark" type="button">Back to Hotels</button>
            </a>
            <a href="assg_reviewAdd.php?id=<?php echo $hotelID ?>">
                <button class="btn btn-dark" type="button">Add review</button>
            </a>
        </div>
    </div>
</body>
</html>

