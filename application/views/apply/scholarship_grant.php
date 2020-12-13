<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <?php $this->load->view('templates/alerts'); ?>

        <h1>
            <?php echo ucwords(str_replace('_', ' ', $page_title)); ?> 
        </h1>
        <p><?php echo ucwords(str_replace('_', ' ', $description)); ?></p>
    </section>

    <!-- Main content -->
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('apply-for-scholarship-grant', 'id="formID"'); ?>

    <!--      <form id="formID" method="POST" action="" enctype="multipart/form-data"> -->
    <!-- Main content -->
    <section class="content">
 
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Personnel No')); ?>:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" name="personnelNo" id="personnelNo" value="<?php echo set_value('personnelNo'); ?>" required>
                        <input type="hidden" name="tbl_emp_info_id" id="tbl_emp_info_id" value="<?php echo set_value('tbl_emp_info_id'); ?>"> 
                    </div><?php echo form_error('personnelNo'); ?>
                </div>
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Name of Government Servant')); ?>:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input type="text" name="grantee_name" id="grantee_name" value="<?php echo set_value('grantee_name'); ?>" class="form-control" required>
                         

                    </div><?php echo form_error('grantee_name'); ?>
                </div>
            </div>  
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Designation')); ?>:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" name="designation" id="designation" value="<?php echo set_value('designation'); ?>" required>
 
                    </div><?php echo form_error('designation'); ?>
                </div>
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Pay Scale')); ?>:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                         
                        <input type="text" name="pay_scale" id="pay_scale" value="<?php echo set_value('pay_scale'); ?>" class="form-control" required>
                        <input type="hidden" id="pay_scale_id" name="pay_scale_id" value="<?php echo set_value('pay_scale_id'); ?>">

                    </div><?php echo form_error('pay_scale'); ?>
                </div>
            </div>  
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Office / Department')); ?>:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-industry"></i>
                        </div>

                        <select name="tbl_department_id" id="tbl_department_id" class="form-control" required>
                            <option value="">Select Department</option> 
                            <?php foreach ($department as $departmentInfo) : ?>
                                <option value="<?php echo $departmentInfo['id']; ?>" <?php if(set_value('tbl_department_id') == $departmentInfo['id']) { echo 'selected'; }?>><?php echo $departmentInfo['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div><?php echo form_error('tbl_department_id'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Place of Duty')); ?>:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-industry"></i>
                        </div>

                        <input type="text" autocomplete="off" value="<?php echo set_value('duty_place'); ?>" name="duty_place" id="duty_place" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                    </div><?php echo form_error('duty_place'); ?>
                </div>
            </div>
        </div>

        <div class="row"> 
            <div class="col-md-6"> 
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Name of Student')); ?>:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-graduation-cap"></i>
                        </div>

                        <input type="text" autocomplete="off" value="<?php echo set_value('std_name'); ?>" name="std_name" id="std_name" class="form-control" placeholder="Enter <?php echo $label; ?>" required />
                    </div><?php echo form_error('std_name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Class Passed')); ?>:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-home"></i>
                        </div>
                        <select name="class_pass" id="class_pass" class="form-control">
                            <option value="">Select Class</option> 
                            <?php foreach ($scholarship_classes as $classInfo) : ?>
                                <option value="<?php echo $classInfo['id']; ?>" <?php if(set_value('class_pass') == $classInfo['id']) { echo 'selected'; }?>><?php echo $classInfo['class_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        
                    </div><?php echo form_error('class_pass'); ?>
                </div>
            </div>
        </div>

        <div class="row"> 
            <div class="col-md-6"> 
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Exam Passed (Science / Arts) Subject')); ?>:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-file"></i>
                        </div>

                        <input type="text" autocomplete="off" value="<?php echo set_value('exam_pass'); ?>" name="exam_pass" id="exam_pass" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                    </div><?php echo form_error('exam_pass'); ?>
                </div>
            </div>
            <div class="col-md-6"> 
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Date of Declaration of Result')); ?>:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>

                        <input type="text" autocomplete="off" readonly value="<?php echo set_value('result_date'); ?>" name="result_date" id="result_date" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                    </div><?php echo form_error('result_date'); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">  
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Marks Obtained')); ?>:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calculator"></i>
                        </div>

                        <input type="text" autocomplete="off" value="<?php echo set_value('mo'); ?>" name="mo" id="mo" class="form-control" placeholder="Enter <?php echo $label; ?>" required />
                    </div><?php echo form_error('mo'); ?>
                </div>
            </div>
            <div class="col-md-6"> 
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Total Marks')); ?>:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calculator"></i>
                        </div>

                        <input type="text" autocomplete="off" value="<?php echo set_value('tm'); ?>" name="tm" id="tm" class="form-control" placeholder="Enter <?php echo $label; ?>" required />
                    </div><?php echo form_error('tm'); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6"> 
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Percentage')); ?>:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-percent"></i>
                        </div>

                        <input type="text" readonly autocomplete="off" value="<?php echo set_value('percentage'); ?>" name="percentage" id="percentage" class="form-control" placeholder="Enter <?php echo $label; ?>" required />
                    </div><?php echo form_error('percentage'); ?>
                </div>
            </div>
            <div class="col-md-6"> 
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Name of Institute')); ?>:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-building"></i>
                        </div>

                        <input type="text" autocomplete="off" value="<?php echo set_value('institute_name'); ?>" name="institute_name" id="institute_name" class="form-control" placeholder="Enter <?php echo $label; ?>" required />
                    </div><?php echo form_error('institute_name'); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">  
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Address of Institute')); ?>:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-map-marker"></i>
                        </div>

                        <input type="text" autocomplete="off" value="<?php echo set_value('institute_add'); ?>" name="institute_add" id="institute_add" class="form-control" placeholder="Enter <?php echo $label; ?>" required />
                    </div><?php echo form_error('institute_add'); ?>
                </div>
            </div>
            
        </div>

        <!--<div class="row"> 
            <div class="col-md-6"> 
                <div class="form-group">
                    <label><?php //echo $label = ucwords(str_replace('_', ' ', 'grant_amount')); ?>:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-money"></i>
                        </div>

                        <input type="text" autocomplete="off" readonly value="<?php //echo set_value('grant_amount'); ?>" name="grant_amount" id="grant_amount" class="form-control" placeholder="Enter grant_amount" />
                        <input type="text" autocomplete="off" value="<?php //echo set_value('deduction'); ?>" name="deduction" id="deduction" class="form-control" placeholder="Enter deduction" />
                        <input type="text" autocomplete="off" readonly value="<?php //echo set_value('net_amount'); ?>" name="net_amount" id="net_amount" class="form-control" placeholder="Enter net_amount" required />
                    </div><?php //echo form_error('grant_amount'); ?>
                </div>
            </div> 
        </div>-->


        

         <h4>DETAILS OF BANK ACCOUNT (GOVT. EMPLOYEE) </h4>

        <div class="row">
            <div class="col-md-6"> 
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'bank_branches')); ?>:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-bank"></i>
                        </div>

                        <input type="hidden" autocomplete="off" readonly value="<?php echo set_value('grant_amount'); ?>" name="grant_amount" id="grant_amount" class="form-control" placeholder="Enter grant_amount" />
                        <input type="hidden" autocomplete="off" value="<?php echo set_value('deduction'); ?>" name="deduction" id="deduction" class="form-control" placeholder="Enter deduction" />
                        <input type="hidden" autocomplete="off" readonly value="<?php echo set_value('net_amount'); ?>" name="net_amount" id="net_amount" class="form-control" placeholder="Enter net_amount" required />

                        <input type="hidden" name="tbl_payment_mode_id" id="tbl_payment_mode_id" value="2">
                        <select name="tbl_list_bank_branches_id" id="tbl_list_bank_branches_id" class="form-control" required>
                            <option value="">Select Bank</option> 
                            <?php foreach ($banks as $bank) : ?>
                                <option value="<?php echo $bank['id']; ?>" <?php if(set_value('tbl_list_bank_branches_id') == $bank['id']) { echo 'selected'; }?>><?php echo $bank['name']; ?> (<?php echo $bank['branch_code']; ?>)</option>
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

                        <input type="text" autocomplete="off" value="<?php echo set_value('account_no'); ?>" name="account_no" id="account_no" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                    </div><?php echo form_error('account_no'); ?>
                </div>
            </div>
        </div>

        <h4>CERTIFICATE FROM APPLICANT AND STUDENT </h4>
        <p>I do hereby solemnly affirm and verify that I am a serving employee of
Government of Khyber Pakhtunkhwa and the contents of the application are true to
the best of my knowledge and nothing has been concealed. I know that in the
event of making a willful misrepresentation, suppression of facts or submission of
duplicate case (for the same student) I shall be liable to criminal prosecution. </p>
        <div class="row"> 
            <div class="col-md-6"> 
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Signature of Student')); ?>:</label>
                    <br>
                    <input type="radio" class="validate[required]" checked name="std_signature" id="std_signature" value="No"> No
                    <input type="radio" class="validate[required]" name="std_signature" id="std_signature" value="Yes"> Yes
                    <?php echo form_error('std_signature'); ?>
                </div>
            </div> 
            <div class="col-md-6"> 
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Signature of the Govt. Servant')); ?>:</label>
                    <br>
                    <input type="radio" class="validate[required]" checked name="gov_servent_sign" id="gov_servent_sign" value="No"> No
                    <input type="radio" class="validate[required]" name="gov_servent_sign" id="gov_servent_sign" value="Yes"> Yes
                    <?php echo form_error('gov_servent_sign'); ?>
                </div>
            </div>
        </div>
        <h4>DOCUMENTARY CHECK LIST </h4>
        <div class="row"> 
            <div class="col-md-6"> 
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Select to upload Pay Roll image')); ?>:</label>
                    <br>
                    <input type="file" name="payRoll" id="payRoll" required>
                    <?php echo form_error('payRoll'); ?>
                </div>
            </div>  
            <div class="col-md-6"> 
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'DMC')); ?>:</label>
                    <br>
                    <input type="file" name="dmc" id="dmc" required>
                    <?php echo form_error('dmc'); ?>
                </div>
            </div>
        </div>


        <div class="row"> 
            <div class="col-md-6"> 
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'CNIC of Govt: Servant')); ?>:</label>
                    <br>
                    <input type="file" name="cnic_govt_servant" id="cnic_govt_servant" required>
                    <?php echo form_error('cnic_govt_servant'); ?>
                </div>
            </div>  

            <div class="col-md-6"> 
                <div class="form-group">
                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'Grade Conversion / Equivalency / Percentage Certificate')); ?>:</label>
                    <br>
                    <input type="file" name="percentage_certificate" id="percentage_certificate" required>
                    <?php echo form_error('percentage_certificate'); ?>
                </div>
            </div>  

        </div>

        <h4>NOTE:</h4>
        <p><strong>a)</strong> Application will not be entertained in case of deficiency, incompleteness, late
submission or not routing through administrative department.</p>   
        <p><strong>b)</strong> Application are only processed for calendar year mentioned on title of form. </p>
        <p><strong>c)</strong> Application will only be considered for FULL FINAL EXAMS. </p>
        <!-- /.box -->
        <p>&nbsp;</p>

        <div class="row">
            <!-- /.col -->
            <div class="col-xs-12">
                <button type="submit" value="submit" name="submit" class="btn btn-primary">SUBMIT</button> 
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
        $('#personnelNo').on('change', function() {
            var base_url = "<?php echo base_url(); ?>";
            var personnelNo = $('#personnelNo').val();
            //alert(personnelNo); //return false; 
            if(personnelNo) { 

                $.ajax({
                    url: base_url +'emp_info/getDataByPersonnelNo/'+personnelNo,

                    type: "post",
                    dataType: "json",
                    success:function(data) {
                        if(data.empInfo != null) { 
                            $('#tbl_emp_info_id').val(data.empInfo.id);   
                            $('#tbl_department_id').val(data.empInfo.tbl_department_id);   
                            $('#pay_scale_id').val(data.empInfo.pay_scale_id);
                            $('#designation').val(data.designation.name);
                            $('#pay_scale').val(data.empInfo.pay_scale); 
                            $('#grantee_name').val(data.empInfo.grantee_name);
                        } else {
                            $('#pay_scale_id').val('');
                            $('#tbl_emp_info_id').val('');   
                            $('#designation').val('');
                            $('#pay_scale').val(''); 
                            $('#grantee_name').val('');
                            $('select[id="tbl_department_id"]').empty();
                        }

                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                    }
                });

            }else{
                
                $('#pay_scale_id').val('');
                $('#designation').val('');
                $('#pay_scale').val(''); 
                $('#grantee_name').val('');
                $('select[id="tbl_department_id"]').empty();
                
            }
        });


        $('#class_pass').on('change', function() {
            var base_url = "<?php //echo base_url(); ?>";
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

  
