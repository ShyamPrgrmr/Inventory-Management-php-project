<?php
require "database.php";
$wareid = $_POST["wid"];
$sql="select * from rack where wid='".$wareid."'";
$result = $conn->query($sql);
$increment=1;
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $send = $row['rid']."#".$row["wid"]."$".$row["r_name"]."*".$row["r_capacity"]."!".$row["r_material"]."/";
        echo '<tr>
        <td>'.$increment.'</td>
        <td>'.$row["rid"].'</td>
        <td>'.$row["wid"].'</td>
        <td>'.$row["r_name"].'</td>
        <td>'.$row["r_capacity"].'</td>
        <td>'.$row["r_material"].'</td>
        <td><button class="btn btn-sm btn-primary no-anim" name="'.$send.'" onclick="loadrackdata(this.name)">Load</button></td>
        </tr>';
        $increment = $increment+1;
    }
}
else{
    echo "Currently racks are not added";
}

$conn->close();
?>