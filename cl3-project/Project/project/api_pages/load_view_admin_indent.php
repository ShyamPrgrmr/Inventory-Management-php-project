<?php
require "database.php";
$inid = $_POST['inid'];
$sql = "select a1.inid,a1.uid,a1.did,a3.d_name,
a1.iid,a7.i_name,a7.i_desc,a7.i_manu,a7.i_state,a7.i_hazard,a1.qty,a6.r_date as date,
a4.uid as head_id,a5.qty as d,concat(a2.fname,' ',a2.lname) as uname,a8.head_name,a5.qty as avl_stock,
a9.reason from indent as a1,user as a2,department as a3,dept_head as a4,allocation_helper as a5,
indent_helper as a6,item as a7,(select concat(user.fname,' ',user.lname) as head_name,
user.uid from user,dept_head where user.uid=dept_head.uid and dept_head.uid<>'U') as a8,
indent_reason as a9 where a1.inid=a6.inid and a1.iid= a7.iid and a4.did=a1.did and 
a4.uid <>'U' and a5.iid=a1.iid and a2.uid=a1.uid 
and a3.did=a1.did and a8.uid=a4.uid and a1.inid=a9.inid and a1.inid='$inid'";
$result = $conn->query($sql);
$increment = 1;
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        echo '
            <div class="row">
            <div class="col-sm-4">
            <label for="">Date</label>
            <input type="text" class="form-control" disabled value="'.$row['date'].'">
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
            </div>
            </div>
            <div class="row">
            <div class="col-sm-4">
            <label for="">Indent id</label>
            <input type="text" class="form-control" disabled value="'.$row['inid'].'">
            </div>
            <div class="col-sm-4">
            <label for="">User id</label>
            <input type="text" class="form-control" disabled value="'.$row['uid'].'">
            </div>
            <div class="col-sm-4">
            <label for="">User name</label>
            <input type="text" class="form-control" disabled value="'.$row['uname'].'">
            </div>
            </div>
            <div class="row">
            <div class="col-sm-4">
            <label for="">Department id</label>
            <input type="text" class="form-control" disabled value="'.$row['did'].'">
            </div>
            <div class="col-sm-4">
            <label for="">Department name</label>
            <input type="text" class="form-control" disabled value="'.$row['d_name'].'">
            </div>
            <div class="col-sm-4">
            <label for="">Head name</label>
            <input type="text" class="form-control" disabled value="'.$row['head_name'].'">
            </div>
            </div>
            <div class="row">
            <div class="col-sm-4">
            <label for="">Item id</label>
            <input type="text" class="form-control" disabled value="'.$row['iid'].'">
            </div>
            <div class="col-sm-4">
            <label for="">Item name</label>
            <input type="text" class="form-control" disabled value="'.$row['i_name'].'">
            </div>
            <div class="col-sm-4">
            <label for="">Item state</label>
            <input type="text" class="form-control" disabled value="'.$row['i_state'].'">
            </div>
            </div>
            <div class="row">
            <div class="col-sm-4">
            <label for="">Item quantity</label>
            <input type="text" class="form-control" disabled value="'.$row['qty'].'">
            </div>
            <div class="col-sm-4">
            <label for="">Available stock</label>
            <input type="text" class="form-control" disabled value="'.$row['avl_stock'].'">
            </div>
            <div class="col-sm-4">
            <label for="">Hazard</label>
            <input type="text" class="form-control" disabled value="'.$row['i_hazard'].'">
            </div>
            </div>
        ';
    }
}


?>