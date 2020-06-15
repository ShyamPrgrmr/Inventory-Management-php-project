<?php
require "database.php";
$name = $_POST['name'];
$ware = $_POST['ware'];
$capa = $_POST['capa'];
$mate = $_POST['mate'];

$sql="select rid from rack";
$result = $conn->query($sql);
$r_id = "RA-".$result->num_rows;
echo "$r_id";

$sql="insert into rack values('$r_id','$ware','$name','$capa','$mate')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>