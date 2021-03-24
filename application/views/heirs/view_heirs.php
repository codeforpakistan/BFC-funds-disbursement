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
    <section class="content">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title pull-left"><?php echo ucwords(str_replace('_', ' ', 'Legal Heirs details | '.$grant_type.' Grant | Application No. '. $application_no)); ?></h3>

                <h3 class="box-title pull-right"> 
                    <?php //if ($_SESSION['tbl_admin_role_id'] == '1') { ?>
                        <button type="button" onclick="add('<?=$application_no?>')"   class="btn btn-block btn-success btn-sm">
                            <i class="fa fa-plus"> New </i>
                        </button>
                    <?php //} ?>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="ssp_datatable" class="table table-bordered table-striped table-hover table-condensed">
                    <thead>
                        <tr>
                            <th width="2%"><?php echo ucwords(str_replace('_', ' ', 'Sr.')); ?></th>
                            <th width="10%"><?php echo ucwords(str_replace('_', ' ', 'heir name')); ?></th>
                            <th width="10%"><?php echo ucwords(str_replace('_', ' ', 'percentage')); ?></th>
                            <th width="10%"><?php echo ucwords(str_replace('_', ' ', 'bank branch')); ?></th>
                            <th width="10%"><?php echo ucwords(str_replace('_', ' ', 'account no')); ?></th>
                            <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'amount')); ?></th>
                            <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'status')); ?></th>
                            <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'add by/date')); ?></th>
                            <th width="5%" class="no-print"><?php echo ucwords(str_replace('_', ' ', 'action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        /*$i = 0;
                        //echo '<pre>'; print_r($heirs);
                        $count = count($heirs); 
                        if($count>0)
                        {
                            foreach ($heirs as $key => $heirsInfo) {
                                $i++;
                                
                                $application_no = $heirsInfo['application_no'];
                                $tbl_list_bank_branches_id = $heirsInfo['tbl_list_bank_branches_id'];
                                //$getBank = $this->admin->getRecordById($tbl_list_bank_branches_id, $tbl_name = 'tbl_list_bank_branches');
                                $getBank = $this->common_model->getRecordByColoumn('tbl_list_bank_branches', 'id',  $tbl_list_bank_branches_id);

                                $heirsInfo['bank_details'] = '';
                                $status = ($heirsInfo['status'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

                                $getRole = $this->admin->getRecordById($heirsInfo['record_add_by'], $tbl_name = 'tbl_admin');
                                $recordAddDate = $heirsInfo['record_add_date'];
                                $recordAddDate = date("d-M-Y", strtotime($recordAddDate));

                                $add_by_date = 'Add by <i><strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

                                $actionBtn = '<a href="' . site_url('common/logger/' . $heirsInfo['id'] . '/tbl_legal_heirs') . '">
                                        <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                                        </a>' .
                                '<a href="javascript:void(0)" onclick="getData(' . "'" . $heirsInfo['id'] . "'" . ')">
                                        <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                                        </a>';
			 
                                //$data[] = array($i, $heirsInfo->name, $heirsInfo->percentage, $heirsInfo->tbl_list_bank_branches_id, 
                                //$heirsInfo->account_no, $heirsInfo->amount,  $status, $add_by_date, $actionBtn);
                                                
                    ?>
                        <tr>
                            <td><?=$i;?></td>
                            <td><?=$heirsInfo['name'];?></td>
                            <td><?=$heirsInfo['percentage'];?>%</td>
                            <td><?=$getBank['name'].' ('.$getBank['branch_code'].')';?></td>
                            <td><?=$heirsInfo['account_no'];?></td>
                            <td>Rs. <?=$heirsInfo['amount'];?></td>
                            <td><?=$status;?></td>
                            <td><?=$add_by_date;?></td>
                            <td><?=$actionBtn;?></td>
                        </tr>
                    <?php
                            }
                        } else {
                    ?>
                        <tr>
                            <td colspan="9">No records found!</td>
                        </tr>
                    <?php        
                        }*/
                    ?>    
                    </tbody> 
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->

</div>

<!-- modal for add record -->

<div id="modal_form" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo ucwords(str_replace('_', ' ', 'edit legal heir')); ?></h4>
            </div>
            <p class="jquery_alert_modal"></p>
            <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('#', 'id="formID" class="form-horizontal"'); ?>
            <div class="modal-body">

                <div class="form-group">
                    <label class="label-control col-md-4"><?php echo $label = ucwords(str_replace('_', ' ', 'heir name')); ?>:</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input type="hidden" value="<?=$application_no;?>" name="application_no" />
                            <input type="hidden" value="<?=$tbl_grants_id;?>" name="tbl_grants_id" />
                            <input type="hidden" value="<?=$tbl_emp_info_id;?>" name="tbl_emp_info_id" />
                            <input type="hidden" value="" name="id" />
                            <input type="text" autocomplete="off" value="<?php echo set_value('name'); ?>" name="name" id="name" class="form-control validate[required,minSize[3],maxSize[30]]" placeholder="Enter <?php echo $label; ?>" />
                        </div>
                        <div id="error"></div>
                    </div> 
                </div>

                <div class="form-group">
                    <label class="label-control col-md-4"><?php echo $label = ucwords(str_replace('_', ' ', 'Total Amount')); ?>:</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-money"></i>
                            </div> 
                            <input type="text" autocomplete="off" readonly value="<?php echo $total_amount; ?>" name="total_amount" id="total_amount" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                        </div>
                        <div id="error"></div>
                    </div> 
                </div> 

                <div class="form-group">
                    <label class="label-control col-md-4"><?php echo $label = ucwords(str_replace('_', ' ', 'percentage')); ?>:</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-percent"></i>
                            </div>  
                            <input type="text" autocomplete="off" value="<?php echo set_value('percentage'); ?>" name="percentage" id="percentage" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                        </div>
                        <div id="error"></div>
                    </div> 
                </div> 

                <div class="form-group">
                    <label class="label-control col-md-4"><?php echo $label = ucwords(str_replace('_', ' ', 'bank_type')); ?>:</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-bank"></i>
                            </div>
                            <select name="bank_type_id" id="bank_type_id" class="form-control select2 validate[required]">
                                <option value="">All Bank Type</option> 
                                <?php foreach ($bank_types as $bank) : ?>
                                    <option value="<?php echo $bank['id']; ?>"><?php echo $bank['name']; ?></option>
                                <?php endforeach; ?>
                            </select> 
                        </div>
                        <div id="error"></div>
                    </div>
                </div> 

                <div class="form-group">
                    <label class="label-control col-md-4"><?php echo $label = ucwords(str_replace('_', ' ', 'bank_branches')); ?>:</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-bank"></i>
                            </div>
                            <select name="tbl_list_bank_branches_id" id="tbl_list_bank_branches_id" class="form-control select2 validate[required]">
                                <option value="">Select Branch</option>  
                            </select>
                        </div>
                        <div id="error"></div>
                    </div>
                </div> 
                
                <div class="form-group">
                    <label class="label-control col-md-4"><?php echo $label = ucwords(str_replace('_', ' ', 'account_no')); ?>:</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-bank"></i>
                            </div>  
                            <input type="text" autocomplete="off" value="<?php echo set_value('account_no'); ?>" name="account_no" id="account_no" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                        </div>
                        <div id="error"></div>
                    </div> 
                </div>

                <div class="form-group">
                    <label class="label-control col-md-4"><?php echo $label = ucwords(str_replace('_', ' ', 'amount')); ?>:</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-money"></i>
                            </div>  
                            <input type="text" autocomplete="off" value="<?php echo set_value('amount'); ?>" name="amount" id="amount" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                        </div>
                        <div id="error"></div>
                    </div> 
                </div>

                <div class="form-group">
                    <label class="label-control col-md-4"><?php echo $label = ucwords('status') ?>:</label>
                    <div class="col-md-8">
                        <div class="input-group"> 
                            <input type="radio" id="status" name="status" value="1" checked> Active
                            <input type="radio" id="status" name="status" value="0"> Inactive
                        </div><div id="error"></div>
                    </div>
                </div>  
            </div>

            <?php echo form_close(); ?>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="save()" id="btnSave" name="btnSave" class="btn btn-primary  btn-sm"><i class="fa fa-plus"> </i> Save Record</button>
            </div>



        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.content-wrapper -->

<!-- for image / gallery -->
<script>
    baguetteBox.run('.tz-gallery');
</script>

<script type="text/javascript">
    var save_method; //for save method string
    var sspDataTable;
    $(document).ready(function() {
        // $('#ssp_datatable').DataTable({

        // });
        sspDataTable = $('#ssp_datatable').DataTable({
            // Processing indicator
            "processing": true,
            // DataTables server-side processing mode
            "serverSide": true,
            // Initial no order.
            "order": [],
            // Load data from an Ajax source
            "ajax": {
                "url": "<?php echo base_url('heirs/get_heirs/'.$tbl_grants_id.'/'.$application_no); ?>",
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

        $('#percentage').on('keyup', function() {
            percent = $(this).val();
            total_amount = $('#total_amount').val(); 
            heirAmount = total_amount*percent/100;
            $('#amount').val(heirAmount);
        });
        
        $('#bank_type_id').on('change', function() {
            var base_url = "<?php echo base_url(); ?>";
            var bank_type_id = $('#bank_type_id').val(); 
            if(bank_type_id) {
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
        
    });

    function reload_table() {
        ssp_datatable.ajax.reload(null, false); //reload datatable ajax
    }

    function save() {
        var url;
        if (save_method == 'add') {
            url = "<?php echo site_url('heirs/add_heirs') ?>";
        } else {
            url = "<?php echo site_url('heirs/update_heirs') ?>";
        }

        // ajax adding data to database
        $.ajax({

            type: "POST",
            url: url,
            async: false,
            data: $("#formID").serialize(),
            dataType: "json",
            success: function(data) {

                $.each(data, function(key, value) {
                    if (value == true) {
                        $('#modal_form').modal('hide');
                        form_reset();
                        sspDataTable.ajax.reload(); //reload datatable ajax
                        $('.jquery_alert').html('<p class="alert alert-success">! Record has been successfully Added / Updated</p>').fadeIn().delay(4000).fadeOut('slow');
                    }
                    // else
                    else {
                        if (value == false) {
                            $('.jquery_alert_modal').html('<p class="alert alert-danger"> <strong>Oops! </strong> Data already Exists or Field may only contain A-Z, a-z and 0-9 characters.</p>').fadeIn().delay(4000).fadeOut('slow');
                        }
                        $('#' + key).addClass('is-invalid');
                        $('#' + key).parents('.form-group').find('#error').html(value);
                    }
                });
            }
        });
    }

    function add(app_no) {
        save_method = 'add';
        //app_no =  $(this).attr('data-id'); 
        //alert(app_no);
        form_reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('<?php echo ucwords(str_replace('_', ' ', 'add new legal heirs to ')); ?>' + app_no);
        // Set Title to Bootstrap modal title
    }

    function form_reset() {
        $('#formID')[0].reset(); // reset form on modals
        $('#error').html(" ");
        $('div[id=error]').html(" ");

    };

    // getData function for get data for editment and updating
    function getData(id)
    { 
        save_method = 'update';
        form_reset(); 
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('heirs/getData/') ?>"+id,
            type: "post",
            dataType: "JSON",
            success: function(data)
            {
                //    {"id":"3","name":"Shah","percentage":"20","tbl_banks_id":"14",
                //    "tbl_list_bank_branches_id":"284","account_no":"256565656565",
                //    "amount":"65000","status":"1","record_add_by":"16","record_add_date":"2021-03-18 15:28:26",
                //    "tbl_grants_id":"0","application_no":"10000103","tbl_emp_info_id":"0"}
                //    alert(data.tbl_list_bank_branches_id);
                //console.log(JSON.stringify(data));

                $('[name="id"]').val(data.id);
                $('[name="name"]').val(data.name);
                $('[name="percentage"]').val(data.percentage);
                $('#bank_type_id').val(data.tbl_banks_id);
                $('#bank_type_id').select2().trigger('change');
                $('#tbl_list_bank_branches_id').val(data.tbl_list_bank_branches_id);
                $('#tbl_list_bank_branches_id').select2().trigger('change');
                $('[name="account_no"]').val(data.account_no);
                //$('[name="total_amount"]').val(data.total_amount);
                $('[name="amount"]').val(data.amount);
                $('[name="tbl_grants_id"]').val(data.tbl_grants_id); 
                $('[name="application_no"]').val(data.application_no); 
                $('[name="tbl_emp_info_id"]').val(data.tbl_emp_info_id);  
                
                //$('[name="bank_type"]').val(data.bank_type);
                //$('input[name^="status"][value="'+data.status+'"').prop('checked',true);

                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('#error').html(" "); 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from database');
            }
        });
        // $('#modalEdit').modal('show');
        // form_reset();
    }
</script>