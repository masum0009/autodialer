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

<br/>
<table>

    <tr>
        <th width="20%" style="text-align: left;"><b>Campaign Name </b></th>
        <td width="5%">:</td>
        <td width="75%"><?= $campaign->name ?></td>
    </tr>
    <tr>
        <th width="20%" style="text-align: left;"><b>Pressed Key </b></th>
        <td width="5%">:</td>
        <td width="75%"><?= $action->key_press ?></td>
    </tr>
    <tr>
        <th width="20%" style="text-align: left;"><b>Action </b></th>
        <td width="5%">:</td>
        <td width="75%"><?= $actionList[$action->action] ?></td>
    </tr>
    <?php if($action->action != 0): ?>
    <tr>
        <th width="20%" style="text-align: left;"><b>Content </b></th>
        <td width="5%">:</td>
        <td width="75%"><?= $action->action_data ?></td>
    </tr>
    <?php endif ?>

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
                                <th class="col-sm-12" colspan="8"><strong style="font-size: large">Contact Information</strong>
                                </th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Mobile No</th>
                                <th>Name</th>
                                <th>Address</th>
                            </tr>

                            <?php foreach($calls as $key => $call): ?>
                            <tr>
                               <td><?= ++$key ?></td>
                               <td><?= $call->contact_number ?></td>
                               <td><?= $call->contact->contact_name ?></td>
                               <td><?= $call->contact->address ?></td>
                            </tr>
                            <?php endforeach ?>
                            <br/>
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