<?php
// Establish a connection to MySQL
$conn = mysqli_connect("localhost", "root", "", "dpe");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the table
$sql = "SELECT `Ht.No.` FROM studentdetails";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Store the fetched data in a PHP variable
$buttons = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Close the MySQL connection
mysqli_close($conn);
?>

<!doctype html>
<html> 
<head>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>DPE-Member</title>
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
    function logout1() {
      // Perform the logout operations here, such as clearing session data or redirecting to a login page.
      // For this example, we will simply display an alert message.
	document.location.href =  "index.html";
      alert("You have succesfully logged out.");
      // You can replace the alert above with the actual logout logic you want to execute.
    }

    document.addEventListener("mousemove", resetLogoutTimer);
    document.addEventListener("keydown", resetLogoutTimer);
    document.addEventListener("click", resetLogoutTimer);
  </script>

  </head>
  <body>
<script>
    resetLogoutTimer(); // Start the initial timer
  </script>
<button onclick="logout1()" class="btn btn-outline-primary float-end">LogOut</button>
<div class="text-center">
  <img src="logo.png" class="rounded" alt="...">
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<div class="parent-container d-flex">
<div class="container float-sm-left" style="width:50%">
        <div class="row">
            <div class="col">
                <div class="container">
<br>



                    <!-- Dynamic Buttons-->
                    <?php foreach ($buttons as $button): ?>
                        <div>
                            <button class="btn btn-primary" style="margin-bottom: 10px;"
                                    onclick="loadPDF('<?php echo $button['Ht.No.']; ?>')">
                                <?php echo $button['Ht.No.']; ?>
                            </button>
                        </div>
                    <?php endforeach; ?>
                    <!--  -->

                    <script>
                        function loadPDF(htno) {
                            var iframe = document.getElementById("Iframe");
                            iframe.src = htno + ".pdf"+"#toolbar=0";
                            document.getElementById("htnum").value = htno;
                        }
                    </script>
</script>


</div>  

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container">

<br>
                    <iframe src="ex.pdf" style="height:500px;width:900px;border:2px solid blue;" id="Iframe"></iframe>
</div>  

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">

                    <form method="post" action="marks.php">
                        <br>&emsp;&emsp;Ht.No.:<input type="text" id="htnum" name="htnum"><br>
                        <br>&emsp;&emsp;Branch.:<input type="text" id="branch" name="branch" value="CSM"><br>
                        <h2>Q.No. &emsp;&emsp; Marks</h2>
                        &emsp;&emsp;<b>1:</b> &emsp;&emsp;&emsp;&emsp; <input type="text" id="m1" name="num1"><br>
                        &emsp;&emsp;<b>2:</b> &emsp;&emsp;&emsp;&emsp; <input type="text" id="m2" name="num2"><br>
                        &emsp;&emsp;<b>3:</b> &emsp;&emsp;&emsp;&emsp; <input type="text" id="m3" name="num3"><br>
                        &emsp;&emsp;<b>4:</b> &emsp;&emsp;&emsp;&emsp; <input type="text" id="m4" name="num4"><br><br>
                        &emsp;<input type="button" value="Total" onclick="calcSum()"> &emsp;&emsp;&emsp; <input type="text"
                                                                                                                 id="tot"
                                                                                                                 name="sum"><br><br>
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button type="submit" action="marks.php" onclick="add()"
                                                                            class="btn btn-outline-primary">Submit
                        </button>
                    </form>
<br><br><br><br>
<div class="text-center">
    <button class="btn btn-primary float-none" style="margin-bottom: 10px;" onclick="showQueries()">
      Show Queries
    </button>
  </div>
<script>
  function showQueries() {
    window.open('reply.php', '_blank');
  }
</script>
<script>
function add(){
alert("Marks submitted successfully.");
	document.location.href =  "test4.php";
}
</script>
                    <script>
                        function calcSum() {
                            let num1 = document.getElementsByName("num1")[0].value;
                            let num2 = document.getElementsByName("num2")[0].value;
                            let num3 = document.getElementsByName("num3")[0].value;
                            let num4 = document.getElementsByName("num4")[0].value;
                            let largest = -Infinity;
                            let secondLargest = -Infinity;

                            // Find the largest number
                            if (num1 > largest) {
                                secondLargest = largest;
                                largest = num1;
                            } else if (num1 > secondLargest) {
                                secondLargest = num1;
                            }

                            if (num2 > largest) {
                                secondLargest = largest;
                                largest = num2;
                            } else if (num2 > secondLargest) {
                                secondLargest = num2;
                            }

                            if (num3 > largest) {
                                secondLargest = largest;
                                largest = num3;
                            } else if (num3 > secondLargest) {
                                secondLargest = num3;
                            }

                            if (num4 > largest) {
                                secondLargest = largest;
                                largest = num4;
                            } else if (num4 > secondLargest) {
                                secondLargest = num4;
                            }

                            let sum = Number(largest) + Number(secondLargest);
                            document.getElementsByName("sum")[0].value = sum;
                        }
                    </script>


            </div>
        </div>
    </div>
</div>





  </body>
</html>