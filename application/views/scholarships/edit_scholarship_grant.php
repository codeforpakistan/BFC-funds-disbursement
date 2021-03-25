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
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('scholarship/edit_scholarship_grant/'.$id, 'id="formID"'); ?>

    <!--      <form id="formID" method="POST" action="" enctype="multipart/form-data"> -->
    <!-- Main content -->
    <section class="content">

        <div class="row">


            <div class="col-md-12">
 
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo ucwords('Scholarship Information'); ?></h3>
                        <br><i style="color: #9c0404;">use NA or not applicable, if information is not available</i>
                        <div class="box-tools pull-right">
                            <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
                            <?php /*?><button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button><?php */ ?>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">

                                <?php //print_r($all); ?>


                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'employee')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="hidden" name="id" id="id" value="<?php echo $all['id']; ?>">
                                        <input type="hidden" name="app_no" id="app_no" value="<?php echo $all['application_no']; ?>">
                                        
                                        <select name="tbl_emp_info_id" id="tbl_emp_info_id" class="form-control select2 validate[required]">
                                            <option value="">Select Employee</option> 
                                            <?php foreach ($employees as $employeeInfo) : ?>
                                                <option value="<?php echo $employeeInfo['id']; ?>" <?php if($all['tbl_emp_info_id'] == $employeeInfo['id']) { echo 'selected'; } ?>><?php echo $employeeInfo['grantee_name']; ?> - <?php echo $employeeInfo['cnic_no']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div><?php echo form_error('tbl_emp_info_id'); ?>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Pay_Scale')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                         
                                        <input type="text" name="pay_scale" id="pay_scale" value="<?php echo $emp_info->pay_scale;?>" class="form-control" readonly>
                                        <input type="hidden" id="pay_scale_id" name="pay_scale_id" value="<?php echo $emp_info->pay_scale_id;?>">
                                        <input type="hidden" name="tbl_district_id" id="tbl_district_id" value="<?php echo $emp_info->tbl_district_id;?>">

                                    </div><?php echo form_error('pay_scale'); ?>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'department')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-industry"></i>
                                        </div>

                                        <select name="tbl_department_id" id="tbl_department_id" class="form-control select2 validate[required]">
                                            <option value="">Select Department</option> 
                                            <?php foreach ($department as $departmentInfo) : ?>
                                                <option value="<?php echo $departmentInfo['id']; ?>" <?php if($emp_info->tbl_department_id == $departmentInfo['id']) { echo 'selected'; } ?>><?php echo $departmentInfo['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div><?php echo form_error('tbl_department_id'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'duty_place')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-industry"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo $all['duty_place']; ?>" name="duty_place" id="duty_place" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('duty_place'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'student_name')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-graduation-cap"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo $all['std_name']; ?>" name="std_name" id="std_name" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('std_name'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'class_pass')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <select name="class_pass" id="class_pass" class="form-control select2 validate[required]">
                                            <option value="">Select Class</option> 
                                            <?php foreach ($scholarship_classes as $classInfo) : ?>
                                                <option value="<?php echo $classInfo['id']; ?>" <?php if($all['class_pass'] == $classInfo['id']) { echo 'selected'; } ?>><?php echo $classInfo['class_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <!--<input type="text" autocomplete="off" value="<?php //echo set_value('class_pass'); ?>" name="class_pass" id="class_pass" class="form-control validate[required]" placeholder="Enter <?php //echo $label; ?>" />-->
                                    </div><?php echo form_error('class_pass'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'examination_pass')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo $all['exam_pass']; ?>" name="exam_pass" id="exam_pass" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('exam_pass'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'result_date')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" autocomplete="off" readonly value="<?php echo $all['result_date']; ?>" name="result_date" id="result_date" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('result_date'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">  
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'marks_obtained')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calculator"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo $all['mo']; ?>" name="mo" id="mo" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('mo'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'total_marks')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calculator"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo $all['tm']; ?>" name="tm" id="tm" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('tm'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'percentage')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-percent"></i>
                                        </div>

                                        <input type="text"  autocomplete="off" value="<?php echo $all['percentage']; ?>" name="percentage" id="percentage" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('percentage'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'institute_name')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo $all['institute_name']; ?>" name="institute_name" id="institute_name" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('institute_name'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">  
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'institute_address')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo $all['institute_add']; ?>" name="institute_add" id="institute_add" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('institute_add'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'grant_amount')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>

                                        <input type="text" autocomplete="off" readonly value="<?php echo $all['grant_amount']; ?>" name="grant_amount" id="grant_amount" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('grant_amount'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">   
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'deduction')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo  $all['deduction']; ?>" name="deduction" id="deduction" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('deduction'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'net_amount')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>

                                        <input type="text" autocomplete="off" readonly value="<?php echo  $all['net_amount']; ?>" name="net_amount" id="net_amount" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('net_amount'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                             
                            <div class="col-md-6">   
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'payment_mode')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>

                                        <select name="tbl_payment_mode_id" id="tbl_payment_mode_id" class="form-control select2 validate[required]">
                                            <option value="">Select Payment mode</option> 
                                            <?php foreach ($payment_modes as $payment_mode) : ?>
                                                <option value="<?php echo $payment_mode['id']; ?>" <?php if($payment_mode['id'] == $all['tbl_payment_mode_id']) { echo 'selected'; }?>><?php echo $payment_mode['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                       
                                    </div><?php echo form_error('tbl_payment_mode_id'); ?>
                                </div>
                            </div>
                        
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'bank_type')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-bank"></i>
                                        </div>
                                        <select name="bank_type_id" id="bank_type_id" class="form-control select2 validate[required]">
                                            <option value="">Select Bank Type</option> 
                                            <?php foreach ($bank_types as $bank) : ?>
                                                <option value="<?php echo $bank['id']; ?>" <?php if($bank['id'] == $all['tbl_banks_id']) { echo 'selected'; }?>><?php echo $bank['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select> 
                                    </div><?php echo form_error('bank_type_id'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'bank_branches')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-bank"></i>
                                        </div>
                                        <select name="tbl_list_bank_branches_id" id="tbl_list_bank_branches_id" class="form-control select2 validate[required]">
                                            <option value="">Select Bank</option> 
                                            <?php foreach ($banks as $branch) : ?>
                                                <option value="<?php echo $branch['id']; ?>" <?php if($branch['id'] == $all['tbl_list_bank_branches_id']) { echo 'selected'; }?>><?php echo $branch['name']; ?> (<?php echo $branch['branch_code']; ?>)</option>
                                            <?php endforeach; ?>
                                        </select>
                                        
                                    </div><?php echo form_error('tbl_list_bank_branches_id'); ?>
                                </div>
                            </div>
                         
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'account_no')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa fa-bank"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo $all['account_no']; ?>" name="account_no" id="account_no" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('account_no'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Signature of Student')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['std_signature'] == 'No') { echo 'checked'; } ?> name="std_signature" id="std_signature" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['std_signature'] == 'Yes') { echo 'checked'; } ?> name="std_signature" id="std_signature" value="Yes"> Yes
                                    <?php echo form_error('std_signature'); ?>
                                </div>
                            </div> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Signature of the Govt. Servant')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['gov_servent_sign'] == 'No') { echo 'checked'; } ?> name="gov_servent_sign" id="gov_servent_sign" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['gov_servent_sign'] == 'Yes') { echo 'checked'; } ?> name="gov_servent_sign" id="gov_servent_sign" value="Yes"> Yes
                                    <?php echo form_error('gov_servent_sign'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Official Seal of Institute')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['seal_institute'] == 'No') { echo 'checked'; } ?> name="seal_institute" id="seal_institute" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['seal_institute'] == 'Yes') { echo 'checked'; } ?> name="seal_institute" id="seal_institute" value="Yes"> Yes
                                    <?php echo form_error('seal_institute'); ?>
                                </div>
                            </div>  
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Signature of Head of Institute')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['head_institute'] == 'No') { echo 'checked'; } ?> name="head_institute" id="head_institute" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['head_institute'] == 'Yes') { echo 'checked'; } ?> name="head_institute" id="head_institute" value="Yes"> Yes
                                    <?php echo form_error('head_institute'); ?>
                                </div>
                            </div>
                        </div>


                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Official Seal HOD')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['office_seal_hod'] == 'No') { echo 'checked'; } ?> name="office_seal_hod" id="office_seal_hod" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['office_seal_hod'] == 'Yes') { echo 'checked'; } ?> name="office_seal_hod" id="office_seal_hod" value="Yes"> Yes
                                    <?php echo form_error('office_seal_hod'); ?>
                                </div>
                            </div>  

                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Signature of Head of Department')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['hod_sign'] == 'No') { echo 'checked'; } ?> name="hod_sign" id="hod_sign" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['hod_sign'] == 'Yes') { echo 'checked'; } ?> name="hod_sign" id="hod_sign" value="Yes"> Yes
                                    <?php echo form_error('hod_sign'); ?>
                                </div>
                            </div>  

                        </div>


                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Bank Stamp with Branch Code')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['bank_verification'] == 'No') { echo 'checked'; } ?> name="bank_verification" id="bank_verification" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['bank_verification'] == 'Yes') { echo 'checked'; } ?> name="bank_verification" id="bank_verification" value="Yes"> Yes
                                    <?php echo form_error('bank_verification'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'payroll_lpc_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['payroll_lpc_attach'] == 'No') { echo 'checked'; } ?> name="payroll_lpc_attach" id="payroll_lpc_attach" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['payroll_lpc_attach'] == 'Yes') { echo 'checked'; } ?> name="payroll_lpc_attach" id="payroll_lpc_attach" value="Yes"> Yes
                                    <?php echo form_error('payroll_lpc_attach'); ?>
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'dmc_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['dmc_attach'] == 'No') { echo 'checked'; } ?> name="dmc_attach" id="dmc_attach" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['dmc_attach'] == 'Yes') { echo 'checked'; } ?> name="dmc_attach" id="dmc_attach" value="Yes"> Yes
                                    <?php echo form_error('dmc_attach'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'CNIC of Govt: Servant')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['cnic_attach'] == 'No') { echo 'checked'; } ?> name="cnic_attach" id="cnic_attach" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['cnic_attach'] == 'Yes') { echo 'checked'; } ?> name="cnic_attach" id="cnic_attach" value="Yes"> Yes
                                    <?php echo form_error('cnic_attach'); ?>
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Grade Conversion / Equivalency / Percentage Certificate')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['grade_attach'] == 'No') { echo 'checked'; } ?> name="grade_attach" id="grade_attach" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['grade_attach'] == 'Yes') { echo 'checked'; } ?> name="grade_attach" id="grade_attach" value="Yes"> Yes
                                    <?php echo form_error('grade_attach'); ?>
                                </div>
                            </div> 
                        </div>
                         
  
                        <!-- /.row -->
                    </div>

                </div>
               

            </div>



        </div>

        <!-- /.box -->

        <div class="row">
            <!-- /.col -->
            <div class="col-xs-6">
                <button type="submit" value="submit" name="submit" class="btn btn-primary  btn-sm"><i class="fa fa-edit"> </i> Update Record</button>
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
 
    $(function() {
        $('#result_date').datetimepicker({
            useCurrent: false,
            format: "DD-MM-YYYY",
            showTodayButton: true,
            ignoreReadonly: true
        }); 
    });

    $(document).ready(function() {
        //alert('i m here');
        $('#tbl_emp_info_id').on('change', function() {
            var base_url = "<?php echo base_url(); ?>";
            var tbl_emp_info_id = $('#tbl_emp_info_id').val();
            //alert('empID = '+ tbl_emp_info_id);
            //alert(base_url +'emp_info/getRecordById/'+tbl_emp_info_id);
            if(tbl_emp_info_id) {
                $.ajax({
                    url: base_url +'emp_info/getData/'+tbl_emp_info_id,

                    type: "post",
                    dataType: "json",
                    success:function(data) {
                        //alert(data.tbl_department_id);
                        $('#tbl_department_id').val(data.tbl_department_id); 
                        $('#tbl_department_id').select2().trigger('change');
                        $('#pay_scale_id').val(data.pay_scale_id);
                        $('#pay_scale').val(data.pay_scale); 
                        $('#tbl_district_id').val(data.tbl_district_id); 

                    }
                });
            }else{
                $('#pay_scale_id').val('');
                $('#pay_scale').val(''); 
                $('select[id="tbl_department_id"]').empty();
            }
        });


        $('#class_pass').on('change', function() {
            var base_url = "<?php echo base_url(); ?>";
            var class_pass = $('#class_pass').val(); 
            if(class_pass) {
                $.ajax({
                    url: base_url +'scholarship/getAmountData/'+class_pass, 
                    type: "post",
                    dataType: "json",
                    success:function(data) { 
                        //deduction net_amount
                        $('#grant_amount').val(data.amount);
                        $('#deduction').val(0);
                        $('#net_amount').val(data.amount);   
                    }
                });
            }else{
                $('#grant_amount').empty();
            }
        });


        $('#deduction').on('keyup', function() {
            var base_url = "<?php echo base_url(); ?>";
            var deduction = $('#deduction').val(); 
            var grant_amount = $('#grant_amount').val();  

            if(deduction) {
                var net_amount = grant_amount-deduction;
                $('#net_amount').val(net_amount); 
            }else{
                $('#deduction').val(0);
            }
        });

        $('#mo, #tm').on('keyup', function() {
             
            var marksObtained = $('#mo').val(); 
            var totalMarks = $('#tm').val();  

            if(marksObtained != '' && totalMarks != '') {
                var percentage = marksObtained/totalMarks*100;
                $('#percentage').val(percentage.toFixed(2)); 
            }else{
                $('#percentage').val(0);
            }
        });


       

    });

</script> 

  
