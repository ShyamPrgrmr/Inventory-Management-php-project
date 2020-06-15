<?php
require "database.php";
session_start();
$uid = $_SESSION['userId'];
$did = $_SESSION['deptId'];

$sql = "select concat(fname,' ',lname) as n from user where uid='$uid'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

$sql1 ="select d_name from department where did='$did'";
$result1=$conn->query($sql1);
$row1=$result1->fetch_assoc();

echo $row['n']."#".$row1['d_name']."*";
?>