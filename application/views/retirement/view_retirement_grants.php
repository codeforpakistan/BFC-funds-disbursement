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
                <h3 class="box-title pull-left"><?php echo ucwords(str_replace('_', ' ', 'retirement grants detail')); ?></h3>
                <!--  <h3 class="box-title pull-right">
                <a href="<?php echo base_url(); ?>add_admin" type="button" class="btn btn-block btn-danger btn-sm"><i class="fa fa-trash-o"> all </i></a></h3> -->

                <h3 class="box-title pull-right"> 
                    <?php if ($_SESSION['tbl_admin_role_id'] == '1' || $_SESSION['tbl_admin_role_id'] == '4'  || $_SESSION['tbl_admin_role_id'] == '6' || $_SESSION['tbl_admin_role_id'] == '7') { ?> 
                        <a href="<?php echo base_url('add_retirement_grant'); ?>" type="button" class="btn btn-block btn-success btn-sm"><i class="fa fa-plus"> New </i></a> 
                    <?php } ?>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="ssp_datatable" class="table table-bordered table-striped table-hover table-condensed">
                    <thead>
                        <tr>
                            <th width="2%"><?php echo ucwords(str_replace('_', ' ', 'Sr.')); ?></th>
                            <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'app_no')); ?></th>
                            <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'record_no')); ?></th>
                            <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'record_no_year')); ?></th>
                            <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'date of appointment')); ?></th>
                            <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'date of retirement')); ?></th>
                            <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'length of service')); ?></th> 
                            <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'add by/date')); ?></th>
                            <th width="5%" class="no-print"><?php echo ucwords(str_replace('_', ' ', 'action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
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
            // Processing indicator
            "processing": true,
            // DataTables server-side processing mode
            "serverSide": true,
            // Initial no order.
            "order": [],
            // Load data from an Ajax source
            "ajax": {
                "url": "<?php echo base_url('retirement/get_retirement_grants/'); ?>",
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

    

    function form_reset() {
        $('#formID')[0].reset(); // reset form on modals
        $('#error').html(" ");
        $('div[id=error]').html(" ");

    };  
 
  


</script>