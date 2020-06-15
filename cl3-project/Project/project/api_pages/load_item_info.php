<?php
require "database.php";
$iid = $_POST['iid'];
$sql="select * from item where iid='$iid'";
$result = $conn->query($sql);
$increment=1;
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $send = $row['iid']."#".$row["i_name"]."$".$row["i_desc"]."*".$row["i_manu"]."!".$row["i_dom"]."/".$row["i_doe"]."{".$row["i_state"]."}".$row["i_hazard"]."]";
        echo "$send";
    }
}
else{
    echo "<tr rowspan='6'><td><b>Currently no item are added</b><td></tr>";
}
$conn->close();
?>