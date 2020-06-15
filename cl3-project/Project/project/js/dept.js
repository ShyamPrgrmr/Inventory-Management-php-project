loaddepttable();
load_dept_user();
load_head_table();

function save()
{
    name= document.getElementById("dept-name").value;
    type= document.getElementById("dept-type").value;
    num = document.getElementById("no-emp").value;
    
    $.ajax({
          url: '../api_pages/save_dept.php',
          type: 'POST',
          data: {
                dept_name:name,
                dept_type:type,
                dept_number:num
                },
          success: function(result)
            {
                loaddepttable();
                  load_dept_user();
                clear();
            }
        });
}

function loaddepttable()
{
      $.ajax({
            url:'../api_pages/load-department-table.php',
            type:'POST',
            data:{},
            success: function(result){
                  $("#department-table-body").html(result);

            }
      });
}

function loaddata(data)
{
      name_count = data.indexOf('#');
      type_count = data.indexOf('$');
      numb_count = data.indexOf('*');
      exte_count = data.indexOf('!');
      name = data.substring(name_count+1,type_count);
      type = data.substring(type_count+1,numb_count);
      num  = data.substring(numb_count+1,exte_count);
      document.getElementById("did").value = data.substring(0,name_count);
      document.getElementById("dept-name").value=name;
      document.getElementById("dept-type").value=type;
      document.getElementById("no-emp").value=num;
      did = document.getElementById("did").value;
      $.ajax({
            type: "post",
            url: "../api_pages/load_user_head.php",
            data:{did:did},
            success: function (response) {
               document.getElementById("head-id").value=response;  
            }
      });
}

function savehead(){
      did = document.getElementById("seldept").value;
      uid = document.getElementById("seluser").value;
      $.ajax({
            type: "post",
            url: "../api_pages/save_head_dept.php",
            data: {did:did,uid:uid},
            success: function (response) {
                  load_head_table();
            }
      });
}


function updatedept(){

      did = document.getElementById("did").value;
      name= document.getElementById("dept-name").value;
      type= document.getElementById("dept-type").value;
      num = document.getElementById("no-emp").value;
      
      $.ajax({
            url:'../api_pages/editdepartment.php',
            type:'POST',
            data:{
                  did:did,
                  name:name,
                  type:type,
                  num:num
            },
            success:function(){
                  loaddepttable();
                  clear();
            }
      });

}

function deletedept(){
      did = document.getElementById("did").value;
      
      $.ajax({
            url:'../api_pages/delete-dept.php',
            type:'POST',
            data:{
                  did:did,
            },
            success:function(){
                  loaddepttable();
                  load_dept_user();
                  clear();
            }
      });
}

function clear(){
      document.getElementById("did").value="";
      document.getElementById("dept-name").value="";
      document.getElementById("dept-type").value="";
      document.getElementById("no-emp").value="";
}


function load_dept_user()
{
      $.ajax({
            type: "post",
            url: "../api_pages/load_department_option.php",
            success: function (response) {
                  $("#seldept").html(response);
            }
      });
}

function loaduser(data)
{
      $.ajax({
            type: "post",
            url: "../api_pages/load_dept_user.php",
            data:{did:data}, 
            success: function (response) {
                  $("#seluser").html(response);
            }
      });
}

function load_head_table(){
      $.ajax({
            type: "post",
            url: "../api_pages/load_head_table.php",
            success: function (response) {
                  $("#list-head").html(response);
            }
      });
}


