<?php
require "database.php";
$inid =  $_POST['inid'];
$sql = "update indent_status set status=-1 where inid='$inid'";
if($conn->query($sql)===TRUE)
{
    echo "deleted";
}
else{
    echo $conn->error;
}
$conn->close();
?>