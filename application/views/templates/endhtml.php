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