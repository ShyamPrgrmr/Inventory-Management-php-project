onload_page();
load_table();

$(document).ready(()=>{
    $(".the-message").hide();
    var count=1;
    $("#messageid").click(()=>{
        if(count===1)
        {
            $(".the-message").show();
            count=0;
        }
        else
        {
            $(".the-message").hide();
            count=1;
        }
    });
});


function onload_page(){
$.ajax({
    type: "post",
    url: "../api_pages/load_user_name.php",
    success: function (response) {
        st = String(response);
        fi = st.indexOf("#");
        se = st.indexOf("*");
        uname = st.substring(0,fi);
        dname = st.substring(fi+1,se);
        document.getElementById("u").value=uname;
        document.getElementById("d").value=dname;
    }
});

$.ajax({
    type: "post",
    url: "../api_pages/load_item_option.php",
    success: function (response) {
        $("#item_id").html(response);
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

        document.getElementById("item_name").value=name;
        document.getElementById("item_state").value=state;
        document.getElementById("item_desc").value=desc;
        document.getElementById("item_manu").value=manu;
        document.getElementById("item_hazard").value=hazar;     
    }
});
}


function clear_function()
{
    document.getElementById("item_name").value=" ";
    document.getElementById("item_state").value=" ";
    document.getElementById("item_desc").value=" ";
    document.getElementById("item_manu").value=" ";
    document.getElementById("item_hazard").value=" ";   
    document.getElementById("item_qty").value=" ";
    document.getElementById("inid").value=" ";  
    document.getElementById("in_reason").value=" ";
}

function save_indent(){
    iid = document.getElementById("item_id").value;
    qty = document.getElementById("item_qty").value;
    reason = document.getElementById("in_reason").value;
    $.ajax({
        type: "post",
        url: "../api_pages/save_indent.php",
        data: {qty:qty,iid:iid,reason:reason},
        success: function (response) {
            clear_function();
            load_table();
        }
    });
    
}



function load_table(){
    $.ajax({
        type: "post",
        url: "../api_pages/load_indent.php",
        success: function (response) {
            $("#table_body").html(response);
        }
    });
}

function loaditemdataonload(data)
{
      da = String(data);
      inid     = da.substring(0,da.indexOf('!'));
      quantity = da.substring(da.indexOf('!')+1,da.indexOf('/'));
      iid      = da.substring(da.indexOf('/')+1,da.indexOf('|')); 
      reason   = da.substring(da.indexOf('|')+1,da.indexOf('?'));
      document.getElementById('in_reason').value = reason;     
      document.getElementById('item_qty').value = quantity;
      document.getElementById('inid').value     = inid;   
      loaditemdata(iid);   
}

function deleteindent()
{
    inid = document.getElementById('inid').value;
    $.ajax({
        type: "post",
        url: "../api_pages/delete_indent.php",
        data: {inid:inid},
        success: function (response) {
            console.log(response);
            load_table();
        }
    });
}