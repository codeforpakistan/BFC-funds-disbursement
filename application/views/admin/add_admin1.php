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
         <!-- /.col -->
      <div class="col-md-6">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo ucwords('Login Information'); ?></h3>

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
                  <label><?php echo $label = ucwords('username'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>

                  <input type="text" value="<?php echo set_value('username'); ?>" name="username" id="username" class="form-control validate[required,minSize[4]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('username'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('password'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-lock"></i>
                  </div>

                  <input type="password" value="<?php echo set_value('password'); ?>" name="password" id="password" class="form-control validate[required,minSize[4]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('password'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('E-News Letter'); ?>:</label>
                  <br>
                  <input type="checkbox" name="news_letter" id="news_letter" value="yes"> Subscribe to E-News Letter
                  <?php echo form_error('news_letter'); ?>
                </div>


            </div>

            <div class="col-md-6">
              <div class="form-group">

                  <label><?php echo $label = ucwords('subject specialization'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-book"></i>
                  </div>
                  <select  name="tbl_subject_id" id="tbl_subject_id" class="form-control select2 validate[required]">
                    <option value="">Select Subject</option>
                    <?php foreach ($subject as $subjectInfo): ?>
                      <option value="<?php echo $subjectInfo['id']; ?>"><?php echo $subjectInfo['name']; ?></option>
                    <?php endforeach;?>
                  </select>
                </div>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('admin type/Role/Level'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <select  name="tbl_admin_role_id" id="tbl_admin_role_id" class="form-control select2 validate[required]">
                    <option value="">Select Admin Type/Role/Level</option>
                    <?php foreach ($admin_role as $admin_roleInfo): ?>
                      <option value="<?php echo $admin_roleInfo['id']; ?>"><?php echo $admin_roleInfo['name']; ?></option>
                    <?php endforeach;?>
                  </select>
                </div>
                </div>

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

      </div>
    </div>

    <div class="col-md-6">

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
                  <label><?php echo $label = ucwords('name'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>

                  <input type="text" value="<?php echo set_value('name'); ?>" name="name" id="name" class="form-control validate[required,minSize[4]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('name'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = 'Name of Institution'; ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-building-o"></i>
                  </div>

                  <input type="text" value="<?php echo set_value('name_of_institution'); ?>" name="name_of_institution" id="name_of_institution" class="form-control validate[required,minSize[4]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('name_of_institution'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('Designation'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-black-tie"></i>
                  </div>

                  <select  name="tbl_designation_id" id="tbl_designation_id" class="form-control select2 validate[required]">
                    <option value="">Select Designation</option>
                    <?php foreach ($designation as $designationInfo): ?>
                      <option value="<?php echo $designationInfo['id']; ?>"><?php echo $designationInfo['name']; ?></option>
                    <?php endforeach;?>
                  </select>
                </div>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('contact phone'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>

                  <input type="text" value="<?php echo set_value('phone'); ?>" name="phone" id="phone" class="form-control validate[required,minSize[1]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('phone'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('contact cell #'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-mobile"></i>
                  </div>

                  <input type="text" value="<?php echo set_value('mobile'); ?>" name="mobile" id="mobile" class="form-control validate[required,minSize[1]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('mobile'); ?>
                </div>



            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputFile">Applicant Image:</label>

                  <input type="file" size="20" class="validate[required,funcCall[imageTypeValidation]]" name="imageFile" id="imageFile" />

          <p>For best resolution width and height Should be same </p>
          <?php echo form_error('imageFile'); ?>
          <span><img src="http://placehold.it/100x100" height="100" width="100" id="image_upload_preview" class="img-thumbnail"></span>
                </div>



          <div class="form-group">
                  <label><?php echo $label = ucwords('email'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                  </div>

                  <input type="text" value="<?php echo set_value('email'); ?>" name="email" id="email" class="form-control validate[custom[email],required,minSize[1]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('email'); ?>
                </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

      </div>
    </div>

    <div class="col-md-6">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo ucwords('address'); ?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <?php /*?><button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button><?php */?>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

            <!-- /.col -->
            <div class="col-md-12">
              <div class="form-group">
                  <label><?php echo $label = ucwords('street address'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                  </div>

                  <textarea type="text" value="<?php echo set_value('address'); ?>" name="address" id="address" class="form-control validate[required,minSize[4]]" placeholder="Enter <?php echo $label; ?>"></textarea>
                </div><?php echo form_error('address'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('union council'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                  </div>

                  <input type="text" value="<?php echo set_value('uc'); ?>" name="uc" id="uc" class="form-control validate[required,minSize[4]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('uc'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('tehsil'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                  </div>

                  <input type="text" value="<?php echo set_value('tehsil'); ?>" name="tehsil" id="tehsil" class="form-control validate[required,minSize[1]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('tehsil'); ?>
                </div>

            </div>

            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

      </div>
    </div>


    <div class="col-md-6">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo ucwords('Qualification & Experience'); ?></h3>

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
                  <label><?php echo $label = ucwords('Education Level'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-book"></i>
                  </div>

                  <select  name="tbl_education_level_id" id="tbl_education_level_id" class="form-control select2 validate[required]">
                    <option value="">Select Education Level</option>
                    <?php foreach ($education_level as $education_levelInfo): ?>
                      <option value="<?php echo $education_levelInfo['id']; ?>"><?php echo $education_levelInfo['name']; ?></option>
                    <?php endforeach;?>
                  </select>
                </div>
                </div>



                <div class="form-group">
                  <label><?php echo $label = ('Name of Institute'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-building-o"></i>
                  </div>

                  <input type="text" value="<?php echo set_value('name_of_edu_institution'); ?>" name="name_of_edu_institution" id="name_of_edu_institution" class="form-control validate[required,minSize[4]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('name_of_edu_institution'); ?>
                </div>


            </div>

            <div class="col-md-6">


                <div class="form-group">
                  <label><?php echo $label = ucwords('experience'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-history"></i>
                  </div>

                  <input type="text" value="<?php echo set_value('experience'); ?>" name="experience" id="experience" class="form-control validate[required,minSize[1]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('experience'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('experience from'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>

                  <input type="text" value="<?php echo set_value('exp_from'); ?>" name="exp_from" id="exp_from" class="form-control validate[required,minSize[1]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('exp_from'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('experience to'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>

                  <input type="text" value="<?php echo set_value('exp_to'); ?>" name="exp_to" id="exp_to" class="form-control validate[required,minSize[1]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('exp_to'); ?>
                </div>

            </div>

            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

      </div>
    </div>

    <div class="col-md-6">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo ucwords('Social Information'); ?></h3>

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
                  <label><?php echo $label = ('WWW'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-globe"></i>
                  </div>

                  <input type="text" value="<?php echo set_value('www'); ?>" name="www" id="www" class="form-control validate[required,minSize[4]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('www'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ('Facebook'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-facebook"></i>
                  </div>

                  <input type="text" value="<?php echo set_value('fb'); ?>" name="fb" id="fb" class="form-control validate[required,minSize[4]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('fb'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ('Twitter'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-twitter"></i>
                  </div>

                  <input type="text" value="<?php echo set_value('twitter'); ?>" name="twitter" id="twitter" class="form-control validate[required,minSize[4]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('twitter'); ?>
                </div>


            </div>

            <div class="col-md-6">


                <div class="form-group">
                  <label for="exampleInputFile">Upload Your CV:</label>

                  <input type="file" size="20" class="validate[required,funcCall[fileTypeValidation]]" name="cv" id="cv" />

                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('whats app #'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-whatsapp"></i>
                  </div>

                  <input type="text" value="<?php echo set_value('whatsapp'); ?>" name="whatsapp" id="whatsapp" class="form-control validate[required,minSize[1]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('whatsapp'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ('linkedin'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-linkedin"></i>
                  </div>

                  <input type="text" value="<?php echo set_value('linkedin'); ?>" name="linkedin" id="linkedin" class="form-control validate[required,minSize[4]]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('linkedin'); ?>
                </div>


            </div>

            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

      </div>
    </div>
<!-- /////////////////////////////////////////////////////////////////// -->

<div class="col-md-6">

</div>
<div class="col-md-6"></div>

  </div>


      <!-- /.box -->

        <div class="row">
         <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" value="submit" name="submit" class="btn btn-primary  btn-sm"><i class="fa fa-plus"> </i> Add Record</button>
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
  function imageTypeValidation(field, rules, i, options)
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
