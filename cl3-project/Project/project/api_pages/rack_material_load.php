<?php
require "database.php";

$wid = $_POST['wid'];

$sql="select w_material from warehouse where wid='".$wid."'";
$result = $conn->query($sql);
$increment=1;
if($result->num_rows>0)
{
    echo '<option disabled>Select material</option>';
    $row=$result->fetch_assoc();
    if($row["w_material"]=='all')
    {
        echo '<option value="solid">Solid</option>';
        echo '<option value="liquid">Liquid</option>';
        echo '<option value="gas">Gas</option>';
    }
    else{
        echo '<option>'.$row['w_material'].'</option>';
    }
}
$conn->close();
?>