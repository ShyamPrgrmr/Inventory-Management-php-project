<?php
require "database.php";
$sql="select * from ware_allocation";
$result = $conn->query($sql);
$increment=1;
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
   {
        echo "<tr>
            <td>$increment</td>
            <td>".$row['aid']."</td>
            <td>".$row['wid']."</td>
            <td>".$row['rid']."</td>
            <td>".$row['iid']."</td>
            <td>".$row['qty']." Kg.</td>
        </tr>";    
        $increment++;
    }
}
$conn->close();

?>
