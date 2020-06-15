<?php
require "database.php";

$id      = $_POST['iid'];
$name    = $_POST['name'];
$state   = $_POST['state'];
$man     = $_POST['manu'];
$dom     = $_POST['dom'];
$doe     = $_POST['doe'];
$desc    = $_POST['desc'];
$hazard  = $_POST['haz'];

$sql="update item set i_name='$name',i_desc='$desc',i_manu='$man',i_dom='$dom',i_doe='$doe',i_state='$state',i_hazard='$hazard' where iid='$id'";
if ($conn->query($sql) === TRUE) {
    echo "record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>