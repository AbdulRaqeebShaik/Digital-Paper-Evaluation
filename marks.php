<?php
$htnum=$_POST['htnum'];
$branch=$_POST['branch'];
$num1=$_POST['num1'];
$num2=$_POST['num2'];
$num3=$_POST['num3'];
$num4=$_POST['num4'];
$sum=$_POST['sum'];


$servername="localhost";
$username="root";
$password="";
$database="dpe";
$con=new mysqli($servername,$username,$password,$database);






$sql="INSERT INTO `studentmarks` (`Ht.No.`, `Branch`, `Q.No.1`, `Q.No.2`, `Q.No.3`, `Q.No.4`, `Total`) VALUES ('$htnum', '$branch', '$num1', '$num2', '$num3', '$num4', '$sum')";
$res=$con->query($sql);


header("location: test4.php");

$con->close();


?>