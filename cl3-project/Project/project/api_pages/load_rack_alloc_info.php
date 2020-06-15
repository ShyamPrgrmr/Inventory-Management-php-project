<?php
    require "database.php";
    $wid = $_POST['rid'];
    $sql = "select r_name,r_capacity from rack where rid='$wid'";
    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
        echo "{".$row['r_name']."}"."[".$row['r_capacity']."]";
        }
    }
?>