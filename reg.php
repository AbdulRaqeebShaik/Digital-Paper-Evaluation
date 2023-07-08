<?php
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$pwd=$_POST['pwd'];
$role=$_POST['role'];
$gender=$_POST['gender'];
$phno=$_POST['phno'];
$desg=$_POST['desg'];
$dept=$_POST['dept'];
$expt=$_POST['expt'];




$servername="localhost";
$username="root";
$password="";
$database="dpe";
$con=new mysqli($servername,$username,$password,$database);



$sql1="INSERT INTO `userdetails` (`FirstName`, `LastName`, `email`, `pwd`,`Role`, `Gender`, `PhoneNumber`, `Designation`, `Department`,`Expertise`) VALUES ('$fname', '$lname', '$email','$pwd', '$role', '$gender', '$phno', '$desg', '$dept', '$expt')";
$sql2="INSERT INTO `users` (`userid`, `pwd`, `role`) VALUES ('$email', '$pwd', '$role')";
$res1=$con->query($sql1);
$res2=$con->query($sql2);
header("location:adduser.html");
$con->close();
?>
