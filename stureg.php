<?php
$HtNo=$_POST['HtNo'];
$Name=$_POST['Name'];
$Year=$_POST['Year'];
$Sem=$_POST['Sem'];
$Branch=$_POST['Branch'];




$servername="localhost";
$username="root";
$password="";
$database="dpe";
$con=new mysqli($servername,$username,$password,$database);



$sql="INSERT INTO `studentdetails` (`Ht.No.`, `Name`, `Year`, `Sem`,`Branch`) VALUES ('$HtNo', '$Name', '$Year','$Sem', '$Branch')";
$res=$con->query($sql);
header("location:addstudent.html");
$con->close();
?>
