<?php
require "database.php";
session_start();
$uid  = $_SESSION['userId'];
$did  = $_SESSION['deptId'];
$qty  = $_POST['qty'];
$iid  = $_POST['iid'];
$reason = $_POST['reason'];

$sql="select inid from indent";
$result = $conn->query($sql);
$in_id = "INDENT-".$result->num_rows;

$sql="insert into indent values('$in_id','$iid','$uid','$did','$qty')";
if ($conn->query($sql) === TRUE) {
    echo "New indent is raised";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql="insert into indent_helper values('$in_id',CURRENT_DATE(),DATE_ADD(CURRENT_DATE(),interval 15 day))";
if ($conn->query($sql) === TRUE) {
    echo "New indent is raised";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql="insert into indent_status values('$in_id','0')";
if ($conn->query($sql) === TRUE) {
    echo "New indent is raised";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql="insert into indent_reason values('$in_id','$reason')";
if ($conn->query($sql) === TRUE) {
    echo "New indent is raised";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>