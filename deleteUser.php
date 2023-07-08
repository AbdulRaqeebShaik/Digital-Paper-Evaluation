<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dpe";
$email = $_POST['email'];


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql1 = "DELETE FROM users WHERE userid = '$email'";
$sql2 = "DELETE FROM userdetails WHERE email = '$email'";


$res1 = $conn->query($sql1);
$res2 = $conn->query($sql2);



header("location:deleteUser.html");
$conn->close();
?>
