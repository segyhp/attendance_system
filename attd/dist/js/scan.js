/**
 * Created by Segy Hendro P on 8 Mei 2017.
 */
$(document).ready( function ()
{
     var table_attd = $('#table_attendance_index').DataTable({
        "paging": false,
        "searching" : false,
        "ordering": false,
        
        "ajax": {
            "url": "read_attendance_index.php",
            "type": "POST"
        },
        "columns": [
            { "data": "date"},
            { "data": "name"},
            { "data": "checkin"},
            { "data": "checkout"},
            { "data": "working_hours"}
        ]
    });
    setInterval (function () {
		table_attd.ajax.reload(null, false);
		}, 3000);
});
