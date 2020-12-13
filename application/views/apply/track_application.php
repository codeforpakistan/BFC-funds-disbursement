<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <?php $this->load->view('templates/alerts'); ?>

        <h1>
            <?php echo ucwords(str_replace('_', ' ', $page_title)); ?> 
        </h1>
        <p><?php echo ucwords(str_replace('_', ' ', $description)); ?></p>
    </section>

    <!-- Main content -->
    <?php echo validation_errors(); ?>
 
    <?php
    if($exists > 0) {
        echo  '<h1>' .$application_no .' exists</h1>';
    } else {
        echo '<h1>Please enter correct application number.</h1>';
    }
    ?>

    <!-- /.content -->
</div>
  
