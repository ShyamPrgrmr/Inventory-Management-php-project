<?php
require "database.php";
$wid=$_POST['wid'];
$sql = "select rid from rack where wid='$wid'";
$result = $conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        echo "<option value='".$row['rid']."'>".$row['rid']."</option>";
    }
}
?>