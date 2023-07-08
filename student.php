<?php
session_start();
if (isset($_SESSION['uname']) && isset($_SESSION['pwd'])) {
  $uname = $_SESSION['uname'];
  $pwd = $_SESSION['pwd'];


}

require_once("connection.php");
$query = "SELECT * FROM `studentmarks` WHERE `Ht.No.` = '$uname'";
$result = mysqli_query($con,$query);
$query2="SELECT * FROM `queries` WHERE `Ht.No.` = '$uname'";
$result2 = mysqli_query($con,$query2);
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Student-DPE</title>
  
  <script>
    var logoutTimeout;

    function resetLogoutTimer() {
      clearTimeout(logoutTimeout);
      logoutTimeout = setTimeout(logout, 120000); // 2 minutes in milliseconds
    }

    function logout() {
      document.location.href = "index.html";
      alert("You have been automatically logged out due to inactivity.");
    }

    function logout1() {
      document.location.href = "index.html";
      alert("You have successfully logged out.");
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

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
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
<h1>Marks :</h1>
  <table>
    <tr>
      <th>Hall Ticket No.</th>
      <th>Branch</th>
      <th>Q.No.1</th>
      <th>Q.No.2</th>
      <th>Q.No.3</th>
      <th>Q.No.4</th>
      <th>Total</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) {
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
    <?php } ?>
  </table>

  <br>
<h2>Queries & Replies :</h2>
<table>
    <tr>
      <th>Ht.No.</th>
      <th>Query</th>
      <th>Query No.</th>
      <th>Reply</th>
      </tr>

    <?php while ($row = mysqli_fetch_assoc($result2)) {
      $HtNo = $row['Ht.No.'];
      $Query = $row['Query'];
      $QueryNo = $row['Query No.'];
      $Reply = $row['Reply'];

    ?>
      <tr>
        <td><?php echo $HtNo ?></td>
        <td><?php echo $Query ?></td>
        <td><?php echo $QueryNo ?></td>
        <td><?php echo $Reply ?></td>

      </tr>
    <?php } ?>
  </table>

<br>

  <div class="text-center">
    <button class="btn btn-primary float-none" style="margin-bottom: 10px;" onclick="loadPDF('<?php echo $uname; ?>')">
      Show Answer Script
    </button>
  </div>
<div>
<div class="text-center">
  <div id="contentContainer" class="container hidden">
    <div class="container ">
      <br>
      <iframe src="ex.pdf" style="height: 500px; width: 900px; border: 2px solid blue;" id="Iframe"></iframe>
    </div>
    <br><br>

    <div id="queryContainer" class="container border pt-5 mt-5 ">
      <style>
        .hidden {
          display: none;
        }
      </style>

      <form action="query.php" method="post">
        <h1 class="h3 mb-3 fw-normal"><b>Queries:</b></h1>
      <p><b>Query No.:</b></p>
      <input type="text" class="form-control" name="QueryNo">
      <br>
      <p><b>Query:</b></p>
        <input type="text" class="form-control" placeholder="Ex: why did I score 2 marks for Q.No.2?" name="query"><br>
        <button type="submit" action="query.php" class="btn btn-outline-primary" onclick="add()">Submit</button>
<br>
      </form>
    </div>
  </div>

  <script>
    function loadPDF(htno) {
      var contentContainer = document.getElementById("contentContainer");
      contentContainer.classList.remove("hidden"); // Show the content container

      var iframe = document.getElementById("Iframe");
      iframe.src = htno + ".pdf" + "#toolbar=0";
      document.getElementById("htnum").value = htno;

      var queryContainer = document.getElementById("queryContainer");
      queryContainer.classList.remove("hidden"); // Show the query container
    }

    function add() {
      alert("Query submitted successfully.");
      document.location.href = "test4.php";
    }
  </script>

<br><br>
</body>
</html>
