<?php
    // pr($campaign);
?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
<style>
    .img-responsive, .thumbnail > img, .thumbnail a > img, .carousel-inner > .item > img, .carousel-inner > .item > a > img {
    display: block;
    max-width: 150px;
    height: auto;
    /* float: right; */
    }
    body {
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    align-content: center;
    }
    .row{
        width: 100%;
        display: flex;
        justify-content: space-between;
        
    }
    .col-md-6{
        width: 45%;
        border:1px solid #ccc;
        float: left;
    }

    .col-md-8{
        width: 75%;
        /* border:1px solid #ccc; */
        float: left;
    }


    .col-md-4{
        width: 30%;
        /* border:1px solid #ccc; */
        float: left;
    }

    .logo i{
        padding-top: 5px;
    }

    @media print {
    @page {
    margin: 1cm;
    size: letter portrait;
    padding: 3in .5in .75in .5in;
    }
    body {
    margin: 1cm;
    }
    }
</style>
<div class="row">
<div class="col-md-6">
        <table class="logo">
            <tr>
                <td style="text-align: left;">
                    <img src="<?=$this->Url->build('/img/logo.png', true) ?>" alt="Logo" class="img-responsive">
                    <p>
                        <strong style="font-size: large">Infosoftbd Solutions</strong><br/>
                        <i class="fa fa-home"> </i>
                        Sector #5, Road #1
                        House#38 (2nd floor)
                        Uttara, Dhaka-1230<br/>
                        <i class="fa fa-phone"> </i> +8801841137361<br/>
                        <i class="fa fa-envelope"> </i> info@infosoftbd.com<br/>
                    </p>
                </td>
            </tr>
        </table>
    </div>
<div class="col-md-6">
        <table class="table table-bordered table-striped client">
            <tbody>
                <tr>
                    <td colspan="3" style="font-weight:bold; padding: 5px;">
                        <strong style="font-size: 20">
                        <?php echo __('Customer Information:'); ?>
                        </strong>
                    </td>
                </tr>
               
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo __('Name '); ?></td>
                    <td>: <?php echo $campaign->client->fullname ?></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo __('Company '); ?></td>
                    <td>: <b><?php echo $campaign->client->company_name ?></b></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo __('Contacts : '); ?></td>
                    <td><small>
                        <?php
                            echo " <i class='fa fa-home'> </i> " . $campaign->client->address . "<br/>" . "<i class=\"fa fa-phone\">&nbsp;</i> " . $campaign->client->phone . " <br/>" . " <i class=\"fa fa-envelope\">&nbsp;</i> " . $campaign->client->email 
                        ?>
                         
                    </small></td>
              
            </tbody>
        </table>
    </div>

</div>
<br/>
<div class="row">
    <div class="col-md-8">
    <table>
    <tr>
        <td colspan="2"><span style="font-size:18px; font-weight:bold"> Campaign Information:</span></td>
    </tr>
    
    <tr>
        <td width="30%" style="text-align: left;"><b>Name </b></td>
        <td width="5%">:</td>
        <td width="65%"><?= $campaign->name ?></td>
    </tr>
    <tr>
        <td style="text-align: left;"><b>Started </b></td>
        <td>:</td>
        <td><?= $report['first_call_start'] ?></td>
    </tr>
    <tr>
        <td style="text-align: left;"><b>Finished </b></td>
        <td>:</td>
        <td><?= $report['last_call_end'] ?></td>
    </tr>
    <tr>
        <td style="text-align: left;"><b>Total Call Duration </b></td>
        <td>:</td>
        <td><?= $report['call_duration_in_hours'] ?></td>
    </tr>


    <tr>
        <td style="text-align: left;"><b>Total Voice Cost </b></td>
        <td>:</td>
        <?php
         
            if($campaign->gateway->created_by_admin)
                $voice_cost = (($report['call_duration'] / 60) * $campaign->gateway->call_rate) / 100; //conver to taka
            else
                $voice_cost = ($data['Received'] * $campaign->client->service_charge) / 100; //conver to taka
        ?>
        <td>Tk. <?= number_format($voice_cost, 2); ?></td>
    </tr>
    <?php if($call_forward_gw_created_by_admin): ?>
    <tr>
        <td style="text-align: left;"><b>Total Call Forwarding Cost </b></td>
        <td>:</td>
        <td>
            Tk. <?= $report['forward_call_cost']  ?> (<?= $report['forward_call_duration_in_hours'] ?>)
        </td>
    </tr>
    <?php endif ?>
    
    <tr>
        <td style="text-align: left;"><b>Total SMS Cost </b></td>
        <td>:</td>
        <?php
            $sms_cost = ($total_send_sms * $campaign->client->sms_rate) / 100;
        ?>
        <td>Tk. <?= number_format($sms_cost, 2); ?> (<?= $total_send_sms ?> sms sent.)</td>
    </tr>

    <tr>
        <td style="text-align: left;"><b>Total Cost </b></td>
        <td>:</td>
        <?php
            $cost = ($voice_cost + $sms_cost + $report['forward_call_cost']);
        ?>
        <td>Tk. <?= number_format($cost, 2); ?> </td>
    </tr>
    
    </table>

    </div>


    <div class="col-md-4">
        
        <table>
            <?php if($campaign->gateway->created_by_admin): ?>
                <tr>
                    <th width="45%" style="text-align: left;">Call Pulse</th>
                    <td width="10%">:</td>
                    <td width="45%"><?= $campaign->gateway->call_pulse ?> seconds</td>
                </tr>
                <tr>
                    <th style="text-align: left;">Call Rate</th>
                    <td>:</td>
                    <td>Tk. <?= $campaign->gateway->call_rate / 100 ?> </td>
                </tr>

            <?php else: ?>
                <tr>
                    <th width="60%" style="text-align: left;">Service Charge</th>
                    <td width="10%">:</td>
                    <td width="30%">Tk. <?= $campaign->client->service_charge / 100 ?> </td>
                </tr>

            <?php endif; ?>
            <tr>
                <th style="text-align: left;">SMS Rate</th>
                <td>:</td>
                <td>Tk. <?= $campaign->client->sms_rate /100 ?> </td>
            </tr>

        </table>
        
    </div>
</div>

<!-- Table for Details -->
<table class="details">
    <tr>
        <!-- Payment Info Slip Start-->
        <td>
        <table class="details">

<tr>
    <!-- Payment Info Slip Start-->
    <td>

        <table class="payment_details" style="margin-top: 10px;">
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
            $sl = 1;
         
            foreach ($data as $key => $val) { ?>
                <tr>
                    <td class=""><?php echo $sl++ ?></td>
                    <td class=""><?php echo $key ?></td>
                    <td class=""><?php echo $val ?></td>
                <td class="">
                        <?php echo $report["total_call"] ? number_format(($val / $calls->count()) * 100, 2, '.', '') . "%" : "0%"; ?> 
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
        </td>
    </tr>
</table>
<!-- Table for Details -->
</br>
</br>
<div style="float:right;">
    <p >
        <img style="margin-right:40px;" src="<?=$this->Url->build('/img/signature.png', true) ?>" alt="Logo" class="img-responsive">
        </br>
    </p>
    <p style="margin-right:30px;"><b>&nbsp;&nbsp;Company Signature</b></p>
</div>
<div">
</br>
</br>
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
    /* border-bottom: 2px solid #25221F; */
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
    margin-bottom: 1px;
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
    /*    table.details tr td {
    vertical-align: top;
    width: 30%;
    padding: 3px
    }*/
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