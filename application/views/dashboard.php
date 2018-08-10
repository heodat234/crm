<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Customer Relationship Managerment - Hùng Minh ITS</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/main.css">
    <!-- Font-icon css-->
    <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- Customer CSS-->
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    
    <link rel="stylesheet" href="<?php echo base_url() ?>css/jquery.scrolling-tabs.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/customer.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/customer2.css">
    <!-- <link href="<?php echo base_url()?>bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" /> -->
  </head>
  <body class="app sidebar-mini rtl sidenav-toggled">
    <?php echo isset($mainview) ? $mainview : ''; ?>
    

    <!-- Essential javascripts for application to work-->
    <script src="<?=base_url()?>js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>js/popper.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>js/main.js"></script>
    <script src="<?=base_url()?>js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/plugins/chart.js"></script>
    <!-- <script type="text/javascript" src="<?=base_url()?>js/plugins/bootst
        rap-notify.min.js"></script> -->
    <script type="text/javascript" src="<?=base_url()?>js/plugins/sweetalert.min.js"></script>
    <script src="<?php echo base_url() ?>datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>datetimepicker-master/jquery.datetimepicker.css"/>
    <!-- <script type="text/javascript" src="<?php echo base_url() ?>bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script> -->
            <script src="<?php echo base_url() ?>js/jquery.scrolling-tabs.js"></script>
            <script type="text/javascript" src="<?=base_url()?>js/plugins/jquery.validate.min.js"></script>
            <script type="text/javascript" src="<?=base_url()?>ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?=base_url()?>ckfinder/ckfinder.js"></script>
    <?php echo isset($script) ? $script : ''; ?>
            <?php echo isset($script2) ? $script2 : ''; ?>
    
  </body>
</html>