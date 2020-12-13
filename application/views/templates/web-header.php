<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BFC | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.8/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/flat/blue.css">
    <link rel="icon" href="<?php echo base_url('assets/upload/images/'); ?>favicon.ico" type="image/x-icon">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style type="text/css">
  .login-background {
  background-image: url(<?php echo base_url('assets/upload/images/login-bg.jpeg'); ?>);
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  }
  .login-background:after{
  content: '';
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  width: 100%;
  background-color: rgba(0,0,0,.5);
  z-index: -1;
  }
  .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
    color: green;
    background-color: #e7e7e7;
}
.navbar-default .navbar-brand {
    color: #FFF;
}
.navbar-default .navbar-nav>li>a {
    color: #FFF;
}
.navbar-default {
    background-color: #00a65a;
    color: #FFFFFF;
    border: 0px !important;
    border-radius: 0px !important;
}

  </style>
  <body class="hold-transition " oncontextmenu="return false;">

 <?php $this->load->view('templates/web-nav'); ?>
 
<div class="box" style="margin-bottom: 0px; border-radius: 0;border-top: 0; position: unset; box-shadow: unset;"> <!-- class box ending tag is in endhtml.php -->

<div class="overlay">
  <i style="font-size: 50px;position: fixed;" class="fa fa-spinner fa-spin"></i>
</div>

  <script type="text/javascript">

//   document.onkeydown = function(e) {
//     if(event.keyCode == 123) {
//      return false;
//    }
// //    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
// //      return false;
// //    }
//    if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
//      return false;
//    }
//    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
//      return false;
//    }
//    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
//      return false;
//    }
//  }
</script>
  <?php
$this->load->view('templates/footer_link_1');
$this->load->view('templates/footer_link_2');

//$this->load->view('templates/topbar'); 


