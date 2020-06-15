<?php
require "database.php";
$inid = $_POST['inid'];
$sql = "update indent_status set status=5 where inid='$inid'";
if($conn->query($sql)===TRUE){
    echo "Successfully accepted!";
}
else{
    echo "Error : "+$conn->error;
}
?>