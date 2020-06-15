<?php
require "database.php";
$sql="select iid from item where iid not in(select id from deletehelp)";
$result = $conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        echo"<option value='".$row['iid']."'>".$row['iid']."</option>";
    }
}
else{
    echo "<option disabled>Currently no item are added</option>";
}
$conn->close();
?>