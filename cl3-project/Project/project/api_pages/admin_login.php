<?php
require "database.php";
$uid = $_POST['uid'];
$pass= $_POST['pass'];
$sql = "select * from admin where user='$uid' and password='$pass'";
$result = $conn->query($sql);
if($result->num_rows>0)
{
    $row = $result->fetch_assoc();
    session_start();
    
    echo "1";
}
else{
    echo "0";
}
?>