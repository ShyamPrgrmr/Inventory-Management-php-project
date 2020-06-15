load_table();
function clear_feild(){
    document.getElementById("name").value="";
    document.getElementById("state").value="Solid";
    document.getElementById("desc").value="";
    document.getElementById("man").value="";
    document.getElementById("dom").value="DD/MM/YYYY";
    document.getElementById("doe").value="DD/MM/YYYY";
    document.getElementById("hazard").value="";
    document.getElementById("iid").value="";
}

function save_item(){
    i_name  = document.getElementById("name").value;
    i_state = document.getElementById("state").value;
    i_desc  = document.getElementById("desc").value;
    i_manu  = document.getElementById("man").value;
    i_dom   = document.getElementById("dom").value;
    i_doe   = document.getElementById("doe").value;
    i_haz   = document.getElementById("hazard").value;

    console.log(i_haz);
    $.ajax({
        url:"../api_pages/save_item.php",
        data:{
            name:i_name,
            state:i_state,
            desc:i_desc,
            manu:i_manu,
            dom:i_dom,
            doe:i_doe,
            haz:i_haz
        },
        type:"post",
        success:()=>{clear_feild();load_table();}
    });
    
}

function load_table(){
    $.ajax({
        url:"../api_pages/load_item_table.php",
        type:"post",
        data:{},
        success:(result)=>{
            $("#list-table").html(result);
        }
    });
}

function loaditemdata(data)
{   
    id_in   = data.indexOf('#');
    name_in = data.indexOf('$');
    desc_in = data.indexOf('*'); 
    manu_in = data.indexOf('!');
    dom_in  = data.indexOf('/');
    doe_in  = data.indexOf('{');
    state_in= data.indexOf('}');
    haza_in = data.indexOf(']');  

    id   = data.substring(0,id_in);
    name = data.substring(id_in+1,name_in);
    desc = data.substring(name_in+1,desc_in);
    manu = data.substring(desc_in+1,manu_in);
    dom  = data.substring(manu_in+1,dom_in);
    doe  = data.substring(dom_in+1,doe_in);
    state= data.substring(doe_in+1,state_in);
    hazar= data.substring(state_in+1,haza_in);

    document.getElementById("iid").value=id;
    document.getElementById("name").value=name;
    document.getElementById("state").value=state;
    document.getElementById("desc").value=desc;
    document.getElementById("man").value=manu;
    document.getElementById("dom").value=dom;
    document.getElementById("doe").value=doe;
    document.getElementById("hazard").value=hazar;
}

function edit_item(){
    i_id    = document.getElementById("iid").value;
    i_name  = document.getElementById("name").value;
    i_state = document.getElementById("state").value;
    i_desc  = document.getElementById("desc").value;
    i_manu  = document.getElementById("man").value;
    i_dom   = document.getElementById("dom").value;
    i_doe   = document.getElementById("doe").value;
    i_haz   = document.getElementById("hazard").value;
    $.ajax({
        url:"../api_pages/edit_item.php",
        data:{
            iid:i_id,
            name:i_name,
            state:i_state,
            desc:i_desc,
            manu:i_manu,
            dom:i_dom,
            doe:i_doe,
            haz:i_haz
        },
        type:"post",
        success:()=>{clear_feild();load_table();}
    });   
}

function delete_item(){
    i_id = document.getElementById("iid").value;
    $.ajax({
        url:"../api_pages/delete_item.php",
        type:"post",
        data:{iid:i_id},
        success:()=>{
            clear_feild();
            load_table();
        }
    });
}

function search_item(data){
    $.ajax({
        url:"../api_pages/search_item.php",
        data:{searchkey:data},
        type:"post",
        success:(result)=>{
            $("#list-table").html(result);
        }
    });
}