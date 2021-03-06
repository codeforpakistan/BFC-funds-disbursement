<?php
$admin_detail = $this->admin->getRecordById($_SESSION['admin_id'], $tbl_name = 'tbl_admin');
?>
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
                </div>

                <div class="box-body table-responsive">
                  
                    <table id="ssp_datatable" class="table table-bordered table-striped table-hover table-condensed">
                        <thead>
                            <tr> 
                                <th width="2%"><?php echo ucwords(str_replace('_', ' ', 'Sr.')); ?></th>
                                <th width="10%"><?php echo ucwords(str_replace('_', ' ', 'Application No')); ?></th>
                                <th width="10%"><?php echo ucwords(str_replace('_', ' ', 'Total Amount')); ?></th>
                                <th width="10%"><?php echo ucwords(str_replace('_', ' ', 'Paid Amount')); ?></th>
                                <th width="10%"><?php echo ucwords(str_replace('_', ' ', 'Remaining Amount')); ?></th> 
                                <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'status')); ?></th>
                                <th width="5%" class="no-print"><?php echo ucwords(str_replace('_', ' ', 'action')); ?></th>  
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            //echo '<pre>'; print_r($applications); exit;

                            foreach ($applications as $key => $value) {
                                $i++;


                                $getRole = $this->admin->getRecordById($value['record_add_by'], $tbl_name = 'tbl_admin');
                                $recordAddDate = $value['record_add_date'];
                                $recordAddDate = date("d-M-Y", strtotime($recordAddDate));
                                $application_no = $value['application_no'];

                                $app_gerund = $this->common_model->getRecordByColoumn('tbl_grants_has_tbl_emp_info_gerund', 'application_no', $application_no);
                                $tbl_grants_id = $app_gerund['tbl_grants_id'];
                                $tbl_grants_id = $app_gerund['tbl_grants_id'];
                                $status_id = $app_gerund['status'];

                                //echo 'grant_id = '. $tbl_grants_id;

                                //Scholarship Grants
                                if ($tbl_grants_id == '1') {
                                    $app_detail = $this->common_model->getRecordByColoumn('tbl_scholaarship_grant', 'application_no', $application_no);
                                    $applicationNo = '<a href="' . site_url('common/logger/' . $app_detail['id'] . '/tbl_scholaarship_grant') . '">'.$application_no.'</a>';
                                }

                                //Funeral Grants
                                else if ($tbl_grants_id == '2') {
                                    $app_detail = $this->common_model->getRecordByColoumn('tbl_funeral_grant', 'application_no', $application_no);
                                    $applicationNo = '<a href="' . site_url('common/logger/' . $app_detail['id'] . '/tbl_funeral_grant') . '">'.$application_no.'</a>';
                                }

                                //Retirement Grants
                                else if ($tbl_grants_id == '3') {
                                    $app_detail = $this->common_model->getRecordByColoumn('tbl_retirement_grant', 'application_no', $application_no);
                                    $applicationNo = '<a href="' . site_url('common/logger/' . $app_detail['id'] . '/tbl_retirement_grant') . '">'.$application_no.'</a>';
                                }

                                //Monthly Grants
                                else if ($tbl_grants_id == '4') {
                                    $app_detail = $this->common_model->getRecordByColoumn('tbl_monthly_grant', 'application_no', $application_no);
                                    $applicationNo = '<a href="' . site_url('common/logger/' . $app_detail['id'] . '/tbl_monthly_grant') . '">'.$application_no.'</a>';
                                }

                                //Interest Free Loan Grants
                                else if ($tbl_grants_id == '5') {
                                    $app_detail = $this->common_model->getRecordByColoumn('tbl_interest_free_loan', 'application_no', $application_no);
                                    $applicationNo = '<a href="' . site_url('common/logger/' . $app_detail['id'] . '/tbl_interest_free_loan') . '">'.$application_no.'</a>';
                                }

                                //Lumpsum Grants
                                else if ($tbl_grants_id == '6') {
                                    $app_detail = $this->common_model->getRecordByColoumn('tbl_lump_sum_grant', 'application_no', $application_no);
                                    $applicationNo = '<a href="' . site_url('common/logger/' . $app_detail['id'] . '/tbl_lump_sum_grant') . '">'.$application_no.'</a>';
                                }

                                //echo '<pre>'; print_r($app_detail); 
                                $net_amount = $app_detail['net_amount'];
                                $add_by_date = '<i>Add by <strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';
                                $app_transactions = $this->common_model->getRecordByColoumn('tbl_transactions', 'application_no', $application_no);
                                $amount_paid = $this->common_model->getSumByColoumn('tbl_transactions', 'amount', 'paid_amount', 'application_no', $application_no);

                                // if($paid_amount['paid_amount'] == '') {
                                //     $amount_paid = '0.00';
                                // } else {
                                //     $amount_paid = $paid_amount['paid_amount'];
                                // }

                                //echo '<br>net_amount = '. $net_amount;
                                //echo '<br>amount_paid = '. $amount_paid;

                                $remaining_amount  = $net_amount - $amount_paid;

                                //echo '<br>remaining_amount = '. $remaining_amount; 

                                $status = $this->common_model->getRecordByColoumn('tbl_case_status', 'id', $status_id);
                                
                                if($status['name'] == 'Approved By Bank') {
                                    $rowClass = 'info';
                                } else if($status['name'] == 'Completed') {
                                    $rowClass = 'success';
                                } else if($status['name'] == 'Installments') {
                                    $rowClass = 'warning';
                                } 

                                

                                ?>
                                <tr class="<?=$rowClass?>"> 
                                    <td><?= $i; ?></td>
                                    <td><?= $applicationNo; ?></td>
                                    <td><label class="label label-info">Rs. <?= $net_amount; ?></label></td>
                                    <td><label class="label label-success">Rs. <?= $amount_paid; ?></label></td>
                                    <td><label class="label label-warning">Rs. <?= $remaining_amount; ?></label></td> 
                                    <td><label for="" class="<?= $status['label'] ?> label-sm"><?= $status['name'] ?></label></td>
                                    <?php if($status['name'] == 'Completed') { ?>
                                    <td><a href="javascript:"><img src="<?= site_url('assets/site/images/transactions.png'); ?>" height="32"></a></td>  
                                    <?php } else { ?>
                                        <td><a href="javascript:" onclick="get_transactions(<?= $application_no ?>)"><img src="<?= site_url('assets/site/images/transactions.png'); ?>" height="32"></a></td>  
                                    <?php } ?>
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

        });
    });

    function get_transactions(id) {
        if(id != '')
        {
            $('.modal-title').html('Add transaction to application #: '+ id); 
            $.ajax({
                url: "<?php echo site_url('transactions/get_transactions/') ?>" + id,
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
        else {
            alert('Application ID is empty, please try again.');
        }
        
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

        url = "<?php echo site_url('transactions/add_transaction') ?>";
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
                    $('.jquery_alert').html('<p class="alert alert-success">Transaction is successfully completed.</p>').fadeIn().delay(4000).fadeOut('slow');

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
  
</script>


 