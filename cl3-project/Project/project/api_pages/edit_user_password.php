<?php

require "database.php";
$did = $_POST['uid'];
$name = $_POST['pass'];

$sql = "update login_user set uid='".$did."',password='".$name."',confirm=2 where uid='".$did."'";

if ($conn->query($sql) === TRUE) {
    echo "1";
} else {
    echo "2";
}

$conn->close();
?>