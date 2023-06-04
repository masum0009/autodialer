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
<table>
    <tr>
        <td colspan="2"><span style="font-size:18px; font-weight:bold"> Campaign Information:</span></td>
    </tr>
    
    <tr>
        <td width="20%" style="text-align: left;"><b>Name </b></td>
        <td width="5%">:</td>
        <td width="75%"><?= $campaign->name ?></td>
    </tr>
    <tr>
        <td style="text-align: left;"><b>Started </b></td>
        <td>:</td>
        <td><?= $campaign->started ?></td>
    </tr>
    <tr>
        <td style="text-align: left;"><b>Finished </b></td>
        <td>:</td>
        <td><?= $campaign->finished ?></td>
    </tr>
    
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
                                <th class="col-sm-12" colspan="8"><strong style="font-size: large">Campaign Call Information</strong>
                                </th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Mobile No</th>
                                <th>Duration</th>
                                <th>Status</th>
                                <th>Retry</th>
                                <th>Connect </th>
                                <th>Disconnect</th>
                                <th>Cost(Tk)</th>
                            </tr>
                            <?php
                                $total_cost = 0;
                                $allInformation = ["Received" => 0, "Failed" => 0, "Connected" => 0, "Ringing" => 0, "Trying" => 0, "Connecting" => 0];
                                
                                foreach ($calls as $key => $call)
                                { ?>
                            <tr>
                                <td style="text-align: center"><?php echo ++$key ?></td>
                                <td style="text-align: center"><?php echo $call->contact_number ?></td>
                                <td style="text-align: center"><?php echo $call->call_duration ?> sec</td>
                                <td style="text-align: center">
                                    <?php
                                        if ($call->call_status == 4 && $call->call_duration > 0)
                                        {
                                            $callStatus = "Received";
                                            $allInformation['Received'] += 1;
                                        }
                                        elseif ($call->call_status == 4 && $call->call_duration == 0 && $call->retry_count == $campaign->max_call_retry)
                                        {
                                            $callStatus = "Failed";
                                            $allInformation['Failed'] += 1;
                                        }
                                        elseif ($call->call_status == 3)
                                        {
                                            $callStatus = "Connected";
                                            $allInformation['Connected'] += 1;
                                        }
                                        elseif ($call->call_status == 2)
                                        {
                                            $callStatus = "Ringing";
                                            $allInformation['Ringing'] += 1;
                                        }
                                        elseif ($call->call_status == 1)
                                        {
                                            $callStatus = "Trying";
                                            $allInformation['Trying'] += 1;
                                        }
                                        elseif ($call->call_status == 0)
                                        {
                                            $callStatus = "Connecting";
                                            $allInformation['Connecting'] += 1;
                                        }
                                        echo $callStatus
                                        ?>
                                </td>
                                <td style="text-align: center"><?php echo $call->retry_count ?></td>
                                <td style="text-align: center"><small><?php date_default_timezone_set('Asia/Dhaka');
                                    $connect_time = (isset($call->establish_time) && $call->establish_time != 0) ? date("h:i:s A", $call->establish_time) : " Not Set";
                                    echo $connect_time
                                    ?></small></td>
                                <td style="text-align: center"><small><?php
                                    $disconnect_time = (isset($call->disconnect_time) && $call->establish_time != 0) ? date("h:i:s A d/m/y", $call->disconnect_time) : " Not Set";
                                    echo $disconnect_time
                                    ?></small></td>
                                <td style="text-align: center">
                                    <?php
                                        // pr($campaign);
                                        if ($call->call_status == 4 && $call->call_duration > 0)
                                        {
                                            if($campaign->gateway->created_by_admin){
                                                $reminder = $call->call_duration % $campaign->gateway->call_pulse;
                                                $call_duration = $reminder > 0 ? ($call->call_duration - $reminder) + $campaign->gateway->call_pulse : $call->call_duration;
                                                $cost = (($call_duration / 60 ) * $campaign->gateway->call_rate) / 100;
                                                echo "Tk. " .number_format($cost, 2);
                                                $total_cost += $cost;
                                            }
                                            else{
                                                $cost = ($allInformation['Received'] * $campaign->client->service_charge) / 100;
                                                echo "Tk. " .number_format($cost, 2);
                                                $total_cost += $cost;
                                            }
                                      
                                        }
                                        else{
                                            echo "0.00";
                                        }
                                        
                                        ?>
                                </td>
                            </tr>
                            <?php
                                } ?>
                            <tr>
                                <td colspan="7" style="text-align: right;"> Total Cost </td>
                                <td style="text-align: center"><?php echo "Tk.".  number_format($total_cost , 2) ?>  </td>
                            </tr>
                            <br/>
                            <span>
                                <b> Call Report : Total : <b>
                                <?php
                                    echo isset($key) ? $key : 0;
                                    foreach ($allInformation as $key => $value)
                                    {
                                        if ($value > 0)
                                        {
                                            echo ", " . str_replace("_", " ", $key) . " : {$value}";
                                        }
                                    
                                    }
                                    
                                    ?>
                            </span>
                            <small style="float:right; padding-right : 3px;">
                                Date : 
                                <?php
                                    date_default_timezone_set('Asia/Dhaka');
                                    echo date("D d/M/Y h:i A"); 
                                ?>
                            </small>
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