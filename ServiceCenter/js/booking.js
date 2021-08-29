$(document).ready(function(){

    var email = $("#email").html();
    console.log(email);

    $.ajax({
        type:'POST',
        url:'web_services/dates.php',
        data: {},
        success:function(result){
            dateRange = result.data;
            da = dateRange.split(",");
            dt = JSON.parse(JSON.stringify(da));
            // console.log(dt);
            var today = new Date();
            $('#datepick').datepicker({
                dateFormat:'yy/mm/dd',
                minDate: today,
                beforeShowDay: function(date) {
                    var dateString = jQuery.datepicker.formatDate('yy-mm-dd', date);
                    var day = date.getDay();
                    // console.log(dt.indexOf(dateString));
                    if (day == 0 || dt.indexOf(dateString) != -1) {
                        return [false, "busy"]
                    } else {
                        return [true, "free"]
                    }
                }
            });

        },
        error: function(error) {
            // alert("error: ".error);
            console.log('error: '.error);
        }
    })

    
    
    
    var maxLimit = 200;
    
    $('#desc').keyup(function () {
        var lengthCount = this.value.length;              
        if (lengthCount > maxLimit) {
            this.value = this.value.substring(0, maxLimit);
            var charactersLeft = maxLimit - lengthCount + 1;                   
        }
        else {                   
            var charactersLeft = maxLimit - lengthCount;                  
        }
        $('#charsleft').text(charactersLeft + ' Characters left');
    });
    

    $("#submit").on('click',function(e){
        // alert("clicked");

        e.preventDefault();
        e.stopPropagation();

        var flag = 0;

        var formData = new FormData($('#booking_form')[0]);

        var cname = $("#name").val();

        // console.log(cname);
        if(isempty(cname)){
            // alert("empty name");
            $("#ername").html('Name Required*');
            flag = -1;        
        }
        else if(checkforspchar(cname) || checkforno(cname)){
            // alert("char only");
            $("#ername").html('Only characters accepted*');
            $("#ername").show();
            flag = -1;
        }
        else{
            $("#ername").html('');
            flag = 0;
            // alert("nothing");
        }

        var contact = $("#contact").val();
        // console.log(contact);
        if(isempty(contact)){
            // alert("empty");
            $("#ercontact").html('Contact Required*');
            flag = -1;
        }
        else if(checkforspchar(contact) && checkfochar(contact)){
            $("#ercontact").html('Numbers only*');
            flag = -1;
            // alert("numbers only");
        }
        else if(contact.length != 10){
            $("#ercontact").html('Enter 10 digits only*');
            flag = -1;
        }
        else{
            $("#ercontact").html('');
            flag = 0;
        }

        var caddress = $("#address").val();

        if(isempty(caddress)){
            $("#eraddress").html('Address Required*');
            flag = -1;
        }
        else{
            $("#eraddress").html('');
            flag = 0;
        }

        var cemail = $("#email").val();
        // console.log(cemail);
        if(isempty(cemail)){
            $("#eremail").html('Email Required*');
            flag = -1;
        }
        else if(!checkemail(cemail)){
            
            $("#eremail").html(cemail+' is not a valid email*');
            document.getElementById("email").value = "";
            flag = -1;
        }
        else{
            $("#eremail").html('');
            flag = 0;
        }

        var vmodel = $("#model").val();
        if(isempty(vmodel)){
            $("#ermodel").html('Vehicle Model required*');
            flag = -1;
        }
        else if(checkforspchar(vmodel)){
            $("#ermodel").html('Model number cannot contain any special characters*');
            flag = -1;
        }
        else{
            $("#ermodel").html('');
            flag = 0;
        }

        var vregno = $("#reg").val();
        // console.log(vregno);
        if(isempty(vregno)){
            $("#erreg").html('Registration number Required*');
            flag = -1;
        }
        else if(!checkforregno(vregno)){
            $("#erreg").html('Invalid. Please enter in given format (eg: GA/03/AH/1997)*');
            flag = -1;
        }
        else{
            $("#erreg").html('');
            flag = 0;
        }

        var distance = $("#distance").val();
        if(!checkforno(distance)){
            $("#erkil").html('Invalid. Enter numbers only*');
            flag = -1;
        }
        else if(distance <= 0){
            $("#erkil").html('Invalid. Kilometers cannot be Negative*');
            flag = -1;
        }
        else{
            $("#erkil").html('');
            flag = 0;
        }

        var adate = $("#datepick").val();
        console.log(adate);

        if(isempty(adate)){
            $("#erdatepick").html('Select a date*');
            flag = -1;
        }
        else{
            $("#erdatepick").html('');
            flag = 0;
        }

        var desc = $("#desc").val();
        if(isempty(desc)){
            desc = "null";
        }

        const checkboxes = document.querySelectorAll(`input[name="service_name"]:checked`);
        let values = [];
        checkboxes.forEach((checkbox) => {
            values.push(checkbox.value);
        });

        // alert(values);
        if(isempty(values)){
            values = "null";
            flag == 0;
        }
        // alert(values);

        // alert("making call");     

        if(flag == -1 || isempty(cname)){
            alert("Pleae fill the form.")
            return(false);
        }
        else{
            $.ajax({
                type:'POST',
                url:'web_services/book.php',
                data: {
                    name: cname,
                    contact: contact,
                    reg: vregno,
                    dist: distance,
                    date: adate,
                    desc: desc,
                    values: values
                },
                success:function(response){
                    alert(response.msg);
                    var resp = response.status;
                    if(resp == 'success'){
                        window.open("index.php","_self")
                    }

                },
                error: function(xhr, status, error) {
                    alert("error: ".error);
                }
            })
        }

    })

});

function isempty(string){
    if(string == "")
        return true;
    else
        return false;
}

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