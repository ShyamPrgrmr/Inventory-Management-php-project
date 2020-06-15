<?php
require "database.php";
$uid = $_POST['uid'];
$pass= $_POST['pass'];
$sql = "select a1.uid,a1.password,a2.did from login_user as a1,user as a2,user_type as a3 where a3.type=0 and a3.uid=a2.uid and a3.uid=a1.uid and a1.confirm ='2' and a1.uid='$uid' and a1.password='$pass'";
$result = $conn->query($sql);
if($result->num_rows>0)
{
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION['headId'] = $uid;
    $_SESSION['headDeptId'] = $row['did'];
    echo "1";
}
else{
    echo "0";
}
?>