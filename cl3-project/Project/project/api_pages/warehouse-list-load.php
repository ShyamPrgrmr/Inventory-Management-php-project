<?php
require "database.php";

$sql1 = "select * from warehouse";
$result1 = $conn->query($sql1);
$in = 1;
if($result1->num_rows>0)
{
    while($row1=$result1->fetch_assoc())
    {
        $id = $row1['wid'];
        $capacity = 0;
        $number = 0;
        $sql2 = 'select r_capacity from rack where wid="'.$id.'"';
        if($result2 = $conn->query($sql2)){
            while($row2=$result2->fetch_assoc())
            {
                $capacity = $capacity+$row2["r_capacity"];
                $number = $number+1;
            }
        }

        $send = $row1["wid"]."!".$row1["w_name"].":".$row1["w_location"]."/".$capacity."@".$row["w_material"]."}";
        echo '<tr>
        <td>'.$in.'</td>
        <td>'.$id.'</td>
        <td>'.$row1["w_name"].'</td>
        <td>'.$capacity.'</td>
        <td>'.$number.'</td>
        <td>'.$row1["w_material"].'</td>
        <td><button class="btn btn-primary btn-sm no-anim" name="'.$send.'" onclick="load_warehouse(this.name)">Load</button></td>
        </tr>        
        ';

        $in=$in+1;
    }
}

?>