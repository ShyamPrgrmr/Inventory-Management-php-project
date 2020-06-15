<?php
require "database.php";

$name    = $_POST['name'];
$state   = $_POST['state'];
$man     = $_POST['manu'];
$dom     = $_POST['dom'];
$doe     = $_POST['doe'];
$desc    = $_POST['desc'];
$hazard  = $_POST['haz'];

$sql="select iid from item";
$result = $conn->query($sql);
$item_id = "Item-".$result->num_rows;
echo "$item_id";

$sql="insert into item values('$item_id','$name','$desc','$man','$dom','$doe','$state','$hazard')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql="insert into allocation_helper values('$item_id','0')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


?>