<?php
require "database.php";
session_start();
$userid = $_SESSION['headId'];
$headdeptid = $_SESSION['headDeptId'];

$inid = $_POST['inid'];
$sql="select a4.inid,a2.uid,concat(a2.fname,' ',a2.lname) as name,a4.iid,a1.i_name,a4.qty,a1.i_hazard,a1.i_desc,a6.reason from item as a1,user as a2,dept_head as a3,indent as a4,indent_helper as a5,indent_reason as a6,indent_status as a7 where a4.inid=a5.inid and a4.inid='$inid' and a4.inid=a6.inid and a4.inid=a7.inid and a4.iid=a1.iid and a3.uid='$userid' and a4.uid=a2.uid;";
$result = $conn->query($sql);
$increment = 1;
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        echo "(".$row['inid'].")".$row['uid']."{".$row['name']."}".$row['iid']."[".$row['i_name']."]".$row["qty"]."!".$row['i_hazard']."@".$row["i_desc"]."|".$row["reason"]."*".$userid."+".$headdeptid."=";
        $increment++;
    }
}
else{
    echo "no data";
}

?>