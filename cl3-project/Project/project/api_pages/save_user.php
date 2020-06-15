<?php
require "database.php";
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

$sql="select uid from user";
$result = $conn->query($sql);
$user_id = "USER-".$result->num_rows;
echo "$user_id";

$sql="insert into user values('$user_id','$dept','$fname','$lname','$gender','$dob','$doj','$mobile','$city','$state','$zip')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql="insert into login_user values('$user_id','$user_id','1')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql="insert into user_type values('$user_id',1)";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>