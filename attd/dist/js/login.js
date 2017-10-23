$(document).ready(function(){
    $("#btnlogin").click(function(){
        var username = $("#txtusername").val();
        var password = $("#password").val();
// Checking for blank fields.
        //noinspection JSAnnotator
        if( username == '' || username == null || password == '' || password = null){
            $('input[type="text"],input[type="password"]').css("border","2px solid red");
            $('input[type="text"],input[type="password"]').css("box-shadow","0 0 3px red");
            alert("Please fill all fields...!!!!!!");
        }else {
            $.post("checklogin.php",{ username: username, password:password},
                function(data) {
                    if(data=='Email or Password is wrong.'){
                        $('input[type="text"],input[type="password"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
                        alert(data);
                    } else if(data=='Successfully Logged in.'){
                        $("form")[0].reset();
                        $('input[type="text"],input[type="password"]').css({"border":"2px solid #00F5FF","box-shadow":"0 0 5px #00F5FF"});
                        alert(data);
                    } else{
                        alert(data);
                    }
                });
        }
    });
});