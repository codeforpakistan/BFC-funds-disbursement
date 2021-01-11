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
    <?php echo form_open_multipart('add_retirement_grant', 'id="formID"'); ?>

    <!--      <form id="formID" method="POST" action="" enctype="multipart/form-data"> -->
    <!-- Main content -->
    <section class="content">

        <div class="row">


            <div class="col-md-12">
                <? //echo '<pre>'; print_r($emp_info); exit(); ?>
 
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo ucwords('Retirement Information'); ?></h3>
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
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Date Of Appointment')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <!-- onchange="getServiceLength()" -->
                                        <input type="text" autocomplete="off" value="<?php echo set_value('doa'); ?>" name="doa" id="doa" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('doa'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Date Of Retirement')); ?>:</label>
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
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Length Of Service')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('los'); ?>" name="los" id="los" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
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

                                        <input type="text" autocomplete="off" value="<?php echo set_value('grant_amount'); ?>" name="grant_amount" id="grant_amount" readonly class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
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

                                        <input type="text" autocomplete="off" readonly value="<?php echo set_value('net_amount'); ?>" name="net_amount" id="net_amount" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
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
                                            <?php /* foreach ($banks as $bank) : ?>
                                                <option value="<?php echo $bank['id']; ?>"><?php echo $bank['name']; ?> (<?php echo $bank['branch_code']; ?>)</option>
                                            <?php endforeach; */ ?>
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
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 's_n_office_dept_seal')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="s_n_office_dept_seal" id="s_n_office_dept_seal" value="No"> No
                                    <input type="radio" class="validate[required]" name="s_n_office_dept_seal" id="s_n_office_dept_seal" value="Yes"> Yes
                                    <?php echo form_error('s_n_office_dept_seal'); ?>
                                </div>
                            </div>  
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 's_n_dept_admin_seal')); ?>:</label>
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
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'payroll_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="payroll_attach" id="payroll_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="payroll_attach" id="payroll_attach" value="Yes"> Yes
                                    <?php echo form_error('payroll_attach'); ?>
                                </div>
                            </div>  

                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'dob_ac_attach')); ?>:</label>
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
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'retirement_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="retirement_attach" id="retirement_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="retirement_attach" id="retirement_attach" value="Yes"> Yes
                                    <?php echo form_error('retirement_attach'); ?>
                                </div>
                            </div>  
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'bf_contribution_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="bf_contribution_attach" id="bf_contribution_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="bf_contribution_attach" id="bf_contribution_attach" value="Yes"> Yes
                                    <?php echo form_error('bf_contribution_attach'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'cnic_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="cnic_attach" id="cnic_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="cnic_attach" id="cnic_attach" value="Yes"> Yes
                                    <?php echo form_error('cnic_attach'); ?>
                                </div>
                            </div>  
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'ppo_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="ppo_attach" id="ppo_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="ppo_attach" id="ppo_attach" value="Yes"> Yes
                                    <?php echo form_error('ppo_attach'); ?>
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
    
    $("#tbl_emp_info_id").on('change', function() {
        var base_url = "<?php echo base_url(); ?>";  
        emp_id = $('#tbl_emp_info_id').val(); 
        var empScale = getEmpScale(emp_id);  
    });


     





    $("#doa, #dor, #tbl_emp_info_id").on('focusout', function() {
        var base_url = "<?php echo base_url(); ?>";  
        emp_id = $('#tbl_emp_info_id').val();  
        //var empScale = getEmpScale(emp_id);  
        dateOfAppointment = $('#doa').val();
        dateOfRetirement = $('#dor').val(); 
        empScale_ID = $('#pay_scale_id').val(); 

        var formData = { dor: dateOfRetirement, empScaleID: empScale_ID };
        //alert(JSON.stringify(formData)); 
        if(emp_id == ''){
            alert('Please select employee to continue');
            $('#dor').val('');
        }
        else { 
            
            if(dateOfRetirement) { 
                  
                getServiceLength(); 

                $.ajax({ 
                    url: base_url +'retirement/getAmountData/',  
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
                $('#grant_amount').empty();
            }
        } 
    });
    













    // $('#from_date').focusout(function(){
    //     sspDataTable.draw();
    // });
    
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
    
    function getEmpScale(empID){
        //alert('empID = ' + empID);
        var base_url = "<?php echo base_url(); ?>";
        if(empID) { 
            $.ajax({
                url: base_url +'emp_info/getData/'+empID,

                type: "post",
                dataType: "json",
                success:function(data) {
                //alert(JSON.stringify(data));
                    //alert(data.id)
                $('#pay_scale_id').val(data.pay_scale_id);
                $('#pay_scale').val(data.pay_scale); 
                $('#tbl_district_id').val(data.tbl_district_id); 
                //return data;

                //$('#tbl_department_id').select2().trigger('change');

                }
            });

        }  
    }
    $(function() {
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