<?php 

    require_once("connection.php");
    $query = "select * from queries";
    $result = mysqli_query($con,$query);

?>

<!doctype html>
<html>
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Query Reply-DPE</title>
<script>
function add(){
alert("Successfully replied to the query.");
	document.location.href =  "reply.php";
}
</script>

  <script>
    var logoutTimeout;

    function resetLogoutTimer() {
      clearTimeout(logoutTimeout);
      logoutTimeout = setTimeout(logout, 120000); // 2 minutes in milliseconds
    }

    function logout() {
	document.location.href =  "index.html";

      alert("You have been automatically logged out due to inactivity.");
    }
 function logout1() {
	document.location.href =  "index.html";
      alert("You have succesfully logged out.");
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
<button onclick="logout1()" class="btn btn-outline-primary float-end">LogOut</button>

 <div class="text-center">
  <img src="logo.png" class="rounded" alt="...">
</div>

<table>
<tr>
<th>Ht.No.</th>
<th>Query No.</th>
<th>Query</th>

<th>Reply</th>

</tr>

<?php 
                                    
while($row=mysqli_fetch_assoc($result))
{
    $HtNo = $row['Ht.No.'];
    $QueryNo = $row['Query No.'];
    $Query = $row['Query'];

    $Reply = $row['Reply'];
    
?>
<tr>
    <td><?php echo $HtNo ?></td>
    <td><?php echo $QueryNo ?></td>
    <td><?php echo $Query ?></td>

    <td><?php echo $Reply ?></td>
  
   
</tr>        
<?php 
               } 
          ?> 
  </table>
<style>
  .small-container {
    max-width: 500px; 
  }

  .form-control {
    width: 200%;
  }
</style>

<div class="container border pt-5 mt-5 small-container">
  <div class="d-flex justify-content-left">
    <form method="POST" action="replyaction.php">
      <p><b>Hall Ticket No:</b></p>
      <input type="text" class="form-control" name="HtNo">
      <br>
	<p><b>Query No:</b></p>
      <input type="text" class="form-control" name="QueryNo">
      <br>
      <p><b>Reply:</b></p>
      <input type="text" class="form-control" name="Reply">
      <br>
      <input type="submit" value="Submit" >
      &emsp;<input type="reset" name="clear">
      <br><br>
    </form>
  </div>
</div>


<br>



  </body>
</html>