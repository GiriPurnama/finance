$(function () {
    $('.js-basic-example').DataTable({
        "bLengthChange": false,
        "bFilter": true
    });

    $('#history').DataTable({
        "bLengthChange": false,
        "bFilter": true,
          dom: 'Bfrtip',
             buttons: [{
              extend: 'pdf',
              title: 'History Harian Bank',
              filename: 'history_pdf'
            }, {
                extend: 'print',
                title: 'History Harian Bank',
              }, {
              extend: 'excel',
              title: 'History Harian Bank',
              filename: 'history_excel'
            }]
    });


     $('#historyCuti').DataTable({
        "bLengthChange": false,
        "bFilter": true,
          dom: 'Bfrtip',
             buttons: [{
              extend: 'pdf',
              title: 'Cuti Pegawai',
              filename: 'cuti_pdf'
            }, {
                extend: 'print',
                title: 'Cuti Pegawai',
              }, {
              extend: 'excel',
              title: 'Cuti Pegawai',
              filename: 'cuti_pegawai'
            }]
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