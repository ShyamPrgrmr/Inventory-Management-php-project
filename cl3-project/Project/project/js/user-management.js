load_department_option();
load_user_table();
load_user_option();

function load_user_option()
{
    $.ajax({
        url:"../api_pages/load_department_option.php",
        data:{},
        type:'post',
        success:(result)=>{
            $("#department").html(result);
        }
    });
}

function load_department_option()
{
    $.ajax({
        url:"../api_pages/load_user_option.php",
        data:{},
        type:'post',
        success:(result)=>{
            $("#seluser").html(result);
        }
    });
}

function clear_field()
{
    document.getElementById("fname").value="";
    document.getElementById("lname").value="";
    document.getElementById("mobile").value="";
    document.getElementById("dob").value="DD-MM-YYYY";
    document.getElementById("doj").value="DD-MM-YYYY";
    document.getElementById("city").value="";
    document.getElementById("state").value="";
    document.getElementById("zip").value="";    
}

function load_user_table()
{
    $.ajax({
        url:'../api_pages/load_user_table.php',
        data:{},
        type:"post",
        success:(result)=>{
            $("#user-table").html(result);
        }
    });
}

function save_user()
{
    fname  = document.getElementById("fname").value;
    lname  = document.getElementById("lname").value;
    gender = document.getElementById("gender").value;
    dept   = document.getElementById("department").value;
    mobile = document.getElementById("mobile").value;
    dob    = document.getElementById("dob").value;
    doj    = document.getElementById("doj").value;
    city   = document.getElementById("city").value;
    state  = document.getElementById("state").value;
    zip    = document.getElementById("zip").value;

    $.ajax({
        url:"../api_pages/save_user.php",
        data:{
            fname:fname,
            lname:lname,
            gender:gender,
            dept:dept,
            mobile:mobile,
            dob:dob,
            doj:doj,
            city:city,
            state:state,
            zip:zip
        },
        type:"post",
        success:()=>{
            clear_field();
        }
    });
    load_user_table();
}

function loaddata(data)
{   
    idin   = data.indexOf('#');
    didin  = data.indexOf('$');
    fin    = data.indexOf("*");
    lin    = data.indexOf("!");
    genin  = data.indexOf("/");
    dobin  = data.indexOf("{");
    dojin  = data.indexOf("(");
    mobiin = data.indexOf("}");
    statin = data.indexOf("[");
    zipin  = data.indexOf("|");
    cityin = data.indexOf(")");

    uid    = data.substring(0,idin);
    did    = data.substring(idin+1,didin);
    fname  = data.substring(didin+1,fin);
    lname  = data.substring(fin+1,lin);
    gender = data.substring(lin+1,genin);
    dob    = data.substring(genin+1,dobin);
    doj    = data.substring(dobin+1,dojin);
    mobile = data.substring(dojin+1,mobiin);
    state  = data.substring(mobiin+1,statin);
    zip    = data.substring(statin+1,zipin);
    city   = data.substring(zipin+1,cityin);

    document.getElementById("uid").value=uid
    document.getElementById("fname").value=fname;
    document.getElementById("lname").value=lname;
    document.getElementById("mobile").value=mobile;
    document.getElementById("dob").value=dob;
    document.getElementById("doj").value=doj;
    document.getElementById("city").value=city;
    document.getElementById("state").value=state;
    document.getElementById("zip").value=zip;
    document.getElementById("gender").value=gender;
    document.getElementById("department").value = did;    
}

function edit_user()
{
    uid = document.getElementById("uid").value;
    fname  = document.getElementById("fname").value;
    lname  = document.getElementById("lname").value;
    gender = document.getElementById("gender").value;
    dept   = document.getElementById("department").value;
    mobile = document.getElementById("mobile").value;
    dob    = document.getElementById("dob").value;
    doj    = document.getElementById("doj").value;
    city   = document.getElementById("city").value;
    state  = document.getElementById("state").value;
    zip    = document.getElementById("zip").value;

    $.ajax({
        url:"../api_pages/edit_user.php",
        data:{
            uid:uid,
            fname:fname,
            lname:lname,
            gender:gender,
            dept:dept,
            mobile:mobile,
            dob:dob,
            doj:doj,
            city:city,
            state:state,
            zip:zip
        },
        type:"post",
        success:()=>{
            clear_field();
        }
    });
    load_user_table();
}


function search_user(){
    
    da=document.getElementById("searchkey").value;
    $.ajax({
        url:'../api_pages/load_search_user.php',
        data:{
            key:da
        },
        type:"post",
        success:(result)=>{
            $("#user-table").html(result);
            document.getElementById("searchkey").value="";
        }
    }); 
}