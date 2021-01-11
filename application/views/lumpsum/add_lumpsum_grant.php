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
    <?php echo form_open_multipart('add_lumpsum_grant', 'id="formID"'); ?>

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
                                                <option value="<?php echo $employeeInfo['id']; ?>" <?php if($emp_info->id == $employeeInfo['id']) { echo 'selected'; } ?>><?php echo $employeeInfo['grantee_name']; ?> - <?php echo $employeeInfo['cnic_no']; ?></option>
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
                                        <input type="hidden" name="tbl_district_id" id="tbl_district_id" value="">
                                    </div><?php echo form_error('pay_scale'); ?>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php //echo $label = ucwords(str_replace('_', ' ', 'govt_employee_name')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php //echo set_value('gov_emp_name'); ?>" name="gov_emp_name" id="gov_emp_name" class="form-control validate[required,minSize[1]" placeholder="Enter <?php //echo $label; ?>" />
                                    </div><?php //echo form_error('gov_emp_name'); ?>
                                </div>
                            </div> -->

                            

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'wife / husband')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-industry"></i>
                                        </div>

                                        <input type="number" autocomplete="off" value="<?php echo set_value('wife'); ?>" name="wife" id="wife" class="form-control validate[required]" placeholder="0" />
                                    </div><?php echo form_error('wife'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'son(s)')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>

                                        <input type="number" autocomplete="off" value="<?php echo set_value('son'); ?>" name="son" id="son" class="form-control validate[required]" placeholder="0" />
                                    </div><?php echo form_error('son'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'daughter(s)')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>

                                        <input type="number" autocomplete="off" value="<?php echo set_value('daughter'); ?>" name="daughter" id="daughter" class="form-control validate[required]" placeholder="0" />
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
                                                <option value="<?php echo $grantee['id']; ?>"><?php echo $grantee['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div><?php echo form_error('tbl_grantee_type_id'); ?>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'grantee_name')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" autocomplete="off" value="<?php echo set_value('grantee_name'); ?>" name="grantee_name" id="grantee_name" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" /> 
                                    </div><?php echo form_error('grantee_name'); ?>
                                </div>
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'CNIC No. of Widow / Grantee')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" autocomplete="off" value="<?php echo set_value('cnic_grantee'); ?>" name="cnic_grantee" id="cnic_grantee" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" /> 
                                    </div><?php echo form_error('cnic_grantee'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Grantee Contact Number')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" autocomplete="off" value="<?php echo set_value('grantee_contact_no'); ?>" name="grantee_contact_no" id="grantee_contact_no" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" /> 
                                    </div><?php echo form_error('grantee_contact_no'); ?>
                                </div>
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

                                        <input type="text" autocomplete="off" value="<?php echo set_value('record_no'); ?>" name="record_no" id="record_no" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
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

                                        <input type="text" autocomplete="off" value="<?php echo set_value('record_no_year'); ?>" name="record_no_year" id="record_no_year" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
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
                                        <!-- onchange="getServiceLength()" -->
                                        <input type="text"  autocomplete="off" value="<?php echo set_value('doa'); ?>" name="doa" id="doa" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('doa'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Date of Death')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <!-- onchange="getServiceLength()" -->
                                        <input type="text" autocomplete="off" value="<?php echo set_value('dor'); ?>" name="dor" id="dor" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
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

                                        <input type="text" readonly autocomplete="off" value="<?php echo set_value('los'); ?>" name="los" id="los" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
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

                                        <input type="text" autocomplete="off" value="<?php echo set_value('dept_letter_no'); ?>" name="dept_letter_no" id="dept_letter_no" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
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

                                        <input type="text" autocomplete="off" value="<?php echo set_value('dept_letter_no_date'); ?>" name="dept_letter_no_date" id="dept_letter_no_date" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
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

                                        <input type="text" readonly autocomplete="off" value="<?php echo set_value('grant_amount'); ?>" name="grant_amount" id="grant_amount" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
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

                                        <input type="text" autocomplete="off" value="<?php echo set_value('deduction'); ?>" name="deduction" id="deduction" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
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

                                        <input type="text" readonly autocomplete="off" value="<?php echo set_value('net_amount'); ?>" name="net_amount" id="net_amount" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('net_amount'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php //echo $label = ucwords(str_replace('_', ' ', 'succession')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php //echo set_value('succession'); ?>" name="succession" id="succession" class="form-control validate[required]" placeholder="Enter <?php //echo $label; ?>" />
                                    </div><?php //echo form_error('succession'); ?>
                                </div>
                            </div>
                        </div> -->

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
                                                <option value="<?php echo $payment_mode['id']; ?>"><?php echo $payment_mode['name']; ?></option>
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
                                                <option value="<?php echo $bank['id']; ?>"><?php echo $bank['name']; ?></option>
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
                                            <option value="">Select Branch</option>  
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

                                        <input type="text" autocomplete="off" value="<?php echo set_value('account_no'); ?>" name="account_no" id="account_no" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('account_no'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'bank_verification')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="bank_verification" id="bank_verification" value="No"> No
                                    <input type="radio" class="validate[required]" name="bank_verification" id="bank_verification" value="Yes"> Yes
                                    <?php echo form_error('bank_verification'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'sign_of_applicant')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="sign_of_applicant" id="sign_of_applicant" value="No"> No
                                    <input type="radio" class="validate[required]" name="sign_of_applicant" id="sign_of_applicant" value="Yes"> Yes
                                    <?php echo form_error('sign_of_applicant'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Signature & Name of the Head of Department with Official Seal')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="s_n_office_dept_seal" id="s_n_office_dept_seal" value="No"> No
                                    <input type="radio" class="validate[required]" name="s_n_office_dept_seal" id="s_n_office_dept_seal" value="Yes"> Yes
                                    <?php echo form_error('s_n_office_dept_seal'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Signature & Name of the Head of Administrative Department with Official Seal')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="s_n_dept_admin_seal" id="s_n_dept_admin_seal" value="No"> No
                                    <input type="radio" class="validate[required]" name="s_n_dept_admin_seal" id="s_n_dept_admin_seal" value="Yes"> Yes
                                    <?php echo form_error('s_n_dept_admin_seal'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'CNIC of Govt: Servant')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="cnic_attach" id="cnic_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="cnic_attach" id="cnic_attach" value="Yes"> Yes
                                    <?php echo form_error('cnic_attach'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'CNIC of Widow / Grantee')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="cnic_widow_attach" id="cnic_widow_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="cnic_widow_attach" id="cnic_widow_attach" value="Yes"> Yes
                                    <?php echo form_error('cnic_widow_attach'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Death Certificate')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="dc_attach" id="dc_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="dc_attach" id="dc_attach" value="Yes"> Yes
                                    <?php echo form_error('dc_attach'); ?>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'List of Family Members')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="family_attach" id="family_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="family_attach" id="family_attach" value="Yes"> Yes
                                    <?php echo form_error('family_attach'); ?>
                                </div>
                            </div>  
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Pay Roll / LPC')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="payroll_lpc_attach" id="payroll_lpc_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="payroll_lpc_attach" id="payroll_lpc_attach" value="Yes"> Yes
                                    <?php echo form_error('payroll_lpc_attach'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Details of Bank A/C')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="dob_ac_attach" id="dob_ac_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="dob_ac_attach" id="dob_ac_attach" value="Yes"> Yes
                                    <?php echo form_error('dob_ac_attach'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Single Widow Certificate')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="single_widow_attach" id="single_widow_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="single_widow_attach" id="single_widow_attach" value="Yes"> Yes
                                    <?php echo form_error('single_widow_attach'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'No Marriage & Non-Separation Certificate')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="no_marriage_attach" id="no_marriage_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="no_marriage_attach" id="no_marriage_attach" value="Yes"> Yes
                                    <?php echo form_error('no_marriage_attach'); ?>
                                </div>
                            </div>
                        </div>
 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Death in Service Certificate')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="disc_attach" id="disc_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="disc_attach" id="disc_attach" value="Yes"> Yes
                                    <?php echo form_error('disc_attach'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'undertaking')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="undertaking" id="undertaking" value="No"> No
                                    <input type="radio" class="validate[required]" name="undertaking" id="undertaking" value="Yes"> Yes
                                    <?php echo form_error('undertaking'); ?>
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

    $('#bank_type_id').on('change', function() {
        var base_url = "<?php echo base_url(); ?>";
        var bank_type_id = $('#bank_type_id').val(); 
        if(tbl_emp_info_id) {
            $.ajax({
                url: base_url +'banks/get_branches/'+bank_type_id, 
                type: "post",
                dataType: "json",
                success:function(data) { 
                    $('#tbl_list_bank_branches_id').html(data); 
                }
            });
        }else{
            $('#tbl_list_bank_branches_id').html(data); 
        }
    });

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
                        $('#tbl_district_id').val(data.tbl_district_id); 
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
                $('#tbl_district_id').val('');  
                $('#doa').val('');
                $('#dor').val('');   
                $('#grant_amount').val('');
                $('#deduction').val('');
                $('#net_amount').val(''); 
            }
        });

        $('#doa, #dor ').on('focusout', function() {
            var base_url = "<?php echo base_url(); ?>"; 
            dateOfRetirement = $('#dor').val(); 
            empScale_ID = $('#pay_scale_id').val();
            var formData = { dor: dateOfRetirement, empScaleID: empScale_ID };
            //alert(formData);
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
                    getServiceLength();

                    $.ajax({
                        //+dateOfRetirement
                        url: base_url +'lumpsum/getAmountData/',  
                        type: "post",
                        data: formData,
                        dataType: "json",
                        success:function(data) { 
                            //alert('data = ' + JSON.stringify(data));
                            //console.log(JSON.stringify(data));
                            //deduction net_amount
                            //alert(data.amount);
                            $('#grant_amount').val(data.amount);
                            $('#deduction').val(0);
                            $('#net_amount').val(data.amount);   
                        }
                    });

                } 
                // else { 
                //     $('#doa').val('');
                //     $('#dor').val('');   
                //     $('#grant_amount').val('');
                //     $('#deduction').val('');
                //     $('#net_amount').val(''); 
                // }
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

        $('#doa').datetimepicker({
            useCurrent: false,
            format: "YYYY-MM-DD",
            showTodayButton: true,
            ignoreReadonly: true
        });
        $('#dor').datetimepicker({
            useCurrent: false,
            format: "YYYY-MM-DD",
            showTodayButton: true,
            ignoreReadonly: true
        });
        $('#dept_letter_no_date').datetimepicker({
            useCurrent: false,
            format: "YYYY-MM-DD",
            showTodayButton: true,
            ignoreReadonly: true
        });
    });
</script>