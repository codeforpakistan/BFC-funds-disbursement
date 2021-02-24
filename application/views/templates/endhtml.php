<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>


<script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<style type="text/css">

  .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
    border: 1px solid #d2d6de !important;
    border-radius: 0 !important;
    padding: 6px 12px;
    height: 34px !important;
}
</style>
<script>
$(function(){
    $('#sidebarMenu').slimScroll({
        height: '600px', 
    });
    setTimeout(function() {
        $('.alert').slideUp();
        // $('.alert').hide('fast');
    }, 10000); // 4sec
});
</script>

<script type="text/javascript">
  $(document).ready(function(){
// formErrorContent
    // $('.btnProcess').hide();
    $('.overlay').hide();
    $('#formID').submit(function() {
    if ($('.formError:visible').length){

    $('.overlay').hide();}
else
   {
    // $(":submit").attr("disabled", true);
    // $(':input[type="submit"]').prop('disabled', true);
    // $('button[type="submit"]').prop('disabled', true);
      // $('#btnSubmit').hide();
      // $('.btnProcess').show();

    // $( 'i' ).addClass( "fa-refresh fa-spin");

      $('.overlay').show();
   }
      return true;
    });
});
</script>
</div>  <!-- ending tag of class box -->
</body>
</html>