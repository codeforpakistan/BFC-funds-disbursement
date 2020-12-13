
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>

<!-- bootstrap time picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->

<!-- bootstrap date time picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<!-- iCheck 1.0.1 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<!-- Page script -->
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script> -->

<!-- <script src="https://cdn.datatables.net/fixedheader/3.1.2/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
 -->
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>

<!-- for image/ gallery  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<!-- <script>
    baguetteBox.run('.tz-gallery');
</script> -->

<script>
  $(document).ready(function() {
    $('#full_table_print').DataTable({

            dom: 'lBfrtip',
            buttons: [{
                extend: 'print',footer: true,
                messageBottom: '<br><br>   Post Master <br> Sher Garh P.O',

                customize: function ( win ) {

          $(win.document.body)
                        .css( 'font-size', '11pt' )
                        .css( 'font-weight', 'bold' )
                        .css( 'text-align', 'right' );

          $(win.document.body).find('h1')
                        .css( 'font-size', '12pt' )
                        .css( 'font-weight', 'bold' )
                        .css( 'text-align', 'center' );

                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', '10pt' );
                }
            }
            ]

    });
});

// $(document).ready(function() {
// $('#full_table').DataTable({
//   fixedHeader: {
//     header: true,
//     footer: true
//   }
// });
// });
  $(function () {

  $("#full_table").DataTable();
  $('#half_table').DataTable({
      "paging": false,
    //"pageLength": 5,
    //"pagingType": "simple",
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });

    //Initialize Select2 Elements
    $(".select2").select2();

  });


  </script>

