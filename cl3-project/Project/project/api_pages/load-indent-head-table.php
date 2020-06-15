<?php
require "database.php";
session_start();
$dept = $_SESSION['headDeptId'];
$sql = "select a1.inid,a1.uid,concat(a6.fname,' ',a6.lname) as name,a1.iid,a2.i_name,a2.i_desc,a1.qty,a3.reason,a5.r_date from indent as a1,item as a2,indent_reason as a3,indent_status as a4,indent_helper as a5,user as a6 where a1.iid = a2.iid and a1.uid=a6.uid and a1.did='$dept' and a1.inid=a3.inid and a1.inid=a4.inid and a1.inid=a5.inid and a4.status=0";

$result=$conn->query($sql);
$increment=1;
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        echo '<tr>
        <td>'.$increment.'</td>
        <td>'.$row["inid"].'</td>
        <td>'.$row["r_date"].'</td>
        <td>'.$row["uid"].'</td>
        <td>'.$row["name"].'</td>
        <td>'.$row["iid"].'</td>
        <td>'.$row["i_name"].'</td>
        <td>'.$row["i_desc"].'</td>
        <td>'.$row["qty"].' Kg.</td>
        <td>'.$row["reason"].'</td>
        <td colspan="2">
        <div class="btn-gr" style="margin:0px;padding:0px">
            <button name="'.$row["inid"].'" class="btn btn-primary no-anim btn-sm" onclick="accept_indent(this.name)">Accept</button>
            <button name="'.$row["inid"].'" class="btn btn-danger no-anim btn-sm" onclick="reject_indent(this.name)">Reject</button>
            <button name="'.$row["inid"].'" class="btn btn-secondary no-anim btn-sm" id="view_btn" onclick="open_model(this.name);">View</button>
        </div>
        </td>
        </tr>';
        $increment = $increment+1;
    }
}
else{
    echo "<tr><td colspan='11'>No indents</td></tr>";
}
?>

