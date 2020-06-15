<?php
require "database.php";
$did = $_POST['did'];
$name = $_POST['name'];
$type = $_POST['type'];
$num = $_POST['num'];
$sql = "update department set d_name='".$name."',d_type='".$type."',d_number='".$num."' where did='".$did."'";

if ($conn->query($sql) === TRUE) {
    echo "updated";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>