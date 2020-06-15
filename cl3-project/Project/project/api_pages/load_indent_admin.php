<?php
require "database.php";
$sql = "select a1.inid,a1.uid,a1.did,a3.d_name,
a1.iid,a7.i_name,a7.i_desc,a7.i_manu,a7.i_state,a7.i_hazard,a1.qty,a6.r_date as date,
a4.uid as head_id,a5.qty as d,concat(a2.fname,' ',a2.lname) as uname,a8.head_name,a5.qty as avl_stock,
a9.reason from indent as a1,user as a2,department as a3,dept_head as a4,allocation_helper as a5,
indent_helper as a6,item as a7,(select concat(user.fname,' ',user.lname) as head_name,
user.uid from user,dept_head where user.uid=dept_head.uid and dept_head.uid<>'U') as a8,
indent_reason as a9,indent_status as a10 where a1.inid=a6.inid and a1.iid= a7.iid and a4.did=a1.did and 
a4.uid <>'U' and a5.iid=a1.iid and a2.uid=a1.uid and a10.status=1 and a10.inid=a1.inid
and a3.did=a1.did and a8.uid=a4.uid and a1.inid=a9.inid";
$result = $conn->query($sql);
$increment = 1;
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc()){
        echo "
        <tr>
            <td>".$increment."</td>
            <td>".$row['inid']."</td>
            <td>".$row['date']."</td>
            <td>".$row['uid']."</td>
            <td>".$row['uname']."</td>
            <td>".$row['did']."</td>
            <td>".$row['d_name']."</td>
            <td>".$row['head_id']."</td>
            <td>".$row['iid']."</td>
            <td>".$row['qty']."</td>
            <td>".$row['avl_stock']."</td>
            <td colspan='2'>
            <div class='btn-gr' style='padding:0px;'>
                <button class='btn btn-sm btn-primary no-anim' name=".$row['inid']." style='margin-top:0px' onclick='issue(this.name)'>Issue</button>
                <button class='btn btn-sm btn-danger no-anim' name=".$row['inid']." style='margin-top:0px' onclick='reject(this.name)'>Reject</button>
                <button class='btn btn-sm btn-secondary no-anim' name=".$row['inid']." style='margin-top:0px' onclick='open_model(this.name);'>View</button>
            </div></td>
        </tr>
        ";
        $increment++;
    }
}
?>