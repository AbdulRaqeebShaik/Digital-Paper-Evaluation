<?php 

    require_once("connection.php");
    $query = "select * from studentdetails";
    $result = mysqli_query($con,$query);

?>

<!doctype html>
<html>
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Student details-DPE</title>
  <script>
    var logoutTimeout;

    function resetLogoutTimer() {
      clearTimeout(logoutTimeout);
      logoutTimeout = setTimeout(logout, 120000); // 2 minutes in milliseconds
    }

    function logout() {
      // Perform the logout operations here, such as clearing session data or redirecting to a login page.
      // For this example, we will simply display an alert message.
	document.location.href =  "index.html";

      alert("You have been automatically logged out due to inactivity.");
      // You can replace the alert above with the actual logout logic you want to execute.
    }

    document.addEventListener("mousemove", resetLogoutTimer);
    document.addEventListener("keydown", resetLogoutTimer);
    document.addEventListener("click", resetLogoutTimer);
  </script>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
  </head>
  <body>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    resetLogoutTimer(); // Start the initial timer
  </script>
<div class="text-center">
  <img src="logo.png" class="rounded" alt="...">
</div>

<table>
<tr>
<th>Hall Ticket No.</th>
<th>Name</th>
<th>Year</th>
<th>Sem</th>
<th>Branch</th>

</tr>

<?php 
                                    
while($row=mysqli_fetch_assoc($result))
{

$HtNo=$row['Ht.No.'];
$Name=$row['Name'];
$Year=$row['Year'];
$Sem=$row['Sem'];
$Branch=$row['Branch'];
?>
<tr>
    <td><?php echo $HtNo ?></td>
    <td><?php echo $Name ?></td>
    <td><?php echo $Year ?></td>
    <td><?php echo $Sem ?></td>
    <td><?php echo $Branch ?></td>

   
</tr>        
<?php 
               } 
          ?> 
  </table>

  </body>
</html>