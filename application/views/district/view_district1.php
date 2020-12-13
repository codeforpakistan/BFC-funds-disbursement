<?php
$admin_detail = $this->admin->getRecordById($_SESSION['admin_id'], $tbl_name = 'tbl_admin');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php $this->load->view('templates/alerts');?>

      <h1>
        <?php echo ucwords(str_replace('_', ' ', $page_title)); ?>
        <small><?php echo ucwords(str_replace('_', ' ', $description)); ?></small>
      </h1>

    </section>
    <!-- Main content -->
    <section class="content">
      <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title pull-left"><?php echo ucwords('Users/Admins Detail'); ?></h3>
             <!--  <h3 class="box-title pull-right">
                <a href="<?php echo base_url(); ?>add_admin" type="button" class="btn btn-block btn-danger btn-sm"><i class="fa fa-trash-o"> all </i></a></h3> -->

                <h3 class="box-title pull-right">

                  <?php if ($_SESSION['tbl_admin_role_id'] == '1') {?>
                    <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modalAdd">
                <i class="fa fa-plus"> New </i>
              </button>
              <?php }?>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="ssp_datatable" class="table table-bordered table-striped table-hover table-condensed">
                <thead>
                <tr>
                  <th width="2%">Sr.</th>
                  <th width="15%">District Name</th>
                  <th width="5%">Status</th>
                  <th width="8%" class="no-print">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->

  </div>

 <!-- modal for add record -->
<div id="modalAdd" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add New District</h4>
      </div>

        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart('#', 'id="formID" class="form-horizontal"'); ?>
      <div class="modal-body">

            <div class="form-group">
                  <label class="label-control col-md-4"><?php echo $label = ucwords('district name'); ?>:</label>
                  <div class="col-md-8">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" value="<?php echo set_value('name'); ?>" name="name" id="name" class="form-control validate[required,minSize[5]" placeholder="Enter <?php echo $label; ?>" />
                </div><div id="error"></div>
                </div>

            </div>

            <div class="form-group">
                  <label class="label-control col-md-4"><?php echo $label = ucwords('status') ?>:</label>
                  <div class="col-md-8">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-check"></i>
                  </div>
                    <input type="radio" checked="checked" id="status" name="status" value="1"> Active<br>
                    <input type="radio" id="status" name="status" value="0"> Inactive<br>
                  </div><div id="error"></div>
                </div>
            </div>
                    <!-- </div> -->

      </div>
          <?php echo form_close(); ?>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" value="submit" id="addSubmit" name="addSubmit" class="btn btn-primary  btn-sm"><i class="fa fa-plus"> </i> Add Record</button>
      </div>



    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<div id="modalEdit" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit District</h4>
      </div>

        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart('#', 'id="formIDs" class="form-horizontal"'); ?>
      <div class="modal-body">

            <div class="form-group">
                  <label class="label-control col-md-4"><?php echo $label = ucwords('district name'); ?>:</label>
                  <div class="col-md-8">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="hidden" value="" name="id"/>
                  <div id="error"></div>
                  <input type="text" value="<?php echo set_value('name'); ?>" name="name" id="name" class="form-control validate[required,minSize[5]" placeholder="Enter <?php echo $label; ?>" />
                </div><div id="error"></div>
                </div>

            </div>

            <div class="form-group">
                  <label class="label-control col-md-4"><?php echo $label = ucwords('status') ?>:</label>
                  <div class="col-md-8">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-check"></i>
                  </div>
                    <input type="radio" id="status" name="status" value="1"> Active<br>
                    <input type="radio" id="status" name="status" value="0"> Inactive<br>
                  </div><div id="error"></div>
                </div>
            </div>
                    <!-- </div> -->

      </div>
          <?php echo form_close(); ?>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" value="submit" id="updateSubmit" name="updateSubmit" class="btn btn-primary  btn-sm"><i class="fa fa-plus"> </i> Update Record</button>
      </div>



    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
  <!-- /.content-wrapper -->

<!-- for image / gallery -->
<script>
    baguetteBox.run('.tz-gallery');
</script>

<script type="text/javascript">

function delFunc(param,tbl_name,redirection)
{
  $('#confirm').on('click', function (e) {
    $('#delete').modal('hide');

    window.location.href="<?php echo base_url(); ?>common/deleteImageAndRecordByID/"+param+"/"+tbl_name+"/"+redirection+"/admin";
    //window.location.href="<?php //echo base_url(); ?>common/deleteRecordByID/"+param+"/"+tbl_name+"/"+redirection;


});
}



$(document).ready(function(){
    var sspDataTable=$('#ssp_datatable').DataTable({
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('district/view_districts/'); ?>",
            "type": "POST"
        },
        //Set column definition initialisation properties
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }]
    });
            // showAllData();
            $('#error').html(" ");

            $('#addSubmit').on('click', function (e) {
                // $("#formID").validationEngine().submit();
                // $("#formID").validationEngine('detach');
              // var url = $('#formID').attr('action');

              // var data = $('#formID').serialize();
                e.preventDefault();

                $.ajax({

                    type: "POST",
                    url: "<?php echo site_url('district/add_district'); ?>",
                    // url: url,
                    async: false,
                    data: $("#formID").serialize(),
                    dataType: "json",
                    success: function(data){
                        $.each(data, function(key, value) {
                          if(value==true){
                            $('#modalAdd').modal('hide');
                            $('#formID')[0].reset();
                            sspDataTable.ajax.reload(); //reload datatable ajax
                            $('.jquery_alert').html('<p class="alert alert-success">! Record has been successfully added</p>').fadeIn().delay(4000).fadeOut('slow');
                          }
                          else {
                            $('#' + key).addClass('is-invalid');
                            $('#' + key).parents('.form-group').find('#error').html(value);
                          }
                        });
                    }
                });
            });

            $('#formID input').on('keyup', function () {
                $(this).removeClass('is-invalid').addClass('is-valid');
                $(this).parents('.form-group').find('#error').html(" ");
            });





$('#updateSubmit').on('click', function (e) {

                e.preventDefault();


                $.ajax({

                    type: "POST",
                    url: "<?php echo site_url('district/update_district'); ?>",
                    // url: url,
                    async: false,
                    data: $("#formIDs").serialize(),
                    dataType: "json",
                    success: function(data){
                        $.each(data, function(key, value) {
                           // alert(value);
                          if(value==true){
                            $('#modalEdit').modal('hide');
                            $('#formIDs')[0].reset();
                            sspDataTable.ajax.reload(); //reload datatable ajax
                            $('.jquery_alert').html('<p class="alert alert-success">! Record has been successfully updated</p>').fadeIn().delay(4000).fadeOut('slow');
                          }
                          else {
                            $('#' + key).addClass('is-invalid');
                            $('#' + key).parents('.form-group').find('#error').html(value);
                          }
                        });
                    }
                });
            });


        });

// edit function for get data for editment and updating
  function edit(id)
  {

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('district/getData/') ?>/" + id,
        type: "post",
        dataType: "JSON",
        success: function(data)
        {


          $('[name="id"]').val(data.id);
          $('[name="name"]').val(data.name);
          $('input[name^="status"][value="'+data.status+'"').prop('checked',true);

            $('#modalEdit').modal('show'); // show bootstrap modal when complete loaded

          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from database');
          }
        });
      // $('#modalEdit').modal('show');
      // $('#formID')[0].reset();
    }

</script>