<?php
require "database.php";
session_start();
$uid = $_SESSION['userId'];

$sql="select * from indent as i1,indent_helper as i2,indent_status as i3,indent_reason as i4 where  i1.uid='$uid' and i1.inid=i2.inid and i1.inid=i4.inid and i1.inid=i3.inid and i3.status <> -1;";

$result = $conn->query($sql);
$increment=1;
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {        
        $info = $row['inid']."!".$row['qty']."/".$row['iid']."|".$row['reason']."?";
        echo '<tr>
        <td>'.$increment.'</td>
        <td>'.$row["inid"].'</td>
        <td>'.$row["iid"].'</td>
        <td>'.$row["r_date"].'</td>
        <td>'.$row["e_date"].'</td>
        <td>'.$row["qty"].'</td>';

        $status = $row["status"];
        $st ='0';
        if($status=='0')
            $st = 'Raised';
        else if($status=='1')
            $st = 'Accepted by head';
        else if($status=='2')
            $st = 'Accepted by admin';
        else if($status=='3')
            $st = 'issued';
        else if($status=='4')
            $st = 'Rejected by head';
        else if($status=='5')
            $st = 'Rejected by admin';
        else 
            $st= 'Returned'; 
        
        echo '<td>'.$st.'</td>
        <td><button class="btn btn-sm btn-primary no-anim" name="'.$info.'" onclick="loaditemdataonload(this.name)">Load</button></td>
        </tr>';
        $increment = $increment+1;
    }
}
else{
    echo "<tr rowspan='6'><td><b>Currently no item are added</b><td></tr>";
}
$conn->close();
?>