$(document).ready(function(){

    var cookieEmail = getCookie("email").slice(0,-1);
    // alert(cookieEmail)
    $('#wcmsg').html('Welcome ' + cookieEmail);
    
    $("#submit").on('click',function(e){
        
        e.preventDefault();

        // validations
        var vehModel = $("#vehicle_model").val();
        var vehRegNo = $("#vehicle_reg_number").val();

        // alert(vehRegNo);
        
        if(vehModel==""){
            $("#modelError").html('Vehicle Name Required*');
            $("#modelError").css('color','red');
            $("#modelError").css('font-size','0.7rem');
            return(false);
        }
        else if(!(checkfochar(vehModel))){
            $("#modelError").html('Enter Valid Vehicle Name');
            $("#modelError").css('color','red');
            $("#modelError").css('font-size','0.7rem');
            return(false);
        }
        else{
            $("#modelError").html('');
        }
        
        if(vehRegNo==""){
            $("#regnumError").html('Vehicle Registration Number Required*');
            $("#regnumError").css('color','red');
            $("#regnumError").css('font-size','0.7rem');
            return(false);
        }
        else if(!(checkforregno(vehRegNo))){
            $("#regnumError").html('Enter valid registration number (eg GA/03/AE/1783)');
            $("#regnumError").css('color','red');
            $("#regnumError").css('font-size','0.7rem');
            return(false);
        }
        else{
            $("#regnumError").html('');
        }

    // ajax operation
        $.ajax({
            type:'POST',
            url:'web_services/vehRegister.php',
            data: $("#veh_form").serialize(),
            success:function(result){
                alert(result.status);
                if(result.status=='failed'){
                    // alert(result.status);
                    $("#formErr").html("Oops something went wrong. Please contact the admin. Sorry for the inconvinience");
                }
                else if(result.status=='success'){
                    // alert(result.status);
                    // $("#reg_msg").html("Registration Successfull. Try logging in."); 
                    window.location.href="login.php";
                }
            },
            error: function(error) {
                alert("error: "+error.status);
            }
        })
    
    })
    
})

function checkforspchar(string){
    return /[~`!#$%\^&*+=\-\[\]\\';.,/{}|\\":<>\?]/g.test(string);
}

function checkforno(string){
    return /\d/.test(string);
}

function checkfochar(string){
    return  /^[a-z][a-z\s]*$/i.test(string);
}

function checkforregno(string){
    return /^[A-Z]{2}[/][0-9]{2}[/][A-Z]{0,2}[/][0-9]{4}$/i.test(string);
}

function checkemail(string){
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(string);
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }