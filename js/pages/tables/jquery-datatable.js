$(function () {
    $('.js-basic-example').DataTable({
        "bLengthChange": false,
        "bFilter": true
    });

    $('#history').DataTable({
        "bLengthChange": false,
        "bFilter": true,
          dom: 'Bfrtip',
          buttons: [
            'excel', 'pdf', 'print'
        ]
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});