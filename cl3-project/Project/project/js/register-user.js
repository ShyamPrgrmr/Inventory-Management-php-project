function checkuser(d)
{
    $.ajax({
        type: "post",
        url: "../api_pages/check_user.php",
        data: {uid:d},
        success: function (result) {
            if(result==1){
                $("#uid").removeClass('is-invalid');
                $("#uid").addClass('is-valid');
            }
            else if(result==2){
                $("#uid").removeClass('is-valid');
                $("#uid").addClass('is-invalid');
            }
        }
    });
}

function checkpassword(d)
{
    var id = document.getElementById("uid").value; 
    $.ajax({
        type: "post",
        url: "../api_pages/check_password.php",
        data: {uid:id,password:d},
        success: function (result) {
            if(result==1){
                $("#password").removeClass('is-invalid');
                $("#password").addClass('is-valid');
            }
            else if(result==2){
                $("#password").removeClass('is-valid');
                $("#password").addClass('is-invalid');
            }
        }
    });
}

function edit_user_password(){
    var uid  = document.getElementById("uid").value;
    var pass = document.getElementById("new_password").value;
    $.ajax({
        url:"../api_pages/edit_user_password.php",
        type:"post",
        data:{uid:uid,pass:pass},
        success:(result)=>{
            if(result==1){
                window.open("login-panel.html");
            }
            else{
                alert("Wrong credintial");
            }
        }
    });
}