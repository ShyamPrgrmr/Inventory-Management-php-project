<?php
require "database.php";
$uid = $_POST['did'];
$sql="select uid from user where did='$uid'";
$result = $conn->query($sql);
$increment=1;
if($result->num_rows>0)
{
    echo '<option disabled>Select userid</option>';
    while($row=$result->fetch_assoc())
    {
        echo '<option value="'.$row['uid'].'">'.$row['uid'].'</option>';
    }
}
$conn->close();

?>
