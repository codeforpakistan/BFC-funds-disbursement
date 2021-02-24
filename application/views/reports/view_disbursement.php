<?php
$admin_detail = $this->admin->getRecordById($_SESSION['admin_id'], $tbl_name = 'tbl_admin');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php $this->load->view('templates/alerts'); ?>

        <h1>
            <?php
            //$getAmount = $this->common_model->getSumByColoumn('tbl_retirement_grant', 'grant_amount', 'total_amount', '1', '1');
            //echo '<pre>'; print_r($getAmount);
            ?>
            <?php echo ucwords(str_replace('_', ' ', $page_title)); ?>
            <small><?php echo ucwords(str_replace('_', ' ', $description)); ?></small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title pull-left"><?php echo ucwords(str_replace('_', ' ', 'grants details')); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="ssp_datatable" class="table table-bordered table-striped table-hover table-condensed">
                    <thead>
                        <tr>
                            <th width="2%"><?php echo ucwords(str_replace('_', ' ', 'Sr.')); ?></th>
                            <th width="15%"><?php echo ucwords(str_replace('_', ' ', 'Grants name')); ?></th>
                            <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'Amount Disbursed')); ?></th>
                            <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'Cases')); ?></th>
                            <th width="5%" class="no-print"><?php echo ucwords(str_replace('_', ' ', 'Action')); ?></th>
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
                "url": "<?php echo base_url('reports/get_disbursements_list/'); ?>",
                "type": "POST"
            },
            //Set column definition initialisation properties
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }],

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

                $(win.document.body)
                                .prepend('<div>Benevolanet Fund Cell KP<br>DISBURSEMENTS DETAILS</div>')
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