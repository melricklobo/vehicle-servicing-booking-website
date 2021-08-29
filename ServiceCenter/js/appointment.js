$(document).ready(function(){

    // $("#back").on('click',function(e){
    //     alert("Feature not Implemented yet.");
    // })

    // $("#veh_details").on('click',function(e){
    //     alert("Feature not Implemented yet.");
    // })

    // $("#appointments").on('click',function(e){
    //     window.location.href="custAppointments.php";
    // })

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
            var tomorrow = new Date(today.getTime() + 48 * 60 * 60 * 1000);
            console.log(today);
            console.log(tomorrow);
            $('#datepick').datepicker({
                dateFormat:'yy/mm/dd',
                minDate: tomorrow,
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

    $("#book_appointment").on('click',function(e){
        window.location.href="booking.php";
    })

    $(".details_button").on('click',function(e){
        // console.log(this.value);

        $('#modal_body').empty();
        
        $.ajax({
            type:'POST',
            url:'web_services/getApp.php',
            data: {appid : this.value },
            success:function(response){
                // console.log(response.app);
                var data = response.data;
                if(response.status == 'success'){
                    $('#modal_body').append('<div class="modal-label">Services Opted :</div>')
                    for(var i = 0; i < data.length; i++){
                        console.log(data[i].service_name);

                        $('#modal_body').append('<div class="modal-detail">'+data[i].service_name+'</div>')

                    }
                    $('#modal_body').append('<div class="modal-label">Description :</div>')
                    $('#modal_body').append('<div class="modal-detail">'+response.app+'</div>')
                }
    
            },
            error: function(xhr, status, error) {
                alert("error: ".error);
            }
        })

    })

    $(".reschedule_button").on('click',function(e){
        var appid = this.value;
        // console.log(this.value);

        $("#rescheduleButton").on('click',function(e){
            // alert("Feature not Implemented yet.");
            var adate = $("#datepick").val();
            
    
            if(isempty(adate)){
                $("#erdatepick").html('Select a date*');
                return false;
            }
            else{
                $("#erdatepick").html('');
            }
    
            $.ajax({
                type:'POST',
                url:'web_services/reschedule.php',
                data: {date: adate, appid : appid},
                success:function(response){
                    // console.log(response);
                    if(response.status == 'success'){
                        alert("Appointment Recheduled");
                        window.location.href="appointments.php";
                    }
                    else{
                        alert("appointment cannot be rescheduled");
                    }
                },
                error: function(xhr, status, error) {
                    alert("error: ".error);
                }
            })
    
        })

    })

    $(".cancel_button").on('click',function(e){
        console.log("hello");
        if(confirm("Are you sure to cancel the appointment?")){

            $.ajax({
                type:'POST',
                url:'web_services/cancel.php',
                data: {appid : this.value},
                success:function(response){
                    console.log(response);
                    if(response.status == 'success'){
                        alert("Appointment Calcelled");
                        window.location.href="appointments.php";
                    }
                    else{
                        alert("appointment cancelled");
                    }
                },
                error: function(xhr, status, error) {
                    alert("error: ".error);
                }
            })

        }
        else
            window.location.href="appointments.php";
    })

})

function displayDetails(app_id){
    console.log(app_id)
}

function isempty(string){
    if(string == "")
        return true;
    else
        return false;
}

