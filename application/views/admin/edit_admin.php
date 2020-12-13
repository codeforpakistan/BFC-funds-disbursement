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
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('admins/edit_admin', 'id="formID"'); ?>

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

                  <input type="text" value="<?php echo $all['name']; ?>" name="name" id="name" class="form-control validate[required,minSize[4]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('name'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('Gender'); ?>:</label>
                  <br>
                  <input type="radio" <?php if ($all['gender'] == 'male') {echo 'checked';}?> class="validate[required]" name="gender" id="gender" value="male"> Male
                  <input type="radio" <?php if ($all['gender'] == 'female') {echo 'checked';}?> class="validate[required]" name="gender" id="gender" value="female"> Female
                  <?php echo form_error('gender'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = 'Email'; ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                  </div>

                  <input type="text" readonly value="<?php echo $all['email']; ?>" name="email" id="email" class="form-control validate[required,minSize[5],custom[email]]" placeholder="Enter <?php echo $label; ?>" data-errormessage-custom-error="Let me give you a hint: someone@nowhere.com"/>
                </div><?php echo form_error('email'); ?>
                </div>


            </div>

            <div class="col-md-12">
              <div class="form-group">
                  <label for="exampleInputFile">Applicant Image:</label>

                  <input type="file" class="validate[funcCall[imageTypeValidation]]" name="imageFile" id="imageFile" />

          <p>For best resolution width and height Should be same </p>
          <?php echo form_error('imageFile'); ?>
          <input type="hidden" name="hide_picture" id="hide_picture" value="<?php echo $all['image']; ?>" />
          <img src="<?php echo base_url() . IMG_UPLOAD_PATH . 'admin/' . $all['image']; ?>" height="100" width="100" id="image_upload_preview" class="img-thumbnail">


                </div>




            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

      </div>
  <!-- personal info end -->

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
          <input type="hidden" name="id" name="id" value="<?php echo $all['id']; ?>">
            <!-- /.col -->
            <div class="col-md-12">
              <div class="form-group">
                  <label><?php echo $label = ucwords('username'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>

                  <input type="text" readonly value="<?php echo $all['username']; ?>" name="username" id="username" class="form-control validate[required,minSize[5],custom[onlyLetterNumber]]" placeholder="Enter <?php echo $label; ?>" data-errormessage-custom-error="No spaces and special Characters are allowed" />
                </div><?php echo form_error('username'); ?>
                </div>

                <?php //if ($_SESSION['admin_id'] == $all['id']) {?>

                <div class="form-group">
                  <label><?php echo $label = ucwords('Current Password'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-lock"></i>
                  </div>
                  <input type="password" value="<?php echo set_value('current_password'); ?>"  name="current_password" min="5" id="current_password" class="form-control validate[minSize[5],maxSize[15],custom[onlyLetterNumber]]" placeholder="Enter <?php echo $label; ?>" data-errormessage-custom-error="No spaces and special Characters are allowed" />
                </div><?php echo form_error('current_password'); ?>
                </div>

                <div>
                <div class="form-group">
                  <label><?php echo $label = ucwords('new Password'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-lock"></i>
                  </div>
                  <input type="password" value="<?php echo set_value('new_password'); ?>" name="new_password" min="5" id="new_password" class="form-control validate[minSize[5],maxSize[15],custom[onlyLetterNumber]]" placeholder="Enter <?php echo $label; ?>" data-errormessage-custom-error="No spaces and special Characters are allowed" />
                </div><?php echo form_error('new_password'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('confirm new Password'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-lock"></i>
                  </div>
                  <input type="password" value="<?php echo set_value('c_new_password'); ?>"  name="c_new_password" min="5" id="c_new_password" class="form-control validate[minSize[5],maxSize[15],custom[onlyLetterNumber]]" placeholder="Enter <?php echo $label; ?>" data-errormessage-custom-error="No spaces and special Characters are allowed" />
                </div><?php echo form_error('c_new_password'); ?>
                </div>
              </div>
              <i style="color: #9c0404;">leave passwords fields empty, if you dont want to change your password</i>

            <?php //}?>

            </div>


            <div class="col-md-12">

              <?php if ($_SESSION['tbl_admin_role_id'] == '1') {?>

                <div class="form-group">
                  <label><?php echo $label = ucwords('user Role/Level'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <select  name="tbl_admin_role_id" id="tbl_admin_role_id" class="form-control select2 validate[required]">
                    <option value="">Select User Role/Level</option>

                    <?php foreach ($admin_role as $admin_roleInfo): ?>
                      <option  <?php if ($admin_roleInfo['id'] == $all['tbl_admin_role_id']) {echo 'selected="selected"';}?>  value="<?php echo $admin_roleInfo['id']; ?>"><?php echo $admin_roleInfo['name']; ?></option>
                    <?php endforeach;?>
                  </select>
                </div><?php echo form_error('tbl_admin_role_id'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('district'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <select  name="tbl_district_id" id="tbl_district_id" class="form-control select2 validate[required]">
                    <option value="">Select District</option>

                    <?php foreach ($district as $districtInfo): ?>
                      <option  <?php if ($districtInfo['id'] == $all['tbl_district_id']) {echo 'selected="selected"';}?>  value="<?php echo $districtInfo['id']; ?>"><?php echo $districtInfo['name']; ?></option>
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

                    <input type="radio" name="status" <?php if ($all['status'] == 1) {echo 'checked="checked"';}?>value="1"> Active

                    <input type="radio" name="status" <?php if ($all['status'] == 0) {echo 'checked="checked"';}?>value="0"> Inactive

                </div><?php echo form_error('status'); ?>
                </div>


              <?php }?>


            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

      </div>
  <!-- login info end -->


</div>


  </div>



<div class="row">
         <!-- /.col -->
        <div class="col-md-6">
          <button type="submit" name="submit" value="submit" class="btn btn-primary  btn-sm"><i class="fa fa-refresh"> </i> Update Record</button>
    <a href="<?php echo base_url(dashboard); ?>" class="btn btn-info  btn-sm" type="button"> <i class="fa fa-chevron-left"> </i> Cancel/Back</a>

        </div>
        <!-- /.col -->
      </div>

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

<!--
<script type="text/javascript">

$('#dob').datepicker({
    format: "dd-mm-yyyy",
    todayBtn: "linked",
    calendarWeeks: true,
    autoclose: true,
    todayHighlight: true,
    toggleActive: true
});

</script>
 -->