load_item_option();
load_warehouse();
load_allocation_table();
$(document).ready(()=>{
    var fullDate = new Date();
    var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
    var currentDate = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();
    $(".inner-col-content-date").html(currentDate);
    }
);

function load_warehouse(){
    $.ajax({
        type: "post",
        url: "../api_pages/load_warehouse.php",
        success: function (response) {
            $("#warehouse-id").html(response);
        }
    });
}

function load_item_option()
{
    $.ajax({
        type: "post",
        url: "../api_pages/load_item_option.php",
        success: function (response) {
            $("#item-id").html(response);
        }
    });
}

function warehouse_option_change(wid)
{
    $.ajax({
        type: "post",
        url: "../api_pages/load_warehouse_info.php",
        data: {wid:wid},
        success: function (response) {
            data=String(response);
            document.getElementById("ware-name").value=data.substring(data.indexOf("{")+1,data.indexOf("}"));
            document.getElementById("ware-capa").value=data.substring(data.indexOf("[")+1,data.indexOf("]"));            
        }
    });

    $.ajax({
        type: "post",
        url: "../api_pages/load_rack_option.php",
        data: {wid:wid},
        success: function (response) {
            $("#rack-id").html(response);
        }
    });
}

function load_rack_info(rid){
    $.ajax({
        type: "post",
        url: "../api_pages/load_rack_alloc_info.php",
        data: {rid:rid},
        success: function (response) {
            data=String(response);
            document.getElementById("rack-name").value=data.substring(data.indexOf("{")+1,data.indexOf("}"));
            document.getElementById("rack-capa").value=data.substring(data.indexOf("[")+1,data.indexOf("]"));                        
        }
    });

}

function loaditemdata(d)
{   
$.ajax({
    type: "post",
    url: "../api_pages/load_item_info.php",
    data: {iid:d},
    success: function (data) {
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

        document.getElementById("item-name").value=name;
        document.getElementById("item-state").value=state;
        document.getElementById("item-desc").value=desc;
        document.getElementById("item-manu").value=manu;
        document.getElementById("item-hazard").value=hazar;     
    }
});
}


function allocate()
{
    wid = document.getElementById("warehouse-id").value;
    rid = document.getElementById("rack-id").value;
    iid = document.getElementById("item-id").value;
    qty = document.getElementById("item-qty").value;

    $.ajax({
        type: "post",
        url: "../api_pages/warehouse_allocate.php",
        data: {
            wid:wid,
            rid:rid,
            iid:iid,
            qty:qty
        },
        success: function (response) {
            alert(response);
            load_allocation_table();
        }
    });
}

function load_allocation_table(){
    $.ajax({
        type: "post",
        url: "../api_pages/load_allocation_table.php",
        success: function (response) {
            $("#table_body").html(response);
        }
    });
}