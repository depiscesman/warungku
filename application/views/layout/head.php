<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta http-equiv="refresh" content="30"> -->
    <title><?php echo $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>">
   	<!-- Font Awesome Icons -->
    <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/ionicons.min.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css');?>">
     <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.css');?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css');?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/flat/blue.css');?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/morris/morris.css');?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css');?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css');?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker-bs3.css');?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">
     <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css');?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/select2.min.css');?>">
     <script src="<?php echo base_url('assets/plugins/jQuery/jQuery.min.js');?>"></script>

 <script>
     function jml(){
        var nilai1 = $('#saw').val();
        var nilai2 = $('#bk').val();
        var nilai3 = parseInt(nilai1)+parseInt(nilai2);
        if(nilai3 %1 ==0){
        $('#sak').val(nilai3);
        }else{
            $('#sak').val('');
        }
    }
    $(document).ready(function(){
        $('#saw').keyup(jml);
        $('#bk').keyup(jml);
    });
 </script>
  <script>
 //Jumlah stock akhir
    function kali(){
        var nilai1 = $('#qp').val();
        var nilai2 = $('#hb').val();
        var nilai3 = parseInt(nilai1)*parseInt(nilai2);
        if(nilai3 %1 ==0){
        $('#st').val(nilai3);
        }else{
            $('#st').val('');
        }
    }
    $(document).ready(function(){
        $('#qp').keyup(kali);
        $('#hb').keyup(kali);
    });
 </script>
</head>