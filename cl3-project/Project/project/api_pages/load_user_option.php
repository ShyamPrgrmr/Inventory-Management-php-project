<?php
require "database.php";
$sql="select uid,concat(fname,' ',lname) as name from user";
$result = $conn->query($sql);
$increment=1;
if($result->num_rows>0)
{
    echo '<option disabled>Select Userid</option>';
    while($row=$result->fetch_assoc())
    {
        echo '<option value="'.$row['uid'].'">'.$row['uid']." ".$row['name'].'</option>';
    }
}
$conn->close();

?>
