<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Wadys Bistro</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <script src="<?php echo base_url()."assets/js/";?>jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url()."assets/css/";?>font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/css/";?>bootstrap/css/bootstrap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/css/";?>adminlte.min.css">
  <!--<script src="<?php //echo base_url()."assets/js/";?>getorgchart/getorgchart.js"></script> -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/css/";?>iCheck/flat/blue.css">
  
  <!--<link rel="stylesheet" href="<?php echo base_url()."assets/js/";?>getorgchart/getorgchart.css">-->

  <!-- Morris chart -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/css/";?>jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/css/";?>datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/css/";?>daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/css/";?>bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/css/";?>DataTables/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/js/";?>selectmania/select-mania.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/css/";?>wallet.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/css/";?>fileupload/jquery.fileupload.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<script src="<?php echo base_url()."assets/js/";?>jquery/modal.js"></script>
</head>
  <!-- jQuery -->
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()."assets/css/";?>bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()."assets/css/";?>sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url()."assets/js/";?>selectmania/select-mania.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url()."assets/css/";?>jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url()."assets/css/";?>jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()."assets/css/";?>knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php echo base_url()."assets/css/";?>daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url()."assets/css/";?>datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url()."assets/css/";?>bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url()."assets/css/";?>slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()."assets/css/";?>fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()."assets/js/";?>adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url()."assets/";?>js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()."assets/";?>js/demo.js"></script>
<script src="<?php echo base_url()."assets/";?>js/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url()."assets/";?>js/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url()."assets/";?>js/input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?php echo base_url()."assets/";?>css/DataTables/datatables.js"></script>
<script src="<?php echo base_url()."assets/";?>css/DataTables/rowgroups.js"></script>
<script src="<?php echo base_url()."assets/";?>css/DataTables/sum.js"></script>
<script src="<?php echo base_url()."assets/";?>js/angular.js"></script>
<script src="<?php echo base_url()."assets/";?>js/jspdf.js"></script>
<body class="hold-transition skin-blue sidebar-shown sidebar-mini">
<?php $this->load->view('layouts/header.php')?>
<?php $this->load->view('layouts/sidemenu.php')?>
 <?php
 if (isset($content_view) && $content_view != ""){
  $this->load->view($content_view);
  }
?>
</body>
</html>