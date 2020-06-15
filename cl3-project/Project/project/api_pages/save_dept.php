<?php
require "database.php";
$name = $_POST['dept_name'];
$type = $_POST['dept_type'];
$numb = $_POST['dept_number'];
$uid  = "Not added";

$sql="select did from department";
$result = $conn->query($sql);
$dept_id = "DEPT - ".$result->num_rows;
$sql="insert into department values('$dept_id','$name','$type','$numb')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "insert into dept_head values('$dept_id','$uid')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>