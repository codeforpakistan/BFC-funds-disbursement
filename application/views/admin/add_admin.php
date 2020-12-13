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
    <?php validation_errors();?>
    <?php echo form_open_multipart('admins/add_admin', 'id="formID"'); ?>

<!--      <form id="formID" method="POST" action="" enctype="multipart/form-data"> -->
    <!-- Main content -->
    <section class="content">

      <div class="row">


<div class="col-md-6">

  <!-- personal info start -->
  <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo ucwords('Personal Information'); ?></h3>
          <br><i style="color: #9c0404;">use NA or not applicable, if information is not available</i>
          <div class="box-tools pull-right">
            <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
            <?php /*?><button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button><?php */?>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

            <!-- /.col -->
            <div class="col-md-12">
              <div class="form-group">
                  <label><?php echo $label = ucwords('name'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>

                  <input type="text" autocomplete="off" value="<?php echo set_value('name'); ?>" name="name" id="name" class="form-control validate[required,minSize[5]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('name'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('Gender'); ?>:</label>
                  <br>
                  <input type="radio" class="validate[required]" checked name="gender" id="gender" value="male"> Male
                  <input type="radio" class="validate[required]" name="gender" id="gender" value="female"> Female
                  <?php echo form_error('gender'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = 'Email'; ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                  </div>

                  <input type="text" autocomplete="off" value="<?php echo set_value('email'); ?>" name="email" id="email" class="form-control validate[required,minSize[5],custom[email]]" placeholder="Enter <?php echo $label; ?>" data-errormessage-custom-error="Let me give you a hint: someone@nowhere.com"/>
                </div><?php echo form_error('email'); ?>
                </div>

            </div>

            <div class="col-md-12">
              <div class="form-group">
                  <label for="exampleInputFile">Applicant Image:</label>

                  <input type="file" class="validate[required,funcCall[imageTypeValidation]]" name="imageFile" id="imageFile" />

                <p>For best resolution width and height Should be same </p>
                <?php echo form_error('imageFile'); ?>
                <span><img src="http://placehold.it/100x100" height="100" width="100" id="image_upload_preview" class="img-thumbnail"></span>
                </div>




            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

      </div>
  <!-- personal info end -->

  <!-- contact info start-->


  <!-- contact info end -->

</div>

<div class="col-md-6">
  <!-- login info start -->
  <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo ucwords('Login Information'); ?></h3>
          <br>
          <i style="color: #9c0404;">use NA or not applicable, if information is not available</i>

          <div class="box-tools pull-right">
            <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
            <?php /*?><button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button><?php */?>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

            <!-- /.col -->
            <div class="col-md-12">
                <div class="form-group">
                  <label><?php echo $label = ucwords('username'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>

                  <input type="text" autocomplete="off" value="<?php echo set_value('username'); ?>" name="username" id="username" class="form-control validate[required,minSize[5],maxSize[15],custom[onlyLetterNumber]]" placeholder="Enter <?php echo $label; ?>" data-errormessage-custom-error="No spaces and special Characters are allowed" />
                </div><?php echo form_error('username'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('password'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-lock"></i>
                  </div>

                  <input type="password" value="<?php echo set_value('password'); ?>" name="password" id="password" class="form-control validate[required,minSize[5],maxSize[15],custom[onlyLetterNumber]]" placeholder="Enter <?php echo $label; ?>" data-errormessage-custom-error="No spaces and special Characters are allowed" />
                </div><?php echo form_error('password'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('confirm password'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-lock"></i>
                  </div>

                  <input type="password" value="<?php echo set_value('confirm_password'); ?>" name="confirm_password" id="confirm_password" class="form-control validate[required,minSize[5],maxSize[15],custom[onlyLetterNumber]]" placeholder="Enter <?php echo $label; ?>" data-errormessage-custom-error="No spaces and special Characters are allowed" />
                </div><?php echo form_error('confirm_password'); ?>
                </div>

            </div>

            <div class="col-md-12">

                <div class="form-group">
                  <label><?php echo $label = ucwords('user Role/Level'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <select  name="tbl_admin_role_id" id="tbl_admin_role_id" class="form-control select2 validate[required]">
                    <option value="">Select User Role/Level</option>

                    <?php foreach ($admin_role as $admin_roleInfo): ?>
                      <option value="<?php echo $admin_roleInfo['id']; ?>"><?php echo $admin_roleInfo['name']; ?></option>
                    <?php endforeach;?>
                  </select>
                </div><?php echo form_error('tbl_admin_role_id'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('district'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-building"></i>
                  </div>

                  <select  name="tbl_district_id" id="tbl_district_id" class="form-control select2 validate[required]">
                    <option value="0">Select District</option>

                    <?php foreach ($district as $districtInfo): ?>
                      <option value="<?php echo $districtInfo['id']; ?>"><?php echo $districtInfo['name']; ?></option>
                    <?php endforeach;?>
                  </select>
                </div><?php echo form_error('tbl_district_id'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('status') ?>:</label>
                  <div class="input-group">
                  <!-- <div class="input-group-addon">
                    <i class="fa fa-check"></i>
                  </div> -->
                    <input type="radio" name="status" checked="checked" value="1"> Active
                    <input type="radio" name="status" value="0"> Inactive

                </div><?php echo form_error('status'); ?>
                </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

      </div>
  <!-- login info end -->


  <!-- social info start -->


  <!-- social info end -->

    <!-- qualification and exp start -->


  <!-- qualification and exp end -->


</div>

  </div>

      <!-- /.box -->

        <div class="row">
         <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" value="submit" name="submit" class="btn btn-primary  btn-sm"><i class="fa fa-plus"> </i> Add Record</button>
    <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-info  btn-sm" type="button"> <i class="fa fa-chevron-left"> </i> Cancel/Back</a>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
  </form>

    <!-- /.content -->
  </div>
<script>

  // image type validation
  function imageTypeValidation(field, rules, i, options)
  {
    var RegEx = /^.*\.(jpg|jpeg|png|PNG|JPEG|JPG)$/;

    if (!RegEx.test(field.val()))
    {
      var alertText = 'Only jpg, png and jpeg files are allowed';
      return alertText;
    }

  }

  // image type validation
  function fileTypeValidation(field, rules, i, options)
  {
    var RegEx = /^.*\.(PDF|pdf)$/;

    if (!RegEx.test(field.val()))
    {
      var alertText = 'Only pdf files are allowed';
      return alertText;
    }

  }

  var imageField = document.getElementById("imageFile");

  imageField.onchange = function() {
    if(this.files[0].size > 1000000){ // 1MB = 1000000 byte
       alert("File is too big! Not exceed from 1MB");
       this.value = "";
    };
  };


  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageFile").change(function () {
        readURL(this);
    });

</script>


<!-- <script type="text/javascript">

$('#email').datepicker({
    format: "dd-mm-yyyy",
    todayBtn: "linked",
    calendarWeeks: true,
    autoclose: true,
    todayHighlight: true,
    toggleActive: true
});

</script> -->
