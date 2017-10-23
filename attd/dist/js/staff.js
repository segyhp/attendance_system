/**
 * Created by Segy Hendro P on 27 Mar 2017.
 */
$(document).ready( function ()
{
    $('#table_staff').DataTable({
       "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "responsive": true,
        "autoWidth": true,
        "pagelength": true,
        "ajax": {
            "url": "read_staff.php",
            "type": "POST"
        },
        "columns": [
            { "data": "id" },
            { "data": "uid"},
            { "data": "username"},
            { "data": "name"},
            { "data": "password"},
            { "data": "created_at"},
            { "data": "button"}
        ]
    });
});
$(document).on("click","#btnadd",function()
    {
        $("#modalstaff").modal("show");
        $("#txtuid").val("");
        $("#txtusername").val("");
        $("#txtname").focus();
        $("#txtname").val("");
        $("#password").val("");
        $("#txtcreated_at").val("");
        $("#crudmethod").val("N");
        $("#txtid").val("0");});

$(document).on( "click",".btnhapus", function() {
    var id = $(this).attr("id");
    var name = $(this).attr("name");
    swal({
            title: "Delete Staff?",
            text: "Delete Staff : "+name+" ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Delete",
            cancelButtonText:"Cancel Delete",
            closeOnConfirm: false
            },
        function(){
            var value = {
                id: id
            };
            $.ajax(
                {
                    url : "delete_staff.php",
                    type: "POST",
                    data : value,
                    success: function(data, textStatus, jqXHR)
                    {
                        var data = jQuery.parseJSON(data);
                        if(data.result ==1){
                            swal("Deleted!", "Your record has been deleted.", "success");
                            var table = $('#table_staff').DataTable();
                            table.ajax.reload( null, false );
                        }
                        else{
                            swal("Error","Can't delete staff data, error : "+data.error,"error");
                        }

                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        swal("Error!", textStatus, "error");
                    }
                });
        });
});


$(document).on("click","#btnsave",function(){
    var id = $("#txtid").val();
    var uid = $("#txtuid").val();
    var username = $("#txtusername").val();
    var name = $("#txtname").val();
    var password = $("#password").val();
    var created_at = $("#txtcreated_at").val();
    var crud=$("#crudmethod").val();
    if(name == '' || name == null || uid == '' || uid == null || username == '' || username == null || password == '' || password == null  || created_at =='' || created_at == ''){
        swal("Warning","Please fill staff unfilled record","warning");
        $("#txtname").focus();
        return;
    }
    var value = {
        id: id,
        uid:uid,
        username:username,
        name: name,
        password:password,
        created_at:created_at,
        crud:crud
    };
    $.ajax(
        {
            url : "save_staff.php",
            type: "POST",
            data : value,
            success: function(data, textStatus, jqXHR)
            {
                var data = jQuery.parseJSON(data);
                if(data.crud == 'N'){
                    if(data.result == 1){
                        swal("Success!", "Your record has been created.", "success");
                        $('#modalstaff').modal('hide');
                        var table = $('#table_staff').DataTable();
                        table.ajax.reload( null, false );
                        $("#txtuid").val("");
                        $("#txtusername").val("");
                        $("#txtname").focus();
                        $("#txtname").val("");
                        $("#password").val("");
                        $("#txtcreated_at").val("");
                        $("#crudmethod").val("N");
                        $("#txtid").val("0");
                        $("#txtnama").focus();
                    }else{
                        swal("Error","Can't save staff data, error : "+data.error,"error");
                    }
                }else if(data.crud == 'E'){
                    if(data.result == 1){
                        swal("Success!", "Your record has been updated.", "success");
                        $('#modalstaff').modal('hide');
                        var table = $('#table_staff').DataTable();
                        table.ajax.reload( null, false );
                        $("#txtname").focus();
                    }else{
                        swal("Error","Can't update staff data, error : "+data.error,"error");
                    }
                }else{
                    swal("Error","invalid order","error");
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                swal("Error!", textStatus, "error");
            }
        });
});


$(document).on("click",".btnedit",function(){
    var id=$(this).attr("id");
    var value = {
        id: id
    };
    $.ajax(
        {
            url : "get_staff.php",
            type: "POST",
            data : value,
            success: function(data, textStatus, jqXHR)
            {
                var data = jQuery.parseJSON(data);
                $("#crudmethod").val("E");
                $("#txtid").val(data.id);
                $("#txtuid").val(data.uid);
                $("#txtusername").val(data.username);
                $("#txtname").val(data.name);
                $("#password").val(data.password);
                $("#txtcreated_at").val(data.created_at);

                $("#modalstaff").modal('show');
                $("#txtname").focus();
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                swal("Error!", textStatus, "error");
            }
        });
});
$.notifyDefaults({
    type: 'success',
    delay: 500
});

$(document).ready(function(){
    $('#txtcreated_at').datepicker({
        format: "d M yyyy",
        weekStart: 1,
        todayBtn: "linked",
        clearBtn: true,
        language: "id",
        daysOfWeekDisabled: "0,6",
        daysOfWeekHighlighted: "1,2,3,4,5",
        autoclose: true,
        todayHighlight: true
    });
});
