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



/*
$username = $_POST['username']; 
$comment = $_POST['comment']; 
 * 
 * 
 * 
 */

/*
$carname = filter_input(INPUT_POST, 'carname');
$username = filter_input(INPUT_POST, 'username');
$comment = filter_input(INPUT_POST, 'comment');

if (!empty($username)){ 
    if (!empty($comment)){ 
        $host = "localhost"; 
        $dbusername = "root"; 
        $dbcomment1 = ""; 
        $dbname = "fyp_database"; 
         
        // Create connection 
        $conn = new mysqli ($host, $dbusername, $dbcomment1, $dbname); 
         
        if (mysqli_connect_error()){ 
            die('Connect Error ('. mysqli_connect_errno() .') ' . mysqli_connect_error()); 
        } 
        else{ 
            // Here's the modified code with a reflected XSS vulnerability 
            echo "<h3>Welcome, " . $username . "!</h3>"; 
            echo "<p>Your comment: " . $comment . "</p>"; 
             
            // Insert the review into the database 
           $sql = "INSERT INTO reviews (username, comment) VALUES ('$username', '$comment')";
            if ($conn->query($sql)) {
                echo "New record is inserted successfully";
                echo "<p><a href='carsPage.php'>Writing more reviews?</a></p>";
            } else {
                echo "Error: " . $sql . "

". $conn->error; 
            } 
             
            $conn->close(); 
        } 
    } 
    else{ 
        echo "Comment should not be empty"; 
        die(); 
    } 
} 
else{ 
    echo "Username should not be empty"; 
    die(); 
}

*/
/*
$carname = $_POST['carname'];
$username = $_POST['username'];
$comment = $_POST['comment'];
if (!empty($username)){
    if (!empty($comment)){
        // Here's the modified code with the intentional vulnerability to reflect the user input without sanitization
        echo "<h3>Welcome, " . $username . "!</h3>";
        echo "<p>Your comment: " . $comment . "</p>";
        echo "<p><a href='carsPage.php'>Writing more reviews?</a></p>";
    }
    else{
        echo "Comment should not be empty";
        die();
    }
}
else{
    echo "Username should not be empty";
    die();
}
 * 
 */


session_start();

$carname = $_GET['carname'];
$username = $_GET['username'];
$comment = $_GET['comment'];

if (!empty($username)){
    if (!empty($comment)){
        // Here's the modified code with the intentional vulnerability to reflect the user input without sanitization
        echo "<h3>Welcome, " . $username . "!</h3>";
        echo "<p>Your comment: " . $comment . "</p>";
        
        echo "<p><a href='carsPage.php'>Writing more reviews?</a></p>";
    }
    else{
        echo "Comment should not be empty";
        die();
    }
}
else{
    echo "Username should not be empty";
    die();
}
?>
