<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
    <h2>Upload a File</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="fileToUpload">Select a file:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>


<?php
if (isset($_FILES["fileToUpload"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;

    // Check if the form was submitted
    if (isset($_POST["submit"])) {
        // Check if the file was uploaded without any errors
        if ($_FILES["fileToUpload"]["error"] === UPLOAD_ERR_OK) {
            // Allow any file type
            $uploadOk = 1;
        } else {
            echo "Sorry, there was an error uploading your file.";
            $uploadOk = 0;
        }
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        echo "<p><a href='assg_hotels.php'>Home</a></p>";
    }
}
?>

