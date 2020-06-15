<?php
require "database.php";
$uid    = $_POST['uid']; 
$did    = $_POST['did'];
$fname  = $_POST['fname'];
$lname  = $_POST['lname'];
$gender = $_POST['gender'];
$dept   = $_POST['dept'];
$mobile = $_POST['mobile'];
$dob    = $_POST['dob'];
$doj    = $_POST['doj'];
$city   = $_POST['city'];
$state  = $_POST['state'];
$zip    = $_POST['zip'];

$sql="update user set did='$dept',fname='$fname',lname='$lname',gender='$gender',dob='$dob',doj='$doj',mobile='$mobile',city='$city',state='$state',zip='$zip' where uid='$uid'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>