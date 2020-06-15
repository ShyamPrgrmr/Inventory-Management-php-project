load_indent();

function load_indent(){
    $.ajax({
        type: "post",
        url: "../api_pages/load_indent_admin.php",
        success: function (response) {
            $("#table-body").html(response);
        }
    });
}


function open_model(data){
    $("#viewModal").modal();
      inid=data;
      $.ajax({
        type: "post",
        url: "../api_pages/load_view_admin_indent.php",
        data: {inid:inid},
        success: function (response){
            $("#show").html(response);
        }
      });
}

function issue(data)
{
    $.ajax({
        type: "post",
        url: "../api_pages/issue_indent.php",
        data: {inid:data},
        success: function (response) {
            load_indent();
        }
    });
}

function reject(data)
{

    $.ajax({
        type: "post",
        url: "../api_pages/reject_admin_indent.php",
        data: {inid:data},
        success: function (response) {
            load_indent();
        }
    });
}