<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <?php $this->load->view('templates/alerts'); ?>

        <h1>
            <?php echo ucwords(str_replace('_', ' ', $page_title)); ?>
            <small><?php echo ucwords(str_replace('_', ' ', $description)); ?></small>
        </h1>

    </section>

    <!-- Main content -->
    <?php validation_errors(); ?>
    <?php echo form_open_multipart('add_emp_info', 'id="formID"'); ?>

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
                            <?php /*?><button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button><?php */ ?>
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

                                        <input type="text" autocomplete="off" value="<?php echo set_value('grantee_name'); ?>" name="grantee_name" id="grantee_name" class="form-control validate[required,minSize[3]]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('grantee_name'); ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'father_name')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('father_name'); ?>" name="father_name" id="father_name" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('father_name'); ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'contact_no')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-mobile"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('contact_no'); ?>" name="contact_no" id="contact_no" maxlength="11" class="form-control validate[required,minSize[3],custom[number]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('contact_no'); ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo $label = ucwords('marital status'); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="marital_status" id="marital_status" value="married"> Married
                                    <input type="radio" class="validate[required]" name="marital_status" id="marital_status" value="unmarried"> Unmarried
                                    <?php echo form_error('marital_status'); ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'cnic_no')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-id-card"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('cnic_no'); ?>" name="cnic_no" id="cnic_no" maxlength="13" class="form-control validate[required,minSize[13],maxSize[13],custom[number]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('cnic_no'); ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Date of birth')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" autocomplete="off" readonly value="<?php echo set_value('dob'); ?>" name="dob" id="dob" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('dob'); ?>
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

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'personnel_no')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-id-card"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('personnel_no'); ?>" name="personnel_no" id="personnel_no" class="form-control validate[minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('personnel_no'); ?>
                                </div>



                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'department')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-industry"></i>
                                        </div>

                                        <select name="tbl_department_id" id="tbl_department_id" class="form-control select2 validate[required]">
                                            <option value="">Select Department</option>

                                            <?php foreach ($department as $departmentInfo) : ?>
                                                <option value="<?php echo $departmentInfo['id']; ?>" <?php if (set_value('tbl_department_id') == $departmentInfo['id']) {
                                                                                                            echo 'selected';
                                                                                                        } ?>><?php echo $departmentInfo['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div><?php echo form_error('tbl_department_id'); ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'post')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-tasks"></i>
                                        </div>

                                        <select name="tbl_post_id" id="tbl_post_id" class="form-control select2 validate[required]">
                                            <option value="">Select Post</option>

                                            <?php foreach ($post as $postInfo) : ?>
                                                <option value="<?php echo $postInfo['id']; ?>" <? if(set_value('tbl_post_id')==$postInfo['id']) { echo 'selected' ; }?>><?php echo $postInfo['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div><?php echo form_error('tbl_post_id'); ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'pay_scale')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-balance-scale"></i>
                                        </div>
                                        <input type="hidden" name="pay_scale_id" id="pay_scale_id" value="<?php echo set_value('pay_scale_id'); ?>">
                                        <input type="text" readonly autocomplete="off" value="<?php echo set_value('pay_scale'); ?>" name="pay_scale" id="pay_scale" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('pay_scale'); ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo $label = ucwords('district'); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                        </div>

                                        <select name="tbl_district_id" id="tbl_district_id" class="form-control select2 validate[required]">
                                            <option value="">Select District</option>

                                            <?php foreach ($district as $districtInfo) : ?>
                                                <option value="<?php echo $districtInfo['id']; ?>" <? if(set_value('tbl_district_id')==$districtInfo['id']) { echo 'selected' ; }?>><?php echo $districtInfo['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div><?php echo form_error('tbl_district_id'); ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'office_address')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>

                                        <textarea name="office_address" id="office_address" class="form-control validate[required,minSize[3]"><?php echo set_value('office_address'); ?></textarea>
                                    </div><?php echo form_error('office_address'); ?>
                                </div>

                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'other_address')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>

                                        <textarea name="other_address" id="other_address" class="form-control validate[required,minSize[3]"><?php echo set_value('other_address'); ?></textarea>
                                    </div><?php echo form_error('other_address'); ?>
                                </div>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>

                </div>
                <!-- personal info end -->


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

<script type="text/javascript">
    $(document).ready(function() {
        $('select[id="tbl_post_id"]').on('change', function() {
            var base_url = "<?php echo base_url(); ?>";
            var tbl_post_id = $('#tbl_post_id').val();
            if (tbl_post_id) {
                $.ajax({
                    url: base_url + 'emp_info/fetchDataPayScale/' + tbl_post_id,

                    type: "post",
                    dataType: "json",
                    success: function(data) {
                        //alert(JSON.stringify(data));
                        $('[name="pay_scale"]').val(data.pay_scale_name);
                        $('[name="pay_scale_id"]').val(data.payscaleid);
                    }
                });
            } else {
                $('select[id="pay_scale"]').empty();
            }
        });
    });
    $(function() {
        $('#dob').datetimepicker({
            useCurrent: false,
            format: "DD-MM-YYYY",
            showTodayButton: true,
            ignoreReadonly: true
        });

    });
</script>