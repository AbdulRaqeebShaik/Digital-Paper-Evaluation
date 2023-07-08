<?php
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$role = $_POST['role'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "dpe";
$con = new mysqli($servername, $username, $password, $database);

if (empty($uname)) {
    echo '<script>alert("User Id is required"); window.location.href = "index.html";</script>';
    exit();
} elseif (empty($pwd)) {
    echo '<script>alert("Password is required"); window.location.href = "index.html";</script>';
    exit();
} elseif ($role != "member" && $role != "admin") {
    echo '<script>alert("Role is required"); window.location.href = "index.html";</script>';
    exit();
} 
$sql = "SELECT userid, pwd, role FROM users";
$res = $con->query($sql);

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if ($uname == $row['userid'] && $pwd == $row['pwd'] && $role == $row['role']) {
            header("Location: $role.html");
            exit();
        } else {
            echo '<script>alert("Incorrect Credentials!!!"); window.location.href = "index.html";</script>';
            exit();
        }
    } else {
        echo '<script>alert("Incorrect Credentials!!!"); window.location.href = "index.html";</script>';
        exit();
    
}
?>
