<?php
require "database.php";
$did = $_POST['did'];
$sql = "delete from department where did='".$did."'";

if ($conn->query($sql) === TRUE) {
    echo "deleted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>