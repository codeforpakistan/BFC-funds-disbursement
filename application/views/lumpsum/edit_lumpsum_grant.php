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
    <?php echo form_open_multipart('lumpsum/edit_lumpsum_grant/', 'id="formID"'); ?>

    <!--      <form id="formID" method="POST" action="" enctype="multipart/form-data"> -->
    <!-- Main content -->
    <section class="content">

        <div class="row">


            <div class="col-md-12">

                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo ucwords('Lumpsum Information'); ?></h3>
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
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'employee')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>

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

                                    </div><?php echo form_error('pay_scale'); ?>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'govt_employee_name')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo $all['gov_emp_name']; ?>" name="gov_emp_name" id="gov_emp_name" class="form-control validate[required,minSize[1]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('gov_emp_name'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'wife')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-industry"></i>
                                        </div>

                                        <input type="number" autocomplete="off" value="<?php echo $all['wife']; ?>" name="wife" id="wife" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('wife'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'son')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>

                                        <input type="number" autocomplete="off" value="<?php echo $all['son']; ?>" name="son" id="son" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('son'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'daughter')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>

                                        <input type="number" autocomplete="off" value="<?php echo $all['daughter']; ?>" name="daughter" id="daughter" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('daughter'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'grantee_type')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <select name="tbl_grantee_type_id" id="tbl_grantee_type_id" class="form-control select2 validate[required]">
                                            <option value="">Select Grantee Type</option>
                                            <?php foreach ($grantees as $grantee) : ?>
                                                <option value="<?php echo $grantee['id']; ?>" <?php if($all['tbl_grantee_type_id'] == $grantee['id']) { echo 'selected'; } ?>><?php echo $grantee['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div><?php echo form_error('tbl_grantee_type_id'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'record_no')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-industry"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo $all['record_no']; ?>" name="record_no" id="record_no" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('record_no'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'record_no_year')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-industry"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo $all['record_no_year']; ?>" name="record_no_year" id="record_no_year" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('record_no_year'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Date of appointment')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="date" onchange="getServiceLength()" autocomplete="off" value="<?php echo $all['doa']; ?>" name="doa" id="doa" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('doa'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Date of retirement')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="date"  onchange="getServiceLength()" autocomplete="off" value="<?php echo $all['dor']; ?>" name="dor" id="dor" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('dor'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'length of service')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo $all['los']; ?>" name="los" id="los" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('los'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'dept_letter_no')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo $all['dept_letter_no']; ?>" name="dept_letter_no" id="dept_letter_no" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('dept_letter_no'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'dept_letter_no_date')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo $all['dept_letter_no_date']; ?>" name="dept_letter_no_date" id="dept_letter_no_date" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('dept_letter_no_date'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'grant_amount')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calculator"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo $all['grant_amount']; ?>" name="grant_amount" id="grant_amount" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
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

                                        <input type="text" autocomplete="off" value="<?php echo $all['deduction']; ?>" name="deduction" id="deduction" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('deduction'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'net_amount')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo $all['net_amount']; ?>" name="net_amount" id="net_amount" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('net_amount'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'succession')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo $all['succession']; ?>" name="succession" id="succession" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('succession'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'case_status')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>

                                        <select name="tbl_case_status_id" id="tbl_case_status_id" class="form-control select2 validate[required]">
                                            <option value="">Select Case Status</option>
                                            <?php foreach ($cases as $case) : ?>
                                                <option value="<?php echo $case['id']; ?>" <?php if($all['tbl_case_status_id'] == $case['id']) { echo 'selected'; } ?>><?php echo $case['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div><?php echo form_error('tbl_case_status_id'); ?>
                                </div>
                            </div>
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
                                                <option value="<?php echo $payment_mode['id']; ?>" <?php if($all['tbl_payment_mode_id'] == $payment_mode['id']) { echo 'selected'; } ?>><?php echo $payment_mode['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div><?php echo form_error('tbl_payment_mode_id'); ?>
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
                                            <?php foreach ($banks as $bank) : ?>
                                                <option value="<?php echo $bank['id']; ?>" <?php if($all['tbl_list_bank_branches_id'] == $bank['id']) { echo 'selected'; } ?>><?php echo $bank['name']; ?> (<?php echo $bank['branch_code']; ?>)</option>
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
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'bank_verification')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['bank_verification'] == 'No') { echo 'checked'; } ?> name="bank_verification" id="bank_verification" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['bank_verification'] == 'Yes') { echo 'checked'; } ?> name="bank_verification" id="bank_verification" value="Yes"> Yes
                                    <?php echo form_error('bank_verification'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'sign_of_applicant')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['sign_of_applicant'] == 'No') { echo 'checked'; } ?> name="sign_of_applicant" id="sign_of_applicant" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['sign_of_applicant'] == 'Yes') { echo 'checked'; } ?> name="sign_of_applicant" id="sign_of_applicant" value="Yes"> Yes
                                    <?php echo form_error('sign_of_applicant'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 's_n_office_dept_seal')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]"  <?php if($all['s_n_office_dept_seal'] == 'No') { echo 'checked'; } ?> name="s_n_office_dept_seal" id="s_n_office_dept_seal" value="No"> No
                                    <input type="radio" class="validate[required]"  <?php if($all['s_n_office_dept_seal'] == 'Yes') { echo 'checked'; } ?> name="s_n_office_dept_seal" id="s_n_office_dept_seal" value="Yes"> Yes
                                    <?php echo form_error('s_n_office_dept_seal'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 's_n_dept_admin_seal')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['s_n_dept_admin_seal'] == 'No') { echo 'checked'; } ?> name="s_n_dept_admin_seal" id="s_n_dept_admin_seal" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['s_n_dept_admin_seal'] == 'Yes') { echo 'checked'; } ?> name="s_n_dept_admin_seal" id="s_n_dept_admin_seal" value="Yes"> Yes
                                    <?php echo form_error('s_n_dept_admin_seal'); ?>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'cnic_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['cnic_attach'] == 'No') { echo 'checked'; } ?>  name="cnic_attach" id="cnic_attach" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['cnic_attach'] == 'Yes') { echo 'checked'; } ?>  name="cnic_attach" id="cnic_attach" value="Yes"> Yes
                                    <?php echo form_error('cnic_attach'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'cnic_widow_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['cnic_widow_attach'] == 'No') { echo 'checked'; } ?> name="cnic_widow_attach" id="cnic_widow_attach" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['cnic_widow_attach'] == 'Yes') { echo 'checked'; } ?> name="cnic_widow_attach" id="cnic_widow_attach" value="Yes"> Yes
                                    <?php echo form_error('cnic_widow_attach'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'dc_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['dc_attach'] == 'No') { echo 'checked'; } ?>  name="dc_attach" id="dc_attach" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['dc_attach'] == 'Yes') { echo 'checked'; } ?> name="dc_attach" id="dc_attach" value="Yes"> Yes
                                    <?php echo form_error('dc_attach'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'family_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['family_attach'] == 'No') { echo 'checked'; } ?> name="family_attach" id="family_attach" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['family_attach'] == 'Yes') { echo 'checked'; } ?> name="family_attach" id="family_attach" value="Yes"> Yes
                                    <?php echo form_error('family_attach'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'payroll_lpc_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]"  <?php if($all['payroll_lpc_attach'] == 'No') { echo 'checked'; } ?> name="payroll_lpc_attach" id="payroll_lpc_attach" value="No"> No
                                    <input type="radio" class="validate[required]"  <?php if($all['payroll_lpc_attach'] == 'Yes') { echo 'checked'; } ?> name="payroll_lpc_attach" id="payroll_lpc_attach" value="Yes"> Yes
                                    <?php echo form_error('payroll_lpc_attach'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'dob_ac_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['dob_ac_attach'] == 'No') { echo 'checked'; } ?> name="dob_ac_attach" id="dob_ac_attach" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['dob_ac_attach'] == 'Yes') { echo 'checked'; } ?> name="dob_ac_attach" id="dob_ac_attach" value="Yes"> Yes
                                    <?php echo form_error('dob_ac_attach'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'single_widow_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['single_widow_attach'] == 'No') { echo 'checked'; } ?> name="single_widow_attach" id="single_widow_attach" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['single_widow_attach'] == 'Yes') { echo 'checked'; } ?> name="single_widow_attach" id="single_widow_attach" value="Yes"> Yes
                                    <?php echo form_error('single_widow_attach'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'no_marriage_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['no_marriage_attach'] == 'No') { echo 'checked'; } ?> name="no_marriage_attach" id="no_marriage_attach" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['no_marriage_attach'] == 'Yes') { echo 'checked'; } ?> name="no_marriage_attach" id="no_marriage_attach" value="Yes"> Yes
                                    <?php echo form_error('no_marriage_attach'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'disc_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['disc_attach'] == 'No') { echo 'checked'; } ?>  name="disc_attach" id="disc_attach" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['disc_attach'] == 'Yes') { echo 'checked'; } ?>  name="disc_attach" id="disc_attach" value="Yes"> Yes
                                    <?php echo form_error('disc_attach'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'undertaking')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['undertaking'] == 'No') { echo 'checked'; } ?> name="undertaking" id="undertaking" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['undertaking'] == 'Yes') { echo 'checked'; } ?> name="undertaking" id="undertaking" value="Yes"> Yes
                                    <?php echo form_error('undertaking'); ?>
                                </div>
                            </div>
                        </div>
 
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'boards_approval')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" <?php if($all['boards_approval'] == 'No') { echo 'checked'; } ?> name="boards_approval" id="boards_approval" value="No"> No
                                    <input type="radio" class="validate[required]" <?php if($all['boards_approval'] == 'Yes') { echo 'checked'; } ?> name="boards_approval" id="boards_approval" value="Yes"> Yes
                                    <?php echo form_error('boards_approval'); ?>
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
                <input type="hidden" name="id" id="id" value="<?php echo $all['id']; ?>">
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

    function getServiceLength() {
        
        startDate = new Date($('#doa').val());
        endDate = new Date($('#dor').val());

        var diff_date =  endDate - startDate;
        
        var years = Math.floor(diff_date/31536000000);
        var months = Math.floor((diff_date % 31536000000)/2628000000);
        var days = Math.floor(((diff_date % 31536000000) % 2628000000)/86400000);
     

        result = years+" year(s) "+months+" month(s) "+days+" and day(s)";

        if(result == 'NaN year(s) NaN month(s) NaN and day(s)'){
            $('#los').val(''); 
        } else {
            $('#los').val(result); 
        }

        
    }

    $(function() {

        $('#tbl_emp_info_id').on('change', function() {
            var base_url = "<?php echo base_url(); ?>";
            var tbl_emp_info_id = $('#tbl_emp_info_id').val(); 
            if(tbl_emp_info_id) {
                $.ajax({
                    url: base_url +'emp_info/getData/'+tbl_emp_info_id,

                    type: "post",
                    dataType: "json",
                    success:function(data) { 
                        $('#pay_scale_id').val(data.pay_scale_id);
                        $('#pay_scale').val(data.pay_scale);
                        $('#doa').val('');
                        $('#dor').val('');   
                        $('#grant_amount').val('');
                        $('#deduction').val('');
                        $('#net_amount').val('');
                    }
                });
            }else{
                $('#pay_scale_id').val('');
                $('#pay_scale').val(''); 
                $('#doa').val('');
                $('#dor').val('');   
                $('#grant_amount').val('');
                $('#deduction').val('');
                $('#net_amount').val(''); 
            }
        });

        $('#dor').on('change', function() {
            var base_url = "<?php echo base_url(); ?>"; 
            dateOfRetirement = $('#dor').val(); 
            empScale_ID = $('#pay_scale_id').val();
            var formData = { dor: dateOfRetirement, empScaleID: empScale_ID };
            if(empScale_ID == ''){
                alert('Please select employee to continue');
             
                $('#doa').val('');
                $('#dor').val('');   
                $('#grant_amount').val('');
                $('#deduction').val('');
                $('#net_amount').val(''); 
            }
            else {
                if(dateOfRetirement) { 
                    $.ajax({
                        //+dateOfRetirement
                        url: base_url +'lumpsum/getAmountData/',  
                        type: "post",
                        data: formData,
                        dataType: "json",
                        success:function(data) { 
                            //alert('data = ' + JSON.stringify(data));
                            //alert(JSON.stringify(data));
                            //deduction net_amount
                            //alert(data.amount);
                            $('#grant_amount').val(data.amount);
                            $('#deduction').val(0);
                            $('#net_amount').val(data.amount);   
                        }
                    });

                } else { 
                    $('#doa').val('');
                    $('#dor').val('');   
                    $('#grant_amount').val('');
                    $('#deduction').val('');
                    $('#net_amount').val(''); 
                }
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

        // $('#doa').datetimepicker({
        //     useCurrent: false,
        //     format: "DD-MM-YYYY",
        //     showTodayButton: true,
        //     ignoreReadonly: true
        // });
        // $('#dor').datetimepicker({
        //     useCurrent: false,
        //     format: "DD-MM-YYYY",
        //     showTodayButton: true,
        //     ignoreReadonly: true
        // });
        $('#dept_letter_no_date').datetimepicker({
            useCurrent: false,
            format: "DD-MM-YYYY",
            showTodayButton: true,
            ignoreReadonly: true
        });
    });
</script>