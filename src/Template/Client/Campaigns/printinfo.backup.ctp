<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
<style>
    .img-responsive, .thumbnail > img, .thumbnail a > img, .carousel-inner > .item > img, .carousel-inner > .item > a > img {
        display: block;
        max-width: 150px;
        height: auto;
        float: right;
    }
    body {
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        align-content: center;
    }
    @media print {
        @page {
            margin: 0;
        }

        body {
            margin: 1.6cm;
        }
    }
</style>
<table class="logo">
    <tr>
        <td>

        </td>
        <td><p style="text-align: right;">
                <img src="<?= $this->Url->build('img/logo.png', true) ?>" alt="Logo" class="img-responsive">
                </br>
            </p>
            <p style="text-align: right;"><br/>
                <strong style="font-size: large">Infosoftbd Solutions</strong><br/>
                <i class="fa fa-home"> </i>
                Sector #5; Road#1<br/>
                House#38 (2nd floor)<br/>
                Uttara, Dhaka-1230<br/>
                <i class="fa fa-phone"> </i> +8801841137361<br/>
                <i class="fa fa-envelope"> </i> info@infosoftbd.com<br/>
            </p>
        </td>
    </tr>
</table>
<div style="float:right;">
    <b style="margin-left:2px;">Date : <span class="text-danger"><?php date_default_timezone_set('Asia/Dhaka'); echo date("D d/M/Y h:i A"); ?>&nbsp;</span></b>
</div>
<!--First table-->

<table class="table table-bordered table-striped">
    <tbody>
    <tr>
        <td colspan="3" style="font-weight:bold;">
            <strong style="font-size: x-large"> Customer details </strong>
        </td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo __('Customer Name '); ?></td>
        <td>: <?php echo $campaign->client->fullname ?></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo __('Company Name '); ?></td>
        <td>: <b><?php echo $campaign->client->company_name ?></b></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo __('Address: '); ?></td>
        <td><small><?php echo "<i class='fa fa-home'> </i>". $campaign->client->address ."<br/>"."<i class=\"fa fa-phone\">&nbsp;</i>" . $campaign->client->phone . "<br/>"."<i class=\"fa fa-envelope\">&nbsp;</i>". $campaign->client->email ?></small></td>
    </tr>
    
    </tbody>
</table>
<!-- Table for Details -->
<div style="float:right;">
    <table>
        <tr>
            <td><br/>
                <p style="text-align: right;">
                    <table style="border: 1px" class="payment_details">
                        <tr>
                            <th colspan="2" style="text-align: center;background-color: #aaa5a6">
                                <strong style="font-size: large">Campaign Cost</strong>
                            </th>
                        </tr>
                        <tr>
                            <td>Call Rate</td>
                            <td> <?php echo ($campaign->call_rate == 0) ? "Self Cost" : $campaign->call_rate . " Taka (Per Minute)";?></td>
                        </tr>
                        <tr>
                            <td>Server Rate</td>
                            <td> <?php echo ($campaign->service_rate == 0)? "Not set" : $campaign->service_rate . " Taka (Per Call)";?></td>
                        </tr>
                    <?php if ($campaign->service_rate >0) {?>
                        <tr>
                            <td>Server Cost</td>
                            <td><?php
                                $service_cost = $report['call_received'] * $campaign->service_rate;
                                echo number_format($service_cost, 2, '.', '')." Taka" ?>
                            </td>
                        </tr>
                    <?php } ?>
        
                    <?php if ($campaign->call_rate > 0 && $report['call_duration']> 0 ) {?>
                        <tr>
                            <td>Call Cost</td>
                            <td>
                                <?php
                                    $call_cost = $campaign->call_duration * ($campaign->call_rate / 60);
                                    echo number_format($call_cost, 2, '.', '')." Taka"
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
        
                    <?php if ($campaign->call_rate > 0 || $campaign->service_rate > 0) {?>
                        <tr>
                            <td>Total Cost</td>
                            <td><?php
                                $cost=0;
                                if($campaign->call_rate > 0 || $campaign->service_rate > 0)
                                    $cost = $call_cost + $service_cost;
                                elseif($campaign->call_rate > 0)
                                    $cost = $$call_cost;
                                elseif( $campaign->service_rate > 0 )
                                    $cost = $service_cost;
                                echo number_format($cost, 2, '.', '')." Taka" ?></td>
                        </tr>
                    <?php } ?>
                    
                    
                    </table>
                </p>
            </td>
        <td>
        &nbsp;
    </td>
    </tr>
    </table>
</div>
<!--Scond table-->

<table class="table table-bordered table-striped">
    <tbody>
    <tr>
        <td colspan="3" style="font-weight:bold;">
            <strong style="font-size: x-large"><?php echo __('Campaign details:'); ?></strong>
        </td>
    </tr>
    <tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo __('Campaign Name'); ?></td>
        <td>: <?php echo $campaign->name; ?></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo __('Total Received Call'); ?> </td>
        <td >: <strong><?php echo $report['call_received'] ?> </strong></td>
    </tr>

    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo __('Total Duration'); ?></td>
        <td>: <?php
            echo $seconds = $report['call_duration_in_hours'];
            ?></td>
    </tr>

    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo __('Gateway Name'); ?> </td>
        <td>: <?php  echo $campaign->gateway->name ?></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo __('Gateway IP'); ?> </td>
        <td>: <?php echo $campaign->gateway->ip ?></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo __('Frequency'); ?> </td>
        <td>: <?php echo $campaign->frequency ?></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo __('Started'); ?> </td>
        <td>: <?php echo $report['first_call_start'] ?></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo __('Finished'); ?> </td>
        <td>: <?php echo $report['last_call_end']  ?></td>
    </tr>
    </tbody>
</table>
<!-- Table for Details -->

<table class="details">

    <tr>
        <!-- Payment Info Slip Start-->
        <td>

            <table class="details">

                <tr>
                    <!-- Payment Info Slip Start-->
                    <td>

                        <table class="payment_details">
                            <tr>
                                <th colspan="4"><strong style="font-size: large">Call Report</strong></th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Status</th>
                                <th>Quantity</th>
                                <th>Percentage(%)</th>
                            </tr>
                            
                            <?php
                            $history = array();
                         
                            foreach ($calls as $key => $call) { ?>
                                <tr>
                                    <td class=""><?php echo ++$key ?></td>
                                    <td class=""><?php echo $call_status[$call->call_status] ?></td>
                                    <td class=""><?php echo $call->count; ?></td>
                                <td class="">
                                        <?php echo $report["total_call"] ? number_format(($call->count / $report['total_call']) * 100, 2, '.', '') . "%" : "0%"; ?> 
                                </td>
                            </tr>

                            <?php } ?>

                            <tr>
                                <td style="border: none">&nbsp;</td>
                                <td style="border: none;text-align:right"><strong>Total = </strong></td>
                                <td class=""><?php echo $report['total_call']; ?></td>
                                <td class=""> 100%</td>
                            </tr>
                        </table>
                        <!-- Table for Details -->
                    </td>

                </tr>

            </table>
            <!-- Table for Details -->
            <!-- Table for Details -->
        </td>

    </tr>

</table>
<!-- Table for Details -->

<div style="float:right;">
    <p >
    <img style="margin-right:40px;" src="img/signature.png" alt="Logo" class="img-responsive">
    </br>
    </br>
    </p>
    <p style="margin-right:30px;"><b>&nbsp;&nbsp;Company Signature</b></p>
</div>
<div">
</br>
</br>
</br>
<b style="margin-left:50px;">Customer Signature</b>
</div>

<style type="text/css">
    @media print {
        body {
            -webkit-print-color-adjust: exact;
        }

        table.details tr th {
            background-color: #F2F2F2 !important;
        }

        .print_bg {
            background-color: #F2F2F2 !important;
        }
    }

    .print_bg {
        background-color: #F2F2F2 !important;
    }

    body {
        font-family: arial, helvetica;
        font-size: 13px;
        color: #000000;
    }

    table.logo {
        --border: 1px solid #000;
        border-collapse: inherit;
        width: 100%;
        margin-bottom: 10px;
        padding: 10px;


        border-bottom: 2px solid #25221F;

    }

    table.emp {
        --border: 1px solid #000;
        width: 100%;
        margin-bottom: 10px;
        --background-color: #F2F2F2;

    }

    table.details, table.payment_details {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;

    }

    table.payment_total {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 10px;

    }

    table.emp tr td {
        width: 30%;
        padding: 10px
    }

    table.details tr th {
        border: 1px solid #000000;
        background-color: #F2F2F2;
        font-size: 15px;
        padding: 10px
    }

    table.details tr td {
        vertical-align: top;
        width: 30%;
        padding: 3px
    }

    table.payment_details > tbody > tr > td {
        border: 1px solid #000000;
        padding: 5px;

    }

    table.payment_total > tbody > tr > td {
        padding: 5px;
        width: 60%
    }

    table.logo > tbody > tr > td {
        border: 1px solid transparent;
    }
</style>
<script type="text/javascript">
    
    setTimeout(function () {
        if (typeof (window.print) != 'undefined') {
            // window.print();
            // window.close();
        }
    }, 1500);
</script>