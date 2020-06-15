<?php
require "database.php";
$sql="select a1.did,a1.uid,concat(fname,' ',lname) as name,mobile  from user as a1,dept_head as a2 where a1.did=a2.did and a1.uid=a2.uid";
$result = $conn->query($sql);
$increment=1;
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
   {
        echo "<tr>
            <td>$increment</td>
            <td>".$row['did']."</td>
            <td>".$row['uid']."</td>
            <td>".$row['name']."</td>
            <td>".$row['mobile']."</td>
        </tr>";    
    }
}
$conn->close();

?>
