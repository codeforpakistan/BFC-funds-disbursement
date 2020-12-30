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
                <h3 class="box-title pull-left"><?php echo ucwords(str_replace('_', ' ', 'Employee Info detail')); ?></h3>
                <!--  <h3 class="box-title pull-right">
                <a href="<?php echo base_url(); ?>add_admin" type="button" class="btn btn-block btn-danger btn-sm"><i class="fa fa-trash-o"> all </i></a></h3> -->

                <h3 class="box-title pull-right">
                    <?php 
                    //echo 'admin_id = '. $_SESSION['tbl_admin_role_id']; exit;
                    if ($_SESSION['tbl_admin_role_id'] == '1' || $_SESSION['tbl_admin_role_id'] == '4' || $_SESSION['tbl_admin_role_id'] == '6' || $_SESSION['tbl_admin_role_id'] == '7') { ?>
                        <a href="<?php echo base_url('add_emp_info'); ?>" type="button" class="btn btn-block btn-success btn-sm"><i class="fa fa-plus"> New </i></a>
                    <?php } ?>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="ssp_datatable" class="table table-bordered table-striped table-hover table-condensed">
                    <thead>
                        <tr>
                            <th width="2%"><?php echo ucwords(str_replace('_', ' ', 'Sr.')); ?></th>
                            <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'Grantee name')); ?></th>
                            <th width="6%"><?php echo ucwords(str_replace('_', ' ', 'contact_no')); ?></th>
                            <th width="6%"><?php echo ucwords(str_replace('_', ' ', 'CNIC_no')); ?></th>
                            <th width="6%"><?php echo ucwords(str_replace('_', ' ', 'personnel_no')); ?></th>
                            <th width="6%"><?php echo ucwords(str_replace('_', ' ', 'date of birth')); ?></th>
                            <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'add by/date')); ?></th>
                            <th width="3%" class="no-print"><?php echo ucwords(str_replace('_', ' ', 'action')); ?></th>
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
<style type="text/css">
    input {
        background: transparent;
        border: none;
        height: 40px;
    }

    .sselect {
        background: transparent;
        border: none;
        height: 40px;
        color: #000;
    }

    .sselect {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        padding: 2px 30px 2px 2px;
        border: none;
    }

    .tdva {
        font-weight: bold;
        vertical-align: middle !important;
    }
</style>
<div id="modal_form" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo ucwords(str_replace('_', ' ', 'Employee Info Detail')); ?></h4>

            </div>
            <p class="jquery_alert_modal"></p>


            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-condensed">
                        <tr>
                            <td class="tdva"><?php echo ucwords(str_replace('_', ' ', 'grantee_name')); ?></td>
                            <td><input type="text" disabled readonly name="grantee_name"></td>
                            <td class="tdva"><?php echo ucwords(str_replace('_', ' ', 'father name')); ?></td>
                            <td><input type="text" disabled readonly name="father_name"></td>
                        </tr>
                        <tr>
                            <td class="tdva"><?php echo ucwords(str_replace('_', ' ', 'contact_no')); ?></td>
                            <td><input type="text" disabled readonly name="contact_no"></td>
                            <td class="tdva"><?php echo ucwords(str_replace('_', ' ', 'marital_status')); ?></td>
                            <td><input type="text" disabled readonly name="marital_status"></td>
                        </tr>
                        <tr>
                            <td class="tdva"><?php echo ucwords(str_replace('_', ' ', 'Department')); ?></td>
                            <td><select class="sselect" disabled readonly name="tbl_department_id" id="tbl_department_id" style="width: 100%">
                                    <?php foreach ($department as $departmentInfo) : ?>
                                        <option value="<?php echo $departmentInfo['id']; ?>"><?php echo $departmentInfo['name']; ?></option>
                                    <?php endforeach; ?>
                                </select></td>
                            <td class="tdva"><?php echo ucwords(str_replace('_', ' ', 'post')); ?></td>
                            <td><select class="sselect" disabled readonly name="tbl_post_id" id="tbl_post_id" style="width: 100%">
                                    <?php foreach ($post as $postInfo) : ?>
                                        <option value="<?php echo $postInfo['id']; ?>"><?php echo $postInfo['name']; ?></option>
                                    <?php endforeach; ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td class="tdva"><?php echo ucwords(str_replace('_', ' ', 'pay_scale')); ?></td>
                            <td><input type="text" disabled readonly name="pay_scale"></td>
                            <td class="tdva"><?php echo ucwords(str_replace('_', ' ', 'district')); ?></td>
                            <td>
                                <select class="sselect" disabled readonly name="tbl_district_id" id="tbl_district_id" style="width: 100%">
                                    <?php foreach ($district as $districtInfo) : ?>
                                        <option value="<?php echo $districtInfo['id']; ?>"><?php echo $districtInfo['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdva"><?php echo ucwords(str_replace('_', ' ', 'cnic_no')); ?></td>
                            <td><input type="text" disabled readonly name="cnic_no"></td>
                            <td class="tdva"><?php echo ucwords(str_replace('_', ' ', 'Date of birth')); ?></td>
                            <td><input type="text" disabled readonly name="dob"></td>
                        </tr>
                        <tr>
                            <td class="tdva"><?php echo ucwords(str_replace('_', ' ', 'office_address')); ?></td>
                            <td><input type="text" disabled readonly name="office_address"></td>
                            <td class="tdva"><?php echo ucwords(str_replace('_', ' ', 'other_address')); ?></td>
                            <td><input type="text" disabled readonly name="other_address"></td>
                        </tr>
                        <tr>
                            <td class="tdva"><?php echo ucwords(str_replace('_', ' ', 'status')); ?></td>
                            <td><input type="text" disabled readonly name="status"></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>



        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- /.content-wrapper -->

<!-- Grants Modal -->
<div id="grantsModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Grants Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Grants List</h4>
      </div>
      <div class="modal-body grantsBody">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- for image / gallery -->
<script>
    baguetteBox.run('.tz-gallery');
</script>

<script type="text/javascript">


    var save_method; //for save method string
    var sspDataTable;
    $(document).ready(function() {
        // $(".grantsPopUp").click(function() { //alert('i m here')
        //     var empID = $(this).data('id');
        //     $(".grantsBody #empID").val(empID);
        // });


        sspDataTable = $('#ssp_datatable').DataTable({
            // Processing indicator
            "processing": true,
            // DataTables server-side processing mode
            "serverSide": true,
            // Initial no order.
            "order": [],
            //gkhgk
            
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            // Load data from an Ajax source
            "ajax": {
                "url": "<?php echo base_url('emp_info/get_emp_info/'); ?>",
                "type": "POST"
            },
            //Set column definition initialisation properties
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }]
        });

        // for form error validation
        // $('#error').html(" ");
        // $('div[id=error]').html(" ");

        // $('#formID input').on('keyup', function () {
        //     $(this).removeClass('is-invalid').addClass('is-valid');
        //     $(this).parents('.form-group').find('#error').html(" ");
        // });
    });

    function reload_table() {
        ssp_datatable.ajax.reload(null, false); //reload datatable ajax
    }
</script>
<script type="text/javascript">
    // getData function for get data for editment and updating
    function getData(id) {

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('emp_info/getData/') ?>/" + id,
            type: "post",
            dataType: "JSON",
            success: function(data) {

                $('[name="grantee_name"]').val(data.grantee_name);
                $('[name="father_name"]').val(data.father_name);
                $('[name="contact_no"]').val(data.contact_no);
                $('[name="marital_status"]').val(data.marital_status);
                $('[name="pay_scale"]').val(data.pay_scale);
                $('[name="cnic_no"]').val(data.cnic_no);

                var dob = moment(data.dob, "YYYY-MM-DD").format("DD-MM-YYYY");
                $('[name="dob"]').val(dob);

                $('[name="office_address"]').val(data.office_address);
                $('[name="other_address"]').val(data.other_address);

                var record_add_date = moment(data.record_add_date, "YYYY-MM-DD").format("DD-MM-YYYY");
                $('[name="record_add_date"]').val(record_add_date);

                $('[name="father_name"]').val(data.father_name);
                $('[name="father_name"]').val(data.father_name);

                $('#tbl_department_id').val(data.tbl_department_id).trigger('change');
                $('#tbl_post_id').val(data.tbl_post_id).trigger('change');
                $('#tbl_district_id').val(data.tbl_district_id).trigger('change');

                if (data.status == '1') {
                    $('[name="status"]').val('Active');
                } else {
                    $('[name="status"]').val('Inactive');
                }
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded


            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from database');
            }

        });
    }

    function getGrants(id) {
        //alert(id);
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('emp_info/getGrants/') ?>/" + id,
            type: "post",
             
            success: function(data) {
                //alert(data);
                $('.grantsBody').html(data);
                $('#grantsModal').modal('show'); 
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from database');
            }

        });
        }

</script>