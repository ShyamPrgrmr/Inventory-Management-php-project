load_table();

function open_model(data){
    $("#viewModal").modal();
      inid=data;
      $.ajax({
        type: "post",
        url: "../api_pages/load_view_head_indent.php",
        data: {inid:inid},
        success: function (response){
         result = String(response);
         document.getElementById("inid").value=response.substring(response.indexOf("(")+1,response.indexOf(")"));
         document.getElementById("inuid").value=response.substring(response.indexOf(")")+1,response.indexOf("{"));
         document.getElementById("inusername").value=response.substring(response.indexOf("{")+1,response.indexOf("}"));
         document.getElementById("initemid").value=response.substring(response.indexOf("}")+1,response.indexOf("["));
         document.getElementById("initemname").value=response.substring(response.indexOf("[")+1,response.indexOf("]"));
         document.getElementById("initemqty").value=response.substring(response.indexOf("]")+1,response.indexOf("!"))+" Kg.";
         document.getElementById("initemhazard").value=response.substring(response.indexOf("!")+1,response.indexOf("@"));
         document.getElementById("initemdesc").value=response.substring(response.indexOf("@")+1,response.indexOf("|"));
         document.getElementById("inreason").value=response.substring(response.indexOf("|")+1,response.indexOf("*"));
         document.getElementById("inuserdept").value=response.substring(response.indexOf("*")+1,response.indexOf("+"));
         document.getElementById("inuserhead").value=response.substring(response.indexOf("+")+1,response.indexOf("="));
        }
      });
}

function load_table(){
    $.ajax({
        type: "post",
        url: "../api_pages/load-indent-head-table.php",
        success: function (response) {
            $("#table_body").html(response);
        }
    });
}

function accept_indent(inid){
    $.ajax({
        type: "post",
        url: "../api_pages/accept_indent.php",
        data: {inid:inid},
        success: function (response) {
            alert(response);
            load_table();            
        }
    });
    
}

function reject_indent(inid){
    $.ajax({
        type: "post",
        url: "../api_pages/reject_indent.php",
        data: {inid:inid},
        success: function (response) {
            alert(response);
            load_table();            
        }
    });
}




