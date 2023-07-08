<?php
session_start();
$query=$_POST['query'];
$QueryNo=$_POST['QueryNo'];
if (isset($_SESSION['uname']) && isset($_SESSION['pwd'])) {
  $uname = $_SESSION['uname'];
  $pwd = $_SESSION['pwd'];


  echo "Username: $uname<br>";
  echo "Password: $pwd";
} else {
  echo "Username and password not found in session.";
}




$servername="localhost";
$username="root";
$password="";
$database="dpe";
$con=new mysqli($servername,$username,$password,$database);





$sql="INSERT INTO `queries` (`Ht.No.`, `Query No.`, `Query`, `Reply`) VALUES ('$uname','$QueryNo', '$query', '')";
$res=$con->query($sql);


header("location: student.php");

$con->close();




?>	