<?php 

    require_once("connection.php");
    $query = "select * from studentmarks";
    $result = mysqli_query($con,$query);

?>

<!doctype html>
<html>
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Student Marks-DPE</title>
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
<th>Ht.No.</th>
<th>Branch</th>
<th>Q.No.1</th>
<th>Q.No.2</th>
<th>Q.No.3</th>
<th>Q.No.4</th>
<th>Total</th>
</tr>

<?php 
                                    
while($row=mysqli_fetch_assoc($result))
{
    $HtNo = $row['Ht.No.'];
    $Branch = $row['Branch'];
    $QNo1 = $row['Q.No.1'];
    $QNo2 = $row['Q.No.2'];
    $QNo3 = $row['Q.No.3'];
    $QNo4 = $row['Q.No.4'];
    $Total = $row['Total'];
?>
<tr>
    <td><?php echo $HtNo ?></td>
    <td><?php echo $Branch ?></td>
    <td><?php echo $QNo1 ?></td>
    <td><?php echo $QNo2 ?></td>
    <td><?php echo $QNo3 ?></td>
    <td><?php echo $QNo4 ?></td>
    <td><?php echo $Total ?></td>
</tr>        
<?php 
               } 
          ?> 
  </table>

  </body>
</html>