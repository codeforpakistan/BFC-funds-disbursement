<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php $this->load->view('templates/alerts'); ?>

        <h1>
            <?php echo $page_title; ?>
            <small><?php echo $description; ?></small>
            <i><small style="float: right;"><?php echo $rightDescription; ?></small></i>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <? //echo '<pre>'; print_r($_SESSION); exit; ?>

        

            <!-- <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest Applications</h3> 
                </div> 
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>Application No</th>
                                    <th>Applicant Name</th>
                                    <th>Grant Type</th>
                                    <th>Status</th>
                                    <th>Entry Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // foreach($applications as $application) { 

                                //     $tbl_grants_id = $application['tbl_grants_id'];
                                //     $tbl_emp_info_id = $application['tbl_emp_info_id'];
                                //     $application_no = $application['application_no'];

                                //     $getTblName = $this->common_model->getRecordByColoumn('tbl_grants', 'id', $tbl_grants_id);
                                //     $grant_tbl_name = $getTblName['tbl_name'];
                                //     $grant_type = $getTblName['name'];

                                //     $getGrant  = $this->common_model->getRecordByColoumn($grant_tbl_name, 'application_no', $application_no);
                                //     $applicant_name = $getGrant['grantee_name'];
                                //     $entry_date = $getGrant['record_add_date'];
                                //     $tbl_case_status = $getGrant['tbl_case_status'];
                                    
                                //     $getStatus  = $this->common_model->getRecordByColoumn('tbl_case_status', 'id', $tbl_case_status);
                                //     $statusName = $getStatus['name'];
                                //     $statusLabel = $getStatus['label'];
                                //     $status = '<span class="'.$statusLabel.'">'.$statusName.'</span>';

                                    //$applicant = $this->common_model->getRecordById($id, $tbl_name);
                                    ?>
                                <tr>
                                    <td><a href="#"><?=$application['application_no'];?></a></td>
                                    <td><?=$applicant_name;?></td>
                                    <td><?=$grant_type;?></td>
                                    <td><?=$status;?></td>
                                    <td><?=$entry_date;?></td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                                    </td>
                                </tr> 
                                <?php //} ?>
                            </tbody>
                        </table>
                    </div> 
                </div> 
            </div> -->


            <div class="row">
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="<?php echo base_url('view_monthly_grants'); ?>">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?php echo $monthly_grants_applications; ?></h3>
                                <p>Monthly Grants</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="<?php echo base_url('view_retirement_grants'); ?>">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo $retirement_grants_applications; ?></h3>
                                <p>Retirement Grants</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="<?php echo base_url('view_scholarship_grants'); ?>">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo $scholarship_grants_applications; ?></h3>
                                <p>Scholarship Grants</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="<?php echo base_url('view_funeral_grants'); ?>">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo $funeral_grants_applications; ?></h3>
                                <p>Funeral Grants</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                        </div>
                    </a>
                </div>

            </div>



            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="<?php echo base_url('view_interest_free_loan_grants'); ?>">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo $interestfreeloan_grants_applications; ?></h3>
                                <p>Interest Free Loan Grants</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="<?php echo base_url('view_lumpsum_grants'); ?>">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo $lumpsum_grants_applications; ?></h3>
                                <p>Lumpsum Grants</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                        </div>
                    </a>
                </div>
                    

            <?php if ($_SESSION['admin_id'] == 1) {  ?>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="<?php echo base_url('view_department'); ?>">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo $departments; ?></h3>
                                <p>Total Departments</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                        </div>
                    </a>
                </div>


                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="<?php echo base_url('view_district'); ?>">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo $districts; ?></h3>
                                <p>Total Districts</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                        </div>
                    </a>
                </div>

            
 
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="<?php echo base_url('view_emp_info'); ?>">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo $usres; ?></h3>
                                <p>Registered Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                        </div>
                    </a>
                </div>

 
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="<?php echo base_url('view_banks'); ?>">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?php echo $banks; ?></h3>
                                <p>Total Banks</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                        </div>
                    </a>
                </div> 
                
            <?php } ?>

            </div>

        


    </section>
    <!-- /.content -->
</div>