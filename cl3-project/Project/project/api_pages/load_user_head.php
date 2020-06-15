<?php
require "database.php";
$uid = $_POST['did'];
$sql="select a1.uid,concat(fname,' ',lname) as name from dept_head as a1,user as a2 where a1.did='$uid' and a1.uid=a2.uid";
$result = $conn->query($sql);

if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        echo $row['uid']." ".$row['name'];
    }
}

$conn->close();
?>
