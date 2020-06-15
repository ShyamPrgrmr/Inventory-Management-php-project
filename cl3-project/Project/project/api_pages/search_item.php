<?php
require "database.php";
$key = $_POST['searchkey'].'%';

$sql="select * from item where iid not in(select id from deletehelp) and iid like '$key' or i_name like '$key'";
$result = $conn->query($sql);
$increment=1;
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $send = $row['iid']."#".$row["i_name"]."$".$row["i_desc"]."*".$row["i_manu"]."!".$row["i_dom"]."/".$row["i_doe"]."{".$row["i_state"]."}".$row["i_hazard"]."]";
        echo '<tr>
        <td>'.$increment.'</td>
        <td>'.$row["iid"].'</td>
        <td>'.$row["i_name"].'</td>
        <td>'.$row["i_dom"].'</td>
        <td>'.$row["i_doe"].'</td>
        <td>'.$row["i_state"].'</td>
        <td><button class="btn btn-sm btn-primary no-anim" name="'.$send.'" onclick="loaditemdata(this.name)">Load</button></td>
        </tr>';
        $increment = $increment+1;
    }
}
else{
    echo "<tr rowspan='6'><td><b>Currently no item are added</b><td></tr>";
}
$conn->close();
?>