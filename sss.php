<?php

$conn =new mysqli("localhost", "root", "", "dpe");


$sql = "SELECT * FROM userdetails";
$result = $conn->query($sql);
if($result==TRUE)
{
if ($result->num_rows >0) 
{
while(($row = $result->fetch_assoc())==TRUE)
{
echo $row['FirstName'];
}
}
}
$conn->close();
?>