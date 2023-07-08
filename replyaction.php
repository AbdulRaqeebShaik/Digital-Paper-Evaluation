<?php

$HtNo=$_POST['HtNo'];
$Reply=$_POST['Reply'];
$QueryNo=$_POST['QueryNo'];



$servername="localhost";
$username="root";
$password="";
$database="dpe";
$con=new mysqli($servername,$username,$password,$database);

$sql="UPDATE `queries` SET `Reply`='$Reply' WHERE `Ht.No.`='$HtNo'  && `Query No.`='$QueryNo'";
$res=$con->query($sql);

header("location:reply.php");
$con->close();


?>