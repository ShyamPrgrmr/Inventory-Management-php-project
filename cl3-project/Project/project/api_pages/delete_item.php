<?php
require "database.php";
$id = $_POST['iid'];

$sql="insert into deletehelp values('$id')";
if ($conn->query($sql) === TRUE) {
    echo "Deleted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>