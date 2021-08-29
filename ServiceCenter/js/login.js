$(document).ready(function(){
    
    $("#loginButton").on('click',function(){

        var loginemail = $("#loginEmail").val();

        var loginpassword = $("#loginPassword").val();

        if(loginemail==""){
            $("#loginEmailError").html('Email Required*');
            $("#loginEmailError").css('color','red');
            $("#loginEmailError").css('font-size','0.7rem');
            return(false);
        }

        else if(!checkemail(loginemail)){
            $("#loginEmailError").html('Enter Valid Email*');
            $("#loginEmailError").css('color','red');
            $("#loginEmailError").css('font-size','0.7rem');
            return(false);
        }
        else{
            $("#loginEmailError").html('');
        }


        if(loginpassword==""){
            $("#loginPasswordError").html('Password Required*');
            $("#loginPasswordError").css('color','red');
            $("#loginPasswordError").css('font-size','0.7rem');
            return(false);
        }
        else{
            $("#loginPasswordError").html('');
        }



    })
    
})

function checkemail(string){
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(string);
}