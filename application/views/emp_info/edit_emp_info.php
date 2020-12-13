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
    <?php echo form_open_multipart('emp_info/edit_emp_info', 'id="formID"'); ?>

<!--      <form id="formID" method="POST" action="" enctype="multipart/form-data"> -->
    <!-- Main content -->
    <section class="content">

      <div class="row">


<div class="col-md-12">

  <!-- personal info start -->
  <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo ucwords('employee Information'); ?></h3>
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
            <div class="col-md-6">
              <div class="form-group">
                  <label><?php echo $label = ucwords(str_replace('_', ' ', 'grantee_name')); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>

                  <input type="text" autocomplete="off" value="<?php echo $all['grantee_name']; ?>" name="grantee_name" id="grantee_name" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('grantee_name'); ?>
                </div>
                <input type="hidden" name="id" id="id" value="<?php echo $all['id']; ?>">
                <div class="form-group">
                  <label><?php echo $label = ucwords(str_replace('_', ' ', 'father_name')); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>

                  <input type="text" autocomplete="off" value="<?php echo $all['father_name']; ?>" name="father_name" id="father_name" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('father_name'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords(str_replace('_', ' ', 'contact_no')); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-mobile"></i>
                  </div>

                  <input type="text" autocomplete="off" value="<?php echo $all['contact_no']; ?>" name="contact_no" id="contact_no" class="form-control validate[required,minSize[3],custom[number]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('contact_no'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('marital status'); ?>:</label>
                  <br>
                  <input <?php if ($all['marital_status'] == 'married') {echo 'checked="checked"';}?> type="radio" class="validate[required]" name="marital_status" id="marital_status" value="married"> Married
                  <input <?php if ($all['marital_status'] == 'unmarried') {echo 'checked="checked"';}?> type="radio" class="validate[required]" name="marital_status" id="marital_status" value="unmarried"> Unmarried
                  <?php echo form_error('marital_status'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords(str_replace('_', ' ', 'cnic_no')); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-id-card"></i>
                  </div>

                  <input type="text" autocomplete="off" value="<?php echo $all['cnic_no']; ?>" name="cnic_no" id="cnic_no" class="form-control validate[required,minSize[13],maxSize[13],custom[number]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('cnic_no'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords(str_replace('_', ' ', 'Date of birth')); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <?php $dob = date('d-m-Y', strtotime($all['dob']));?>

                  <input type="text" autocomplete="off" readonly value="<?php echo $dob; ?>" name="dob" id="dob" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('dob'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('status') ?>:</label>
                  <div class="input-group">
                  <!-- <div class="input-group-addon">
                    <i class="fa fa-check"></i>
                  </div> -->
                    <input <?php if ($all['status'] == '1') {echo 'checked="checked"';}?> type="radio" name="status" value="1"> Active
                    <input <?php if ($all['status'] == '0') {echo 'checked="checked"';}?> type="radio" name="status" value="0"> Inactive

                </div><?php echo form_error('status'); ?>
                </div>

            </div>

            <div class="col-md-6">

              <div class="form-group">
                  <label><?php echo $label = ucwords(str_replace('_', ' ', 'personnel_no')); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-id-card"></i>
                  </div>

                  <input type="text" autocomplete="off" value="<?php echo $all['personnel_no']; ?>" name="personnel_no" id="personnel_no" class="form-control validate[minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('personnel_no'); ?>
                </div>



                <div class="form-group">
                  <label><?php echo $label = ucwords(str_replace('_', ' ', 'department')); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-industry"></i>
                  </div>

                  <select  name="tbl_department_id" id="tbl_department_id" class="form-control select2 validate[required]">
                    <option value="">Select Department</option>

                    <?php foreach ($department as $departmentInfo): ?>
                      <option <?php if ($all['tbl_department_id'] == $departmentInfo['id']) {echo 'selected="selected"';}?> value="<?php echo $departmentInfo['id']; ?>"><?php echo $departmentInfo['name']; ?></option>
                    <?php endforeach;?>
                  </select>
                </div><?php echo form_error('tbl_department_id'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords(str_replace('_', ' ', 'post')); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-tasks"></i>
                  </div>

                  <select  name="tbl_post_id" id="tbl_post_id" class="form-control select2 validate[required]">
                    <option value="">Select Post</option>

                    <?php foreach ($post as $postInfo): ?>
                      <option <?php if ($all['tbl_post_id'] == $postInfo['id']) {echo 'selected="selected"';}?> value="<?php echo $postInfo['id']; ?>"><?php echo $postInfo['name']; ?></option>
                    <?php endforeach;?>
                  </select>
                </div><?php echo form_error('tbl_post_id'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords(str_replace('_', ' ', 'pay_scale')); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-balance-scale"></i>
                  </div>
                  <input type="hidden" name="pay_scale_id" id="pay_scale_id" value="<?php echo $all['pay_scale_id']; ?>">
                  <input type="text" readonly autocomplete="off" value="<?php echo $all['pay_scale']; ?>" name="pay_scale" id="pay_scale" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('pay_scale'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords('district'); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-building"></i>
                  </div>

                  <select  name="tbl_district_id" id="tbl_district_id" class="form-control select2 validate[required]">
                    <option value="">Select District</option>

                    <?php foreach ($district as $districtInfo): ?>
                      <option <?php if ($all['tbl_district_id'] == $districtInfo['id']) {echo 'selected="selected"';}?> value="<?php echo $districtInfo['id']; ?>"><?php echo $districtInfo['name']; ?></option>
                    <?php endforeach;?>
                  </select>
                </div><?php echo form_error('tbl_district_id'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords(str_replace('_', ' ', 'office_address')); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                  </div>

                  <textarea name="office_address" id="office_address" class="form-control validate[required,minSize[3]"><?php echo $all['office_address']; ?></textarea>
                </div><?php echo form_error('office_address'); ?>
                </div>

                <div class="form-group">
                  <label><?php echo $label = ucwords(str_replace('_', ' ', 'other_address')); ?>:</label>
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                  </div>

                  <textarea name="other_address" id="other_address" class="form-control validate[required,minSize[3]"><?php echo $all['other_address']; ?></textarea>
                </div><?php echo form_error('other_address'); ?>
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



  </div>

      <!-- /.box -->

        <div class="row">
         <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" value="submit" name="submit" class="btn btn-primary  btn-sm"><i class="fa fa-refresh"> </i> Update Record</button>
    <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-info  btn-sm" type="button"> <i class="fa fa-chevron-left"> </i> Cancel/Back</a>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
  </form>

    <!-- /.content -->
  </div>

<script type="text/javascript">

  $(document).ready(function() {
        $('select[id="tbl_post_id"]').on('change', function() {
          var base_url = "<?php echo base_url(); ?>";
          var tbl_post_id = $('#tbl_post_id').val();
            if(tbl_post_id) {
                $.ajax({
                    url: base_url +'emp_info/fetchDataPayScale/'+tbl_post_id,

                    type: "post",
                    dataType: "json",
                    success:function(data) {
                        $('[name="pay_scale"]').val(data.pay_scale_name);
                        $('[name="pay_scale_id"]').val(data.payscaleid);
                    }
                });
            }else{
                $('select[id="pay_scale"]').empty();
            }
        });
    });
$(function () {
        $('#dob').datetimepicker({
            useCurrent: false,
            format:"DD-MM-YYYY",
            showTodayButton:true,
            ignoreReadonly:true
        });

    });

</script>