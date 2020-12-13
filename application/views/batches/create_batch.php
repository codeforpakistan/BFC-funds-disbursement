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
                                <select name="district_id" id="district_id" class="form-control select2">
                                    <option value="">Select District</option>
                                    <?php foreach($districts as $district) { ?>
                                        <option value="<?=$district['id'];?>"><?=$district['name'];?></option>
                                    <?php } ?>
                                </select>
                            </div><?php echo form_error('district_id'); ?>
                        </div> 
                    </div>

                </div>
 
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><?php echo $label = ucwords('Select Role'); ?>:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <select name="admin_role" id="admin_role" class="form-control select2">
                                    <option value="">Select Role</option>
                                    <?php foreach($admin_roles as $role) { ?>
                                        <option value="<?=$role['id'];?>"><?=$role['name'];?></option>
                                    <?php } ?>
                                </select> 
                            </div><?php echo form_error('admin_role'); ?>
                        </div> 
                    </div>

                    <div class="col-md-3">
                        <div class="form-group" id="admin_dropdown">
                            
                        </div>
                    </div>
                </div>

                <!-- /.row -->
            </div>

        </div>
    </section>


   

    
    <!-- Main content -->
    <section class="content">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title pull-left"><?php echo ucwords(str_replace('_', ' ', 'Search Result')); ?></h3>
            </div>
            <!-- /.box-header -->
            <?php echo form_open('batches/add_batch/', 'id="formID"'); ?>
                <div class="box-body table-responsive">
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-success" name="action" value="btnCreateBatch">Create Batch</button>
                                 
                                <a href="<?php echo base_url(); ?>batches" type="button" class="btn btn-success pull-right btn-sm"><i class="fa fa-eye"> View all Batches </i></a>
                                 
                            </div>
                        </div>
                    </div>
                    <p></p>
                    <table id="ssp_datatable" class="table table-bordered table-striped table-hover table-condensed display dataTable">
                        <thead>
                            <tr> 
                                <th width="1%"><input type="checkbox" name="checkbox" id="selectall"></th>
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
                    <p></p>
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-success" name="action" value="btnCreateBatch">Create Batch</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </form>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->
    <? /* ?><? */ ?>
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
            // Processing indicator
            "processing": true,
            // DataTables server-side processing mode
            "serverSide": true,
            "serverMethod": "post",

            // Initial no order.
            "order": [],
            "filter": false,
            "searching": false,

            // Load data from an Ajax source
            "ajax": { 
                "url": "<?php echo base_url('batches/get_reports/'); ?>",
                'data': function(data) {
                    //alert(JSON.stringify(data)); 
                    data.from_date = $('#from_date').val();
                    data.to_date = $('#to_date').val();
                    data.tbl_grants_id = $('#tbl_grants_id').val();
                    data.status = $('#status').val();
                    data.from_app_no = $('#from_app_no').val();
                    data.to_app_no = $('#to_app_no').val();
                    data.tbl_bank_id = $('#tbl_bank_id').val();
                    data.district_id = $('#district_id').val();
                    data.admin_id = $('#admin_id').val();

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
                {
                    data: 'checkbox'
                },
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
                "targets": [0, 1, 2, 3, 4, 5],
                "orderable": false
            }]
        });

        $('#admin_role').change(function() {
            var base_url = "<?php echo base_url(); ?>";
            var admin_role = $('#admin_role').val();
            if (admin_role) {
                $.ajax({
                    url: base_url + 'admins/get_admin_by_role/' + admin_role, 
                    type: "post", 
                    success: function(data) {
                        $('#admin_dropdown').html(data);
                        //alert(JSON.stringify(data));
                        //$('[name="pay_scale"]').val(data.pay_scale_name);
                        //$('[name="pay_scale_id"]').val(data.payscaleid);
                    }
                });
            } else {
                //$('select[id="pay_scale"]').empty();
            }
        });

        $('#tbl_grants_id, #district_id, #admin_id, #tbl_bank_id').change(function() {
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