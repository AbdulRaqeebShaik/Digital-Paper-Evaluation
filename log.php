<?php
session_start();
$uname=$_POST['uname'];
$pwd=$_POST['pwd'];
$role=$_POST['role'];



$servername="localhost";
$username="root";
$password="";
$database="dpe";
$con=new mysqli($servername,$username,$password,$database);

$sql="select * from users";
$res=$con->query($sql);


if (empty($uname)) {

         echo '<script>alert("User Id is required"); window.location.href = "index.html";</script>';

        exit();

    }else if(empty($pwd)){

        echo '<script>alert("Password is required"); window.location.href = "index.html";</script>';

        exit();
 }else if($role!="member" && $role!="admin" && $role!="student"){

         echo '<script>alert("Role is required"); window.location.href = "index.html";</script>';

        exit();



    }else{

        $sql="select userid,pwd,role from users";
        $sql2="select * from studentmarks";
$res=$con->query($sql);
$res2=$con->query($sql2);
if ($res->num_rows != 0) {
while ($row = $res->fetch_assoc()) {
if ($uname == $row['userid']) {
if ($pwd == $row['pwd']) {
if ($role == 'admin') {
header("Location: admin.html");
}else if($role == 'member'){
header("Location: test4.php");
exit();

}
}
}
}
}

$_SESSION['uname'] = $uname;
$_SESSION['pwd'] = $pwd;
if ($res2->num_rows != 0) {
while ($row = $res2->fetch_assoc()) {
if ($uname == $row['Ht.No.']) {
header("Location: student.php");
exit();
}
}
}


}
?>