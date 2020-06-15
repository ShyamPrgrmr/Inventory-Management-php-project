<?php
require "database.php";
$inid = $_POST['inid'];
$sql = "update indent_status set status=4 where inid='$inid'";
if($conn->query($sql)===TRUE){
    echo "Rejected successfully!";
}
else{
    echo "Error : "+$conn->error;
}
?>