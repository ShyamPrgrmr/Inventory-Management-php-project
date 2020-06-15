<?php
require "database.php";
$wid  = $_POST['wid'];
$rid  = $_POST['rid'];
$iid  = $_POST['iid'];
$qty  = $_POST['qty'];
$sql="select aid from ware_allocation";
$result = $conn->query($sql);
$waid = "WA-".$result->num_rows;
$sql="insert into ware_allocation values('$waid','$wid','$rid','$iid','$qty')";
if ($conn->query($sql) === TRUE) {
    echo "Allocated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "select sum(qty) as qty_sum from allocation_helper where iid='$iid'";
$result = $conn->query($sql);

if($result->num_rows>0)
{       
        while($row=$result->fetch_assoc()){
            $sum =$row['qty_sum']+$qty;
            $sql1="update allocation_helper set qty='$sum' where iid='$iid'";
            if ($conn->query($sql1) === TRUE) {
            } else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
            }
        }
}



$conn->close();


?>