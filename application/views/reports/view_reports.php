<?php
// $admin_detail = $this->admin->getRecordById($_SESSION['admin_id'], $tbl_name = 'tbl_admin');
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

    <section class="content" style="min-height: 0;">
        <div class="box box-success">
            <div class="box-body">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><?php echo $label = ucwords('from Date'); ?>:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>

                                <input type="text" readonly autocomplete="off" value="" name="from_date" id="from_date" class="form-control validate[required,minSize[1]" placeholder="Enter <?php echo $label; ?>" />
                            </div><?php echo form_error('from_date'); ?>
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label><?php echo $label = ucwords('to Date'); ?>:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>

                                <input type="text" readonly autocomplete="off" value="" name="to_date" id="to_date" class="form-control validate[required,minSize[1]" placeholder="Enter <?php echo $label; ?>" />
                            </div><?php echo form_error('to_date'); ?>
                        </div>

                    </div>

                    <div class="col-md-3"> 
                        <div class="form-group">
                            <label><?php echo $label = ucwords('grants'); ?>:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <select name="tbl_grants_id" id="tbl_grants_id" class="form-control select2 validate[required]">
                                    <option value="">Select Grants</option>
                                    <?php foreach ($grants as $grant) : ?>
                                        <option value="<?php echo $grant['id']; ?>"><?php echo $grant['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div><?php echo form_error('tbl_grants_id'); ?>
                        </div> 
                    </div>

                    <div class="col-md-3"> 
                        <div class="form-group">
                            <label><?php echo $label = ucwords('status'); ?>:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>

                                <select name="status" id="status" class="form-control select2">
                                    <option value="">Select Status</option>
                                    <?php foreach($statuses as $status) { ?>
                                        <option value="<?=$status['id'];?>"><?=$status['name'];?></option>
                                    <?php } ?>
                                </select>
                            </div><?php echo form_error('status'); ?>
                        </div> 
                    </div>

                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><?php echo $label = ucwords('from Application No'); ?>:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </div>

                                <input type="text" autocomplete="off" value="" name="from_app_no" id="from_app_no" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                            </div><?php echo form_error('from_app_no'); ?>
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label><?php echo $label = ucwords('to Application No'); ?>:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </div>

                                <input type="text" autocomplete="off" value="" name="to_app_no" id="to_app_no" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                            </div><?php echo form_error('to_app_no'); ?>
                        </div>

                    </div>

                    <div class="col-md-3"> 
                        <div class="form-group">
                            <label><?php echo $label = ucwords('Banks'); ?>:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                                <select name="tbl_bank_id" id="tbl_bank_id" class="form-control select2">
                                    <option value="">Select Banks</option>
                                    <?php foreach ($banks as $bank) : ?>
                                        <option value="<?php echo $bank['id']; ?>"><?php echo $bank['name']. ' ('. $bank['branch_code']. ')'; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div><?php echo form_error('tbl_bank_id'); ?>
                        </div> 
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">
                            <label><?php echo $label = ucwords('District'); ?>:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>  
                                <select name="district" id="district" class="form-control select2">
                                    <option value="">Select District</option>
                                    <?php foreach($districts as $district) { ?>
                                        <option value="<?=$district['id'];?>"><?=$district['name'];?></option>
                                    <?php } ?>
                                </select>
                            </div><?php echo form_error('district'); ?>
                        </div> 
                    </div>
                     

                </div>

                 

                <!-- /.row -->
            </div>

        </div>
    </section>


    <?php /* ?>
    <section class="content">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title pull-left"><?php echo ucwords(str_replace('_', ' ', 'Generated Report')); ?></h3>
                <input type="button" class="btn btn-sm btn-primary pull-right" value="Create Batch" name="create_batch">
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table no-margin">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="checkall" id="checkall" value="1"></th>
                            <th>Application No</th>
                            <th>Applicant Name</th>
                            <th>Grant Type</th>
                            <th>Status</th>
                            <th>Entry Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($applications as $application) {

                            $tbl_grants_id = $application['tbl_grants_id'];
                            $tbl_emp_info_id = $application['tbl_emp_info_id'];
                            $application_no = $application['application_no'];

                            $getTblName = $this->common_model->getRecordByColoumn('tbl_grants', 'id', $tbl_grants_id);
                            $grant_tbl_name = $getTblName['tbl_name'];
                            $grant_type = $getTblName['name'];

                            $getGrant  = $this->common_model->getRecordByColoumn($grant_tbl_name, 'application_no', $application_no);
                            $applicant_name = $getGrant['grantee_name'];
                            $entry_date = $getGrant['record_add_date'];
                            $tbl_case_status = $getGrant['tbl_case_status'];

                            $getStatus  = $this->common_model->getRecordByColoumn('tbl_case_status', 'id', $tbl_case_status);
                            $statusName = $getStatus['name'];
                            $statusLabel = $getStatus['label'];
                            $status = '<span class="' . $statusLabel . '">' . $statusName . '</span>';

                            //$applicant = $this->common_model->getRecordById($id, $tbl_name);
                        ?>
                            <tr>
                                <th><input type="checkbox" id="application_no" name="application_no[]" value="1" id="example-select-all"></th>
                                <td><a href="#"><?= $application['application_no']; ?></a></td>
                                <td><?= $applicant_name; ?></td>
                                <td><?= $grant_type; ?></td>
                                <td><?= $status; ?></td>
                                <td><?= $entry_date; ?></td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    
    <?php */ ?>










    
    <!-- Main content -->
    <section class="content">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title pull-left"><?php echo ucwords(str_replace('_', ' ', 'Generated Report')); ?></h3>
            </div>
            <!-- /.box-header -->
            <?php echo form_open('reports/create_batch/', 'id="formID"'); ?>
                <div class="box-body table-responsive">
                    <table id="ssp_datatable" class="table table-bordered table-striped table-hover table-condensed display dataTable">
                        <thead>
                            <tr> 
                                <!-- <th width="1%"><input type="checkbox" name="checkbox" id="selectall"></th> -->
                                <th width="2%"><?php echo ucwords(str_replace('_', ' ', 'Sr.')); ?></th>                        
                                <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'applicationNo')); ?></th>
                                <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'GrantType')); ?></th>
                                <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'granteeName')); ?></th>
                                <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'dateAdded')); ?></th>
                                <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'status')); ?></th> 
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>  
                </div>
            </form>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->
    
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

        

        sspDataTable = $('#ssp_datatable').DataTable({

            "paging": true,
            "pageLength": 10,
            //"pagingType": "simple",
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
 
            dom: 'lfrtipB',
            //dom: 'Bfrtip',
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

                $(win.document.body)
                                .prepend('<div>Benevolanet Fund Cell KP<br>Search Report</div>')
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

            ],




            // Processing indicator
            "processing": true,
            // DataTables server-side processing mode
            "serverSide": true,
            "serverMethod": "post",

            // Initial no order.
            "order": [],
            "filter": true,
            "searching": true,

            // Load data from an Ajax source
            "ajax": {
                //"url": "<?php //echo base_url('form_8a/get_form_8a_report/'); ?>",
                // "type": "POST"
                "url": "<?php echo base_url('reports/get_reports/'); ?>",
                'data': function(data) {
                    //alert(JSON.stringify(data));
                    //data.tbl_district_id = $('#tbl_district_id').val();
                    data.from_date = $('#from_date').val();
                    data.to_date = $('#to_date').val();
                    data.tbl_grants_id = $('#tbl_grants_id').val();
                    data.status = $('#status').val();
                    data.from_app_no = $('#from_app_no').val();
                    data.to_app_no = $('#to_app_no').val();
                    //data.batch_status = $('#batch_status').val();

                    //data.tbl_bank_id = $('#tbl_bank_id').val();
                    //data.keyword = $('#keyword').val();
                }
            },
            //Set column definition initialisation properties
            // "columnDefs": [{
            //     "targets": [0,5,6],
            //     "orderable": false
            // }]
            'columns': [
                // {
                //     data: 'checkbox'
                // },
                {
                    data: 'no'
                }, 
                {
                    data: 'applicationNo' 
                },
                {
                    data: 'GrantType'
                },
                {
                    data: 'GranteeName'
                },
                {
                    data: 'DateAdded'
                }, 
                {
                    data: 'status'
                },
            ],
            //Set column definition initialisation properties
            "columnDefs": [{
                "targets": [0, 1, 2, 3, 4], //5
                "orderable": false
            }]
        });


        $('#tbl_grants_id, #status').change(function() {
            sspDataTable.draw();
        });

        $('#from_date').focusout(function() {
            sspDataTable.draw();
        });

        $('#to_date').focusout(function() {
            sspDataTable.draw();
        });

        $('#from_app_no').focusout(function() {
            sspDataTable.draw();
        });

        $('#to_app_no').focusout(function() {
            sspDataTable.draw();
        });


    });

    function reload_table() {
        ssp_datatable.ajax.reload(null, false); //reload datatable ajax
    }
</script>

<script type="text/javascript">
    $(function() {
        $('#from_date').datetimepicker({
            useCurrent: false,
            // defaultDate: null,
            format: "DD-MM-YYYY",
            showTodayButton: true,
            ignoreReadonly: true
        });
    });

    $(function() {
        $('#to_date').datetimepicker({
            useCurrent: false,
            format: "DD-MM-YYYY",
            showTodayButton: true,
            ignoreReadonly: true
        });
        // $('#to_date').val("");


    });

    $(function() {
        $('#checkall').click(function() {
            alert('checkall');
            // var checked = $(this).prop('checked');
            // $('#application_no').prop('checked', checked);
        });
    });
    $(function() {
        $('#selectall').click(function() { 
            var checked = this.checked;
            $('input[type="checkbox"]').each(function() {
            this.checked = checked;
            });
        });
    });

</script>