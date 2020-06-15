<?php
require "database.php";
$id   = $_POST['id'];
$pass = $_POST['pass'];

$sql="select count(a1.uid) as co from login_user as a1,user_type as a2 where a1.uid='$id' and password='$pass' and confirm=2 and a2.uid=a1.uid and a2.type=1";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
if($row['co']==1)
{
    $sql="select did from user where uid='$id'";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    $did = $row['did'];
    session_start();
    $_SESSION['deptId'] = $did;
    $_SESSION['userId'] = $id;
    echo "1";
}


?>