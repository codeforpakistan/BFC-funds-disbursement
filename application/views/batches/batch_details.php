<?php
$admin_detail = $this->admin->getRecordById($_SESSION['admin_id'], $tbl_name = 'tbl_admin');
?>
<style type="text/css" media="print">
@media print
{    
    th.no-print, th.no-print *
    {
        display: none !important;
        visibility: hidden !important;
    }
    td.no-print, td.no-print *
    {
        display: none !important;
        visibility: hidden !important;
    }
}
@media screen {
.no-print {display:none !important;} 
}
</style>
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

    <!-- <p class="jquery_alert"></p> -->
    <section class="content">
        <div class="box box-success">
            <!-- <div class="box-header">
                <h3 class="box-title pull-left"><?php //echo ucwords(str_replace('_', ' ', 'Batches Listing')); 
                                                ?></h3>
                <h3 class="box-title pull-right">
                    <a href="<?php //echo base_url(); 
                                ?>add_admin" type="button" class="btn btn-block btn-danger btn-sm"><i class="fa fa-trash-o"> all </i></a>
                </h3>
            </div> -->
            <!-- /.box-header -->

            <form name="frmBatchApps" id="frmBatchApps" method="post" action="<?= base_url('batch_app_status/') ?>">
                <div class="box-header">
                    <!--<input type="submit" value="approve" name="btnSubmit" class="btn btn-success btn-sm">
                    <input type="submit" value="reject" name="btnSubmit" class="btn btn-danger btn-sm">
                    <input type="submit" value="cancel" name="btnSubmit" class="btn btn-warning btn-sm">-->
                    <a href="#" class="btn btn-success btn-sm pull-right" onclick="openNewApptoBatch('<?=$batch_number;?>')">Add New Applications</a>
                </div>

                <div class="box-body table-responsive">
                <?php 
                    //to allow BFC Secretary Office
                    if ($_SESSION['tbl_admin_role_id'] == '2') { ?> 
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" name="btnSubmit" class="btn btn-sm btn-success" value="Approved By Secretary">
                            <input type="submit" name="btnSubmit" class="btn btn-sm btn-danger" value="Rejected By Secretary"> 
                        </div>
                    </div>
                    <p></p>
                <?php } 
                if ($_SESSION['tbl_admin_role_id'] == '3') { $bfc_bank = $applications[0]['bfc_bank'];?> 
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" name="btnSubmit" class="btn btn-sm btn-primary" value="Sent to Bank"> 
                            <input type="submit" name="btnSubmit" class="btn btn-sm btn-success" value="Approved By Bank"> 
                            <input type="submit" name="btnSubmit" class="btn btn-sm btn-danger" value="Rejected By Bank"> 
                            
                             <a target="_blank" href="<?=base_url('PrintBatch/'.$batch_number.'/'.$bfc_bank)?>" class="btn btn-sm btn-danger" >Print Batch For <?=($bfc_bank==1)?'National Bank of Pakistan':'Khyber Bank '?></a> 
                        </div>
                    </div>
                    <p></p>
                <?php } ?>

                    <table id="ssp_datatable" class="table table-bordered table-striped table-hover table-condensed">
                        <thead> 
                            <tr>
                                <th width="1%" class="no-print"><input type="checkbox" name="selectall" id="selectall"></th>
                                <th width="2%"><?php echo ucwords(str_replace('_', ' ', 'Sr.')); ?></th>                        
                                <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'Application No')); ?></th>
                                <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'Name of Govt Servant')); ?></th>
                                <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'Father / Husband Name')); ?></th>
                                <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'Designation')); ?></th>
                                <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'CNIC')); ?></th>
                                <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'Name of Bank & Branch')); ?></th>
                                <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'Account No.')); ?></th>
                                <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'Amount')); ?></th>  
                                <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'Date Added')); ?></th>
                                <th width="8%" class="no-print"><?php echo ucwords(str_replace('_', ' ', 'Status')); ?></th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            //echo '<pre>'; print_r($applications); exit;

                            // [id] => 12
                            // [batch_no] => 20210202-1
                            // [application_no] => 10000001
                            // [tbl_grants_id] => 1
                            // [tbl_district_id] => 3
                            // [record_add_date] => 2021-02-02 11:15:15
                            // [record_add_by] => 12
                            // [status] => 1
                            // [status_dated] => 0000-00-00
                            
                            foreach ($applications as $key => $value) {
                                $i++;

                                
                                
                                $application_no = $value['application_no'];
                                $tbl_grants_id = $value['tbl_grants_id'];
                                $tbl_district_id = $value['tbl_district_id'];

                                $grant_info = $this->common_model->getRecordByColoumn('tbl_grants_has_tbl_emp_info_gerund', 'application_no',  $application_no);
                                $emp_info_id = $grant_info['tbl_emp_info_id'];
                                $emp_info = $this->common_model->getRecordByColoumn('tbl_emp_info', 'id',  $emp_info_id);
                                $grantee_name = $emp_info['grantee_name'];
                                $father_husband = $emp_info['father_name'];
                                $cnic = $emp_info['cnic_no'];
                                $tbl_post_id = $emp_info['tbl_post_id'];
 

                                $app_gerund = $this->common_model->getRecordByColoumn('tbl_grants_has_tbl_emp_info_gerund', 'application_no', $application_no);
                                $tbl_banks_id = $app_gerund['tbl_banks_id']; 
                                $tbl_list_bank_branches_id = $app_gerund['tbl_list_bank_branches_id']; 

                                //tbl_bfc_list_bank

                                $tbl_bank = $this->common_model->getRecordByColoumn('tbl_banks', 'id', $tbl_banks_id);
                                $bank = $tbl_bank['name']; 
                                $tbl_branch = $this->common_model->getRecordByColoumn('tbl_list_bank_branches', 'id', $tbl_list_bank_branches_id);
                                $branch = $tbl_branch['name']; 
                                $code = $tbl_branch['branch_code']; 
                                $bank_branch = $bank.' '.$branch .' ('. $code.')';

                                $tbl_post = $this->common_model->getRecordByColoumn('tbl_post', 'id', $tbl_post_id);
                                $designation = $tbl_post['name']; 

                                
                                 

                                $tbl_grants = $this->common_model->getRecordByColoumn('tbl_grants', 'id', $tbl_grants_id);
                                $grant_name = $tbl_grants['name']; 
                                $grant_tbl_name = $tbl_grants['tbl_name']; 


                                $tbl_app_details = $this->common_model->getRecordByColoumn($grant_tbl_name, 'application_no', $application_no);
                                $account_no = $tbl_app_details['account_no']; 
                                $net_amount = $tbl_app_details['net_amount']; 

                                //$tbl_district = $this->common_model->getRecordByColoumn('tbl_district', 'id', $tbl_district_id);
                                //$district_name = $tbl_district['name']; 


                                //$getRole = $this->admin->getRecordById($value['record_add_by'], $tbl_name = 'tbl_admin');
                                //echo '<pre>'; print_r($getRole);
                                $recordAddDate = $value['record_add_date'];
                                $recordAddDate = date("d-M-Y", strtotime($recordAddDate));
                                //$add_by_date = 'Add by '.$getRole['name'].' on '.$recordAddDate;

                                $app_gerund = $this->common_model->getRecordByColoumn('tbl_grants_has_tbl_emp_info_gerund', 'application_no', $application_no);
                                $status_id = $app_gerund['status']; 
                                $status = $this->common_model->getRecordByColoumn('tbl_case_status', 'id', $status_id);

                                ?>
                                <tr>
                                    <td class="no-print"><input type="checkbox" name="app_no[]" id="app_no" value="<?= $application_no; ?>"></td>
                                    <td><?= $i; ?></td>
                                    <td><?= $application_no; ?></td>
                                    <td><?= $grantee_name; ?></td>
                                    <td><?= $father_husband; ?></td>
                                    <td><?= $designation; ?></td>
                                    <td><?= $cnic; ?></td>
                                    <td><?= $bank_branch; ?></td>
                                    <td><?= $account_no; ?></td>
                                    <td><?= $net_amount; ?></td> 
                                    <td><?= $recordAddDate; ?></td>
                                    <td class="no-print"><label for="" class="<?= $status['label'] ?> label-sm"><?= $status['name'] ?></label></td> 
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->


                <div class="box-footer">
                    <input type="hidden" name="batch_no" value="<?= $batch_nmbr ?>">
                    <!-- <input type="submit" value="approve" name="btnSubmit" class="btn btn-success btn-sm">
                    <input type="submit" value="reject" name="btnSubmit" class="btn btn-danger btn-sm">
                    <input type="submit" value="cancel" name="btnSubmit" class="btn btn-warning btn-sm">  -->
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->

</div>



<!-- Add new application to batch --> 
<div id="addNewApptoBatch" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo ucwords(str_replace('_', ' ', 'edit district')); ?></h4>
            </div>
            <p class="jquery_alert_modal"></p>
            <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('#', 'id="addNewApptoBatch" class="form-horizontal"'); ?>
            <div class="modal-body">  
                <div class="form-group">
                    <label class="label-control col-md-4"><?php echo $label = ucwords(str_replace('_', ' ', 'application_number')); ?>:</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-building-o"></i>
                            </div>
                            <input type="hidden" value="" name="batchNo" id="batchNo" /> 
                            <input type="text" autocomplete="off" value="<?php echo set_value('application_number'); ?>" name="application_number" id="application_number" class="form-control validate[required,minSize[3],maxSize[25]]" placeholder="Enter <?php echo $label; ?>" />
                        </div>
                        <div id="error"></div>
                    </div> 
                </div>  
            </div>
            <?php echo form_close(); ?> 
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="saveNewApptoBatch()" id="btnSave" name="btnSave" class="btn btn-primary  btn-sm"><i class="fa fa-plus"> </i> Save Record</button>
            </div> 
        </div> 
    </div>
</div>





<!-- Transactions Modal -->
<div id="transactionsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Transaction</h4>
            </div>
            <div class="modal-body ">
                <?php echo validation_errors(); ?>
                <div class="message_alert"></div>
                <div class="transactionsList"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<!-- /.content-wrapper -->
<script type="text/javascript">
    $(function() {
        $('#selectall').click(function() {
            var checked = this.checked;
            $('input[type="checkbox"]').each(function() {
                this.checked = checked;
            });
        });
    });


    $(document).ready(function() {
        sspDataTable = $('#ssp_datatable').DataTable({
            "paging": true,
            "pageLength": 100,
            searching: true,
            //dom: 'lfrtipB',
            dom: 'Bfrtip',
            buttons: [{
                extend: 'print',
                //className: 'btn btn-success btn-sm bg-green',
                text:'<i class="fa fa-print"> </i> Print',
                // autoPrint:false,
                // footer: true,
                messageTop: '<img width="120px" height="120px" src="<?php echo base_url('assets/upload/images/bfc.png'); ?>" class="img-circle" />',
                // messageBottom: '',
                title:'',
                customize: function ( win ) {

                // $(win.document.body)
                // .prepend(')
                // .css( 'font-size', '13pt' )
                // .css( 'font-weight', 'bold' )
                // .css( 'text-align', 'center' );

                $(win.document.body)
                .prepend(
                    '<div>Benevolanet Fund Cell KP<br> <?=$page_title;?> </div>',
                    //'<p>To</p>',
                    // '<p>The Manager,</p>',
                    // '<p>National Bank of Pakistan</p>',
                    // '<p>Saddar Road Branch, Peshawar</p>',
                    // '<p>Subject: <b><u>RETIREMENT GRANT PAYMENTS</u></b></p>',
                    // '<p>Kindly refer to the subject cited above and to state that Rs. 500000 may be transfered to the relevant account.</p>'
                )
                .css( 'font-size', '13pt' )
                .css( 'font-weight', 'bold' )
                .css( 'text-align', 'center' );
                

                // $(win.document.body).find('h1')
                //               .css( 'font-size', '12pt' )
                //               .css( 'font-weight', 'bold' )
                //               .css( 'text-align', 'center' );

                $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', '10pt' );
                }, // customize end
            }, // print end
            'copy',
            'excel',
            'csv',
            'pdf',  
            ],
        });
    });

    function get_transactions(id) {
        $.ajax({
            url: "<?php echo site_url('batches/get_transactions/') ?>" + id,
            type: "post",
            success: function(data) {
                //alert(data);
                $('.transactionsList').html(data);
                $('#transactionsModal').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from database');
            }
        });
    }

    function reload_table() {
        ssp_datatable.ajax.reload(null, false); //reload datatable ajax
    }


    function save() {

        //alert('i m here');
        var amount = $('#amount').val();
        var bank_transaction_id = $('#bank_transaction_id').val();

        if (amount <= 0) {
            alert('Amount must be greater than zero.');
            $('#amount').focus();
            return false;
        } else if (bank_transaction_id == '') {
            alert('Bank Transaction ID is required.');
            $('#bank_transaction_id').focus();
            return false;
        }


        var url;

        url = "<?php echo site_url('batches/add_transaction') ?>";
        // ajax adding data to database
        $.ajax({

            type: "POST",
            url: url,
            async: false,
            data: $("#formID").serialize(),
            dataType: "json",
            success: function(data) {
                //alert(JSON.stringify(data)); 
                if (data.success == true) {
                    $('#transactionsModal').modal('hide');
                    form_reset();
                    //sspDataTable.ajax.reload(); //reload datatable ajax
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                    $('.jquery_alert').html('< class="alert alert-success">Transaction is successfully completed.</>').fadeIn().delay(4000).fadeOut('slow');

                } else if (data.success == false) {
                    //sspDataTable.ajax.reload(); //reload datatable ajax
                    $('.message_alert').html('<p class="alert alert-danger">' + data.message + '</p>').fadeIn().delay(4000).fadeOut('slow');
                } else {
                    $('.message_alert').html('<p class="alert alert-danger"> <strong>Oops! </strong> Data already Exists or Field may only contain A-Z, a-z and 0-9 characters.</p>').fadeIn().delay(4000).fadeOut('slow');
                }

                //$('#' + key).addClass('is-invalid');
                //$('#' + key).parents('.form-group').find('#error').html(value);


            }
        });
    }


    function form_reset() {
        $("#formID").trigger("reset"); // reset form on modals
        $('#error').html(" ");
        $('div[id=error]').html(" "); 
    };




function openNewApptoBatch(batchNo)
{ 
    form_reset();
    $('#batchNo').val(batchNo);
    $('#addNewApptoBatch').modal('show');  
    $('.modal-title').text('<?php echo ucwords(str_replace('_', ' ', 'Add New Application To Batch# ')); ?>'+ batchNo); 
}

function saveNewApptoBatch()
{ 
     
     

    // ajax adding data to database
    $.ajax({ 
        type: "POST",
        url: "<?php echo site_url('batches/add_app_to_batch/') ?>",
        async: false,
        data: $("#addNewApptoBatch").serialize(),
        dataType: "json",
        success: function(data){ 
            alert(JSON.stringify(data));
            $.each(data, function(key, value) {
                if(value==true){
                    $('#addNewApptoBatch').modal('hide');
                    form_reset();
                    sspDataTable.ajax.reload(); //reload datatable ajax
                    $('.jquery_alert').html('<p class="alert alert-success">! Record has been successfully Added / Updated</p>').fadeIn().delay(4000).fadeOut('slow');
                } 
                else {
                    if(value==false){
                        $('.jquery_alert_modal').html('<p class="alert alert-danger"> <strong>Oops! </strong> Data already Exists or Field may only contain A-Z, a-z and 0-9 characters.</p>').fadeIn().delay(4000).fadeOut('slow');
                    }
                    $('#' + key).addClass('is-invalid');
                    $('#' + key).parents('.form-group').find('#error').html(value);
                }
            });
        }
    });
}

</script>


<? /* ?>
<!-- for image / gallery -->
<script>
    baguetteBox.run('.tz-gallery');
</script>

<script type="text/javascript">
    var save_method; //for save method string
    var sspDataTable;
    $(document).ready(function() {
        sspDataTable = $('#ssp_datatable').DataTable({
            // Processing indicator
            "processing": true,
            // DataTables server-side processing mode
            "serverSide": true,
            // Initial no order.
            "order": [],
            // Load data from an Ajax source
            "ajax": {
                "url": "<?php echo base_url('batches/batch_details/' . $batch_nmbr); ?>",
                "type": "POST"
            },
            //Set column definition initialisation properties
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }]
        });

        // for form error validation
        $('#error').html(" ");

        $('#formID input').on('keyup', function() {
            $(this).removeClass('is-invalid').addClass('is-valid');
            $(this).parents('.form-group').find('#error').html(" ");
        });
    });

    function reload_table() {
        ssp_datatable.ajax.reload(null, false); //reload datatable ajax
    }
</script>

<? */ ?>