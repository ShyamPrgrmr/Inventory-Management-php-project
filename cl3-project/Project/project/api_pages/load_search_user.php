<?php
require "database.php";
$uid = $_POST['key'];
$sql="select uid,did,fname,lname,concat(fname,' ',lname) as name,dob,doj,mobile,state,zip,city,gender from user where uid='$uid' or fname='$uid' or lname='$uid' or did='$uid'";

$result = $conn->query($sql);
$increment=1;
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $send = $row['uid']."#".$row["did"]."$".$row["fname"]."*".$row["lname"]."!".$row["gender"]."/".$row["dob"]."{".$row["doj"]."(".$row["mobile"]."}".$row["state"]."[".$row["zip"]."|".$row["city"].")";
        
        echo '<tr>
        <td>'.$increment.'</td>
        <td>'.$row["uid"].'</td>
        <td>'.$row["did"].'</td>
        <td>'.$row["name"].'</td>
        <td>'.$row["dob"].'</td>
        <td>'.$row["doj"].'</td>
        <td>'.$row["mobile"].'</td>
        <td><button class="btn btn-sm btn-primary no-anim" name="'.$send.'" onclick="loaddata(this.name)">Load</button></td>
        </tr>';
        $increment = $increment+1;
    }
}
else{
    echo "Cannot find user...";
}

$conn->close();
?>