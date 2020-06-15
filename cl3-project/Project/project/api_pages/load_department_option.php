<?php
require "database.php";
$sql="select did from department";
$result = $conn->query($sql);
$increment=1;
if($result->num_rows>0)
{
    echo '<option disabled>Select Department</option>';
    while($row=$result->fetch_assoc())
    {
        echo '<option value="'.$row['did'].'">'.$row['did'].'</option>';
    }
}
$conn->close();

?>
