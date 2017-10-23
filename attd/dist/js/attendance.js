/**
 * Created by Segy Hendro P on 7 Apr 2017.
 */
$(document).ready( function ()
{
    $('#table_attendance').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "responsive": true,
        "autoWidth": true,
        "pagelength": true,
        "ajax": {
            "url": "read_attendance.php",
            "type": "POST"
        },
        "columns": [
            { "data": "id" },
            { "data": "date"},
            { "data": "name"},
            { "data": "checkin"},
            { "data": "checkout"},
            { "data": "working_hours"}
        ]
    });


        $('.choosename').select2({ 
        ajax: {
            url: "user_list.php",
            dataType: 'json',
            delay: 250,
            tags: "true",
            placeholder: "Select an option",
            data: function (params) {
                return {
                    q: params.term // search term
                };
            },
            processResults: function (data) {
                // parse the results into the format expected by Select2.
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data
                return {
                    results: data
                };
            },
            cache: true
        },
       // minimumInputLength: 2
    });


});
$(document).on( "click","#btncheckin", function() {
    var choosename = $("#choosename").val();

    //var id = $(this).attr("id");
    swal({
            title: "Check In Attendance",
            text: "Check in : "+choosename+" ?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#42c2f4",
            confirmButtonText: "Scan",
            cancelButtonText:"Cancel Scan",
            closeOnConfirm: false
        },
        function(){
            var value = {
                choosename: choosename
            };
            $.ajax(
                {
                    url : "checkin.php",
                    type: "POST",
                    data : value,
                    success: function(data, textStatus, jqXHR)
                    {
                        var data = jQuery.parseJSON(data);
                        if(data.result == 1){
                            swal("Success!", "Your record has been created.", "success");
                        }
                        else{
                            swal("Error","Can't data, error : "+data.error,"error");
                        }

                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        swal("Error!", textStatus, "error");
                    }
                });
        });
});

$(document).on( "click","#btncheckout", function() {
    var choosename = $("#choosename").val();

    //var id = $(this).attr("id");
    swal({
            title: "Check Out Attendance",
            text: "Check in : "+choosename+" ?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#42c2f4",
            confirmButtonText: "Scan",
            cancelButtonText:"Cancel Scan",
            closeOnConfirm: false
        },
        function(){
            var value = {
                choosename: choosename
            };
            $.ajax(
                {
                    url : "checkout.php",
                    type: "POST",
                    data : value,
                    success: function(data, textStatus, jqXHR)
                    {
                        var data = jQuery.parseJSON(data);
                        if(data.result == 1){
                            swal("Success!", "Your record has been created.", "success");
                        }
                        else{
                            swal("Error","Can't data, error : "+data.error,"error");
                        }

                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        swal("Error!", textStatus, "error");
                    }
                });
        });
});





