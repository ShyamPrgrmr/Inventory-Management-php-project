function btnlogin(){
type = document.getElementById("type").value; 
user = document.getElementById("username").value;
pass = document.getElementById("password").value;
console.log(type);

if(type=="User")
{
    $.ajax({
        type: "post",
        url: "../api_pages/login-user.php",
        data: {id:user,pass:pass},
        success: function (result) {
            if(result==1){
                window.open("user-site-panel.html","_self");
                window.close();
            }
        }
    });
}
if(type=="Head")
{
    $.ajax({
        type: "post",
        url: "../api_pages/head_login.php",
        data: {uid:user,pass:pass},
        success: function (response) {
            
            if(response==1){
                window.open("head_panel.html","_self");
                window.close();
            }   
            else{
                alert("Login error");
            }
        }
    });
}

if(type=="Admin")
{
    $.ajax({
        type: "post",
        url: "../api_pages/admin_login.php",
        data: {uid:user,pass:pass},
        success: function (response) {
            
            if(response==1){
                window.open("admin-page.html","_self");
                window.close();
            }   
            else{
                alert("Login error");
            }
        }
    });
}


}