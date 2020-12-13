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
    <?php echo form_open_multipart('admins/edit_admin', 'id="formID"'); ?>

<!--      <form id="formID" method="POST" action="" enctype="multipart/form-data"> -->
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo ucwords('Personal Information'); ?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <?php /*?><button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button><?php */?>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

            <!-- /.col -->
            <div class="col-md-6">

                 <div class="form-group">
                  <label>Full Name:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="hidden" name="id" name="id" value="<?php echo $edit_admin['id']; ?>">

                  <input type="text" value="<?php echo $edit_admin['name']; ?>" name="name" id="name" class="form-control validate[required,minSize[1]]" placeholder="Please Full Name" />
                </div><?php echo form_error('name'); ?>
                </div>


                <div class="form-group">
                  <label>Status:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-check"></i>
                  </div>
                    <input type="radio" name="status" <?php if ($edit_admin['status'] == 1) {echo 'checked="checked"';}?>value="1"> Active<br>
                    <input type="radio" name="status" <?php if ($edit_admin['status'] == 0) {echo 'checked="checked"';}?> value="0"> Inactive<br>

                </div><?php echo form_error('status'); ?>
                </div>

                <div class="form-group">
                  <label>Username</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" disabled="disabled" value="<?php echo $edit_admin['username']; ?>" name="username"  id="username" class="form-control validate[required,minSize[1]]" placeholder="Enter Admin's user name.">
                </div><?php echo form_error('username'); ?>
                </div>

                <?php if ($_SESSION['admin_id'] == $edit_admin['id']) {?>


                <div class="form-group">
                  <label>Current Password:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-lock"></i>
                  </div>
                  <input type="password" value="<?php echo set_value('current_password'); ?>"  name="current_password" min="5" id="current_password" class="form-control validate[minSize[4]]" placeholder="Enter Your Current Password">
                </div><?php echo form_error('current_password'); ?>
                </div>

                <div>
                <div class="col-md-6">
                <div class="form-group">
                  <label>New Password:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-lock"></i>
                  </div>
                  <input type="password" value="<?php echo set_value('new_password'); ?>" name="new_password" min="5" id="new_password" class="form-control validate[minSize[4]]" placeholder="Enter Your New Password">
                </div><?php echo form_error('new_password'); ?>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                  <label>Confirm New Password:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-lock"></i>
                  </div>
                  <input type="password" value="<?php echo set_value('c_new_password'); ?>"  name="c_new_password" min="5" id="c_new_password" class="form-control validate[minSize[4]]" placeholder="Enter Your Confirm New Password">
                </div><?php echo form_error('c_new_password'); ?>
                </div>
                </div>
              </div>
            <?php }?>

              </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputFile">Applicant Image:</label>

                  <input type="file"  class="validate[funcCall[fileTypeValidation]]" name="userfile" id="userfile" />

          <p>For best resolution width and height Should be same </p>
          <?php echo form_error('userfile'); ?>
                </div>
          <input type="hidden" name="hide_picture" id="hide_picture" value="<?php echo $edit_admin['image']; ?>" />
          <span><img src="<?php echo base_url() . IMG_UPLOAD_PATH . 'admin/' . $edit_admin['image']; ?>" height="100" width="100" id="image_upload_preview" class="img-thumbnail"></span>


        <div class="form-group">
                  <label>Email:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <input type="text" name="email" value="<?php echo $edit_admin['email']; ?>" id="email" class="form-control validate[required,custom[email]]" placeholder="Enter Admin's Email Address">
                </div><?php echo form_error('email'); ?>
                </div>



            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

      </div>
      <!-- /.box -->

        <div class="row">
         <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" name="submit" value="submit" class="btn btn-primary  btn-sm"><i class="fa fa-refresh"> </i> Update Record</button>
    <a href="<?php echo base_url(dashboard); ?>" class="btn btn-info  btn-sm" type="button"> <i class="fa fa-chevron-left"> </i> Cancel/Back</a>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
  </form>

    <!-- /.content -->
  </div>
<script>

  // File type validation
  function fileTypeValidation(field, rules, i, options)
  {
    var RegEx = /^.*\.(jpg|jpeg|png|PNG|JPEG|JPG)$/;

    if (!RegEx.test(field.val()))
    {
      var alertText = 'Only jpg, png and jpeg files are allowed';
      return alertText;
    }

  }

  var uploadField = document.getElementById("userfile");

  uploadField.onchange = function() {
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

    $("#userfile").change(function () {
        readURL(this);
    });

</script>
