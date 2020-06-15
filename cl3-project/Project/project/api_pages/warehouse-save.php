<?php
require "database.php";
$name = $_POST['name'];
$loca = $_POST['loca'];
$mate = $_POST['mate'];
$sql="select wid from warehouse";
$result = $conn->query($sql);
$w_id = "WARE-".$result->num_rows;
echo "$w_id";

$sql="insert into warehouse values('$w_id','$name','$loca','$mate')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>