load_warehouse_option();

warehouse_table();
function save_warehouse(){
    name = document.getElementById("w-name").value;
    loca = document.getElementById("w-location").value;
    mate = document.getElementById("w-material").value;
    $.ajax({
        url:"../api_pages/warehouse-save.php",
        data:{
            name:name,
            loca:loca,
            mate:mate
        },
        type:"post",
        success:function(){
            load_warehouse_option();
            warehouse_table();
        }
    });
clear_warehouse_field();
}
function clear_warehouse_field()
{
    document.getElementById("w-name").value = "";
    document.getElementById("w-location").value="";
    document.getElementById("w-material").value="";   
}
function clearrackfield(){
    document.getElementById("rack-name").value="";
    document.getElementById("rack-capacity").value="";
    document.getElementById("rack-mate").value="";    
}

function warehouse_table()
{
    $.ajax({
        url:"../api_pages/warehouse-list-load.php",
        data:{},
        type:"post",
        success:function(result){
            $("#warehouse-table").html(result);
        }
    });
}
function load_warehouse_option(){
    $.ajax({
        url:"../api_pages/warehouse_option_load.php",
        data:{data:2},
        type:"post",
        success:function(result){
            $("#rack-ware").html(result);
        }
    });
}

function rack_material_load(value){
    $.ajax({
        url:"../api_pages/rack_material_load.php",
        data:{wid:value},
        type:"post",
        success:function(result){
            $("#rack-mate").html(result);
        }
    });
}

function rack_save(){
    name=document.getElementById("rack-name").value;
    ware=document.getElementById("rack-ware").value;
    capa=document.getElementById("rack-capacity").value;
    mate=document.getElementById("rack-mate").value;
    $.ajax({
        url:"../api_pages/rack_save.php",
        data:{
            name:name,
            ware:ware,
            capa:capa,
            mate:mate
        },
        type:"post",
        success:function(){
            warehouse_table();
            clearrackfield();
        }
    });
}

function load_racks_table(data){
    $.ajax({
        url:"../api_pages/load_rack_table.php",
        data:{
            wid:data
        },
        type:'post',
        success:function(result){
            $("#rack-table").html(result);
        }
    });
}

function loadrackdata(data){

}

function load_warehouse(data)
{
    //WARE-1!Steel store:left side of IT department./0@}
    f1 = data.indexOf('!');
    load_racks_table(data.substring(0,f1));
    f2 = data.indexOf(':');
    f3 = data.indexOf('/');
    f4 = data.indexOf('@');
    id = data.substring()
    
}