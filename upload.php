<?php
$HtNo = $_POST['HtNo'];
$targetDir = ""; // Directory where the uploaded file will be stored
$targetFile = $targetDir . basename($_FILES["file"]["name"]); // Path of the uploaded file

// Check if file is selected
if(isset($_FILES["file"])){
    // Check if file upload is successful
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)){
        // File uploaded successfully, process further
        $filename = basename($_FILES["file"]["name"]);
        $fileContent = file_get_contents($targetFile); // Read file content

        // Connect to your WAMP server's database (replace with your database credentials)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "dpe";

        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert file content into the database as a BLOB
        $stmt = $conn->prepare("INSERT INTO answerscripts (`Ht.No.`, filename, filedata) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $HtNo, $filename, $fileContent);

        if ($stmt->execute()) {
header("location: addanswerscripts.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    else{
        echo "Error uploading the file.";
    }
}
?>
