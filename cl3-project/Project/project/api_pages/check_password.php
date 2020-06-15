<?php
require "database.php";
$userid = $_POST['uid'];
$password = $_POST['password'];
$sql = "select count(uid) as couid from login_user where uid ='$userid' and password='$password' and confirm=1";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
if($row['couid']==1)
    echo "1";
else
    echo "2";
?>