<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo APP_NAME . ' | ' . APP_DESCRIPTION ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/AdminLTE.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/custom.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/skins/_all-skins.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <?php $this->load->view("admin/template/header"); ?>
            <?php $this->load->view("admin/template/nav"); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>

                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Simple</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
                        <div class="box-header">

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Condensed Full Width Table</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                <?php echo form_open('','class="my_form" enctype="multipart/form-data" '); ?>
                                    <div class="form-group">
                                        <?php 
                                            echo form_label('Titulo','title');
                                        ?>
                                        <?php 
                                            $text_input = array(
                                                'name' => 'title',
                                                'id' => 'title',
                                                'value' => '',
                                                'class' => 'form-control input-lg',
                                            );

                                            echo form_input($text_input);
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <?php 
                                            echo form_label('Url limpia','url_clean');
                                        ?>
                                        <?php 
                                            $text_input = array(
                                                'name' => 'url_clean',
                                                'id' => 'url_clean',
                                                'value' => '',
                                                'class' => 'form-control input-lg',
                                            );

                                            echo form_input($text_input);
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <?php 
                                            echo form_label('Contenido','content');
                                        ?>
                                        <?php 
                                            $text_area = array(
                                                'name' => 'content',
                                                'id' => 'content',
                                                'value' => '',
                                                'class' => 'form-control input-lg',
                                            );

                                            echo form_input($text_area);
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <?php 
                                            echo form_label('Descripción','description');
                                        ?>
                                        <?php 
                                            $text_area = array(
                                                'name' => 'description',
                                                'id' => 'description',
                                                'value' => '',
                                                'class' => 'form-control input-lg',
                                            );

                                            echo form_input($text_area);
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <?php 
                                            echo form_label('Imagen','image');
                                        ?>
                                        <?php 
                                            $text_area = array(
                                                'name' => 'image',
                                                'id' => 'image',
                                                'value' => '',
                                                'type' => 'file',
                                                'class' => 'form-control input-lg',
                                            );

                                            echo form_input($text_area);
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <?php 
                                            echo form_label('Publicado', 'posted');
                                            echo form_dropdown('posted', $data_posted, null, 'class="form-control input-lg"');
                                        ?>
                                    </div>
                                    <?php echo form_submit('mysubmit','Guardar','class="btn btn-primary"') ?>
                                    
                                    <?php echo form_close(); ?>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php $this->load->view("admin/footer"); ?>
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->


        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/admin/adminlte.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/admin/demo.js"></script>
    </body>
</html>