<?php
/*
$carname = filter_input(INPUT_POST, 'carname');
$username = filter_input(INPUT_POST, 'username');
$comment = filter_input(INPUT_POST, 'comment');
if (!empty($username)) {
    if (!empty($comment)) {
        $host = "localhost";
        $dbusername = "root";
        $dbcomment1 = "";
        $dbname = "fyp_database";

        // Create connection 
        $conn = new mysqli($host, $dbusername, $dbcomment1, $dbname);

        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        } else {
            // Here comes the vulnerability 
            $sql = "INSERT INTO reviews (carname, username, comment) VALUES ('$carname','$username','$comment')";

            if ($conn->query($sql)) {
                echo "New record is inserted successfully";
                echo "<p><a href='carsPage.php'>Writing more reviews?</a></p>";
            } else {
                echo "Error: " . $sql . " 
" . $conn->error;
            }

            $conn->close();
        }
    } else {
        echo "Password should not be empty";
        die();
    }
} else {
    echo "Username should not be empty";
    die();
}
?> 

*/
$carname = filter_input(INPUT_POST, 'carname');
$username = filter_input(INPUT_POST, 'username');
$comment = $_POST['comment']; // Removed input filtering and sanitization

if (!empty($username)) {
    if (!empty($comment)) {
        $host = "localhost";
        $dbusername = "root";
        $dbcomment1 = "";
        $dbname = "fyp_database";

        // Create connection  
        $conn = new mysqli($host, $dbusername, $dbcomment1, $dbname);

        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        } else {
            // Introduce persistent XSS vulnerability by not sanitizing user input

            $sql = "INSERT INTO reviews (carname, username, comment) VALUES ('$carname','$username','$comment')";

            if ($conn->query($sql)) {
                echo "New record is inserted successfully";
                echo "<p><a href='carsPage.php'>Writing more reviews?</a></p>";
            } else {
                echo "Error: " . $sql . "  
" . $conn->error;
            }

            $conn->close();
        }
    } else {
        echo "Password should not be empty";
        die();
    }
} else {
    echo "Username should not be empty";
    die();
}

// Amend the code to potentially allow script execution
echo "<div>" . $comment . "</div>";
?>