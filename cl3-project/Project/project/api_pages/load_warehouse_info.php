<?php
    require "database.php";
    $wid = $_POST['wid'];
    $sql = "select a1.w_name as name,sum(a2.r_capacity) as capa from warehouse as a1,rack as a2 where a1.wid='$wid' and a2.wid='$wid'";
    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
        echo "{".$row['name']."}"."[".$row['capa']."]";
        }
    }
?>