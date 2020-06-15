<?php
require "database.php";
$sql="select wid from warehouse where wid in (select wid from rack)";
$result = $conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        echo"<option value='".$row['wid']."'>".$row['wid']."</option>";
    }
}
else{
    echo "<option disabled>Currently no item are added</option>";
}
$conn->close();
?>