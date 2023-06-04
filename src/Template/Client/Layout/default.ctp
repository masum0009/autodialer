<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        Autodialer Solutions : <?php //echo  $title_for_layout; ?>
    </title>
    <meta name="description" content="Auto Dialer">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"> -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <?= $this->Html->css('lib/chosen/chosen.min'); ?>
    <?= $this->Html->css('cs-skin-elastic'); ?>
    <?= $this->Html->css('lib/datatable/dataTables.bootstrap.min'); ?>
    <?= $this->Html->css('style'); ?>
    <?= $this->Html->css('bootstrap-custom'); ?>
    <?= $this->Html->css('bootstrap-datetimepicker'); ?>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <style>

        .navbar .navbar-nav li.menu-item-has-children .sub-menu a {
            padding: 2px 0 2px 40px;
        }

        #weatherWidget .currentDesc {
            color: #ffffff!important;
        }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }
        .breadcrumbs {
            margin-top: 10px;
        }
        .breadcrumbs .breadcrumbs-inner {
            background-color: #fff;
            border-radius: 15px;
        }

        .btn-kk{
            border-color: #ffffff;
            border-radius: 30px;
            background-color: white;
            border: 5px double #6c757d;
            color: black;
        }

        .btn-kk:hover {
            border-radius: 30px;
            border: 5px double black;
            background-color: #99abb4;
            color: white;
        }
        #footer {
            position: relative;
            border-radius: 10px;
            bottom: 10px;
            width: 100%;
            height: 3.5rem;
        }

        footer.site-footer .footer-inner {
            padding: 15px;
        }


		@media (max-width: 768px){
            .navbar {
                height: min-content;
            }

            .navbar .main-menu {
                float: none;
                padding-bottom: 10px;
            }

            #left-panel {
                max-width: max-content;
                width: fit-content;
                height: fit-content;
            }

            .navbar {
                width: 300px;
                height: min-content;
            }

            .right-panel .menutoggle {
                float: left;
                padding-right: 30px;
            }

        }

        .right-panel .navbar-brand{
            width: 160px !important;
        }
        #menuToggle{
            text-align: left !important;
        }
        .content{
            min-height: 540px !important;
        }
    </style>

</head>
<body class="open">

<aside id="left-panel" class="left-panel">
    <?= $this->element('menu') ?>
    
</aside>

<div id="right-panel" class="right-panel">

    <?=  $this->element('header') ?>

    <div class="form-group col-md-10 offset-md-1" id="alert">
        <strong style="font-size: x-large"> 
            <?= $this->Flash->render() ?>
        </strong>
    </div>

    <?= $this->fetch('content'); ?>

    <div class="clearfix"></div>

    <?=   $this->element('footer'); ?>


</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?= $this->Html->script('main'); ?>

<!--  Chart js -->
<?= $this->Html->script('lib/data-table/datatables.min'); ?>
<?= $this->Html->script('lib/data-table/dataTables.bootstrap.min'); ?>
<?= $this->Html->script('lib/data-table/dataTables.buttons.min'); ?>
<?= $this->Html->script('lib/data-table/buttons.bootstrap.min'); ?>
<?= $this->Html->script('lib/data-table/jszip.min'); ?>
<?= $this->Html->script('lib/data-table/vfs_fonts'); ?>
<?= $this->Html->script('lib/data-table/buttons.html5.min'); ?>
<?= $this->Html->script('lib/data-table/buttons.print.min'); ?>
<?= $this->Html->script('lib/data-table/buttons.colVis.min'); ?>
<?= $this->Html->script('init/datatables-init'); ?>

<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

<!--Chartist Chart-->
<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
<?= $this->Html->script('bootstrap-datetimepicker.min'); ?>

<?= $this->Html->script('init/fullcalendar-init'); ?>

<?= $this->Html->script('custom'); ?>

<?= $this->fetch('script')?>

</body>
</html>