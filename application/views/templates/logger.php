<?php
$admin_detail = $this->admin->getRecordById($_SESSION['admin_id'], $tbl_name = 'tbl_admin');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php $this->load->view('templates/alerts');?>

      <h1>
        <?php echo ucwords(str_replace('_', ' ', $page_title)); ?>
        <small><?php echo ucwords(str_replace('_', ' ', $description)); ?></small>
      </h1>

    </section>
    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <?php foreach ($all as $key => $allInfo) {?>


            <!-- timeline time label -->
            <li class="time-label">

          <?php if ($allInfo['action_type'] == 'add') {?>

                  <span class="bg-green">
                    <?php echo date("d-m-Y", strtotime($allInfo['record_add_date'])); ?>
                  </span>

          <?php } else if ($allInfo['action_type'] == 'update') {?>

                  <span class="bg-blue">
                    <?php echo date("d-m-Y", strtotime($allInfo['record_add_date'])); ?>
                  </span>

          <?php } else if ($allInfo['action_type'] == 'delete') {?>

            <span class="bg-red">
            <?php echo date("d-m-Y", strtotime($allInfo['record_add_date'])); ?>
            </span>

            <?php }?>

            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <?php if ($allInfo['action_type'] == 'add') {echo '<i class="fa fa-plus bg-green"></i>';} else if ($allInfo['action_type'] == 'update') {echo '<i class="fa fa-refresh bg-blue"></i>';}?>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?php echo date("d-m-Y h:i:s a", strtotime($allInfo['record_add_date'])); ?></span>

                <?php $getAdminDetail = $this->admin->getRecordById($allInfo['record_add_by'], $tbl_name = 'tbl_admin');?>

                <h3 class="timeline-header">Record <?php echo $allInfo['action_type']; ?> by <?php echo $getAdminDetail['name']; ?> </h3>


                <div class="timeline-footer">
                  <?php if ($allInfo['action_type'] == 'add') {?>

                  <span class="bg-green">
                    <a class="btn btn-success btn-xs"><?php echo ucwords($allInfo['action_type']) . ' : Detail of Record'; ?></a>
                  </span>

                  <?php } else if ($allInfo['action_type'] == 'update') {?>

                  <span class="bg-green">
                    <a class="btn btn-primary btn-xs"><?php echo ucwords($allInfo['action_type']) . ' : Detail of Record'; ?></a>
                  </span>

                  <?php }?>
                </div>

                <div class="timeline-body">
                  <div class="box-body table-responsive">
              <table id="ssp_datatable" class="table table-bordered table-striped table-hover table-condensed">
                <?php echo $allInfo['detail']; ?>
              </table></div>

                </div>
              </div>
            </li>
          <?php }?>



            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <!-- /.row -->

    </section>
    <!-- /.content -->

  </div>