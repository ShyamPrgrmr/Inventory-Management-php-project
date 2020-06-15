<?php
require "database.php";
$sql="select * from department";
$result = $conn->query($sql);
$increment=1;
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $send = $row['did']."#".$row["d_name"]."$".$row["d_type"]."*".$row["d_number"]."!";
        echo '<tr>
        <td>'.$increment.'</td>
        <td>'.$row["did"].'</td>
        <td>'.$row["d_name"].'</td>
        <td>'.$row["d_type"].'</td>
        <td>'.$row["d_number"].'</td>
        <td><button class="btn btn-sm btn-primary no-anim" name="'.$send.'" onclick="loaddata(this.name)">Load</button></td>
        </tr>';
        $increment = $increment+1;
    }
}

$conn->close();
?>