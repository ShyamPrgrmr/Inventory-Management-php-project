<?php
require "database.php";
$sql="select * from warehouse";
$result = $conn->query($sql);
$increment=1;
if($result->num_rows>0)
{
    echo '<option disabled>Select Warehouse</option>';
    echo '<option> </option>';
    while($row=$result->fetch_assoc())
    {
        echo '<option value="'.$row['wid'].'">'.$row['wid'].'</option>';
    }
}

$conn->close();

?>
