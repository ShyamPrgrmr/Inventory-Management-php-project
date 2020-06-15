<?php
require "database.php";

$did = $_POST['did'];
$uid = $_POST['uid'];

$sql="update dept_head set uid='$uid' where did='$did'";
if ($conn->query($sql) === TRUE) {
    echo "record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql="update user_type set type=0 where uid='$uid'";
if ($conn->query($sql) === TRUE) {
    echo "record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>