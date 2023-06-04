<?php
    $call_status = [
        1 => "Trying",
        2 => "Ringing",
        3 => "Connected",
        4 => "Received",
        5 => "Failed",
        6 => "Connecting",
        7 => "Not Tried"
    ];

    $qString = $this->request->query();
    $filter_status = isset($qString['call_status']) && !empty($qString['call_status'])  ? $qString['call_status'] : '';
    $filter_number = isset($qString['contact_number']) && !empty($qString['contact_number'])  ? $qString['contact_number'] : '';

$templates = [ 
    'nextActive' => '<a class="page-link" href="{{url}}">{{text}}</a>',
    'nextDisabled' => '<a class="page-link" href="{{url}}" aria-disabled="true">{{text}}</a>',
    'prevActive' => '<a class="page-link" href="{{url}}" tabindex="-1" >{{text}}</a> ',
    'prevDisabled' => '<a class="page-link" href="{{url}}" tabindex="-1" aria-disabled="true">{{text}}</a>',
    'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'current' => '<li class="page-item"><a class="page-link" href="">{{text}}</a></li>',
    ];
?>

<style type="text/css">
    li {
        display: inline-block;
        width: auto;
        list-style: outside none none;
    }

    .tabcenter {
        text-align: center;
        border: 0;
    }

    .tabcenter table {
        border: 0;
    }

    .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 20px 0;
        border-radius: 4px;
    }

    .pagination > li {
        display: inline;
    }

    .pagination > li > a,
    .pagination > li > span {
        position: relative;
        float: left;
        padding: 6px 12px;
        line-height: 1.42857143;
        text-decoration: none;
        color: #337ab7;
        background-color: #fff;
        border: 1px solid #ddd;
        margin-left: -1px;
    }

    .pagination > li:first-child > a,
    .pagination > li:first-child > span {
        margin-left: 0;
        border-bottom-left-radius: 4px;
        border-top-left-radius: 4px;
    }

    .pagination > li:last-child > a,
    .pagination > li:last-child > span {
        border-bottom-right-radius: 4px;
        border-top-right-radius: 4px;
    }

    .pagination > li > a:hover,
    .pagination > li > span:hover,
    .pagination > li > a:focus,
    .pagination > li > span:focus {
        z-index: 2;
        color: #23527c;
        background-color: #eeeeee;
        border-color: #ddd;
    }

    .pagination > .active > a,
    .pagination > .active > span,
    .pagination > .active > a:hover,
    .pagination > .active > span:hover,
    .pagination > .active > a:focus,
    .pagination > .active > span:focus {
        z-index: 3;
        color: #fff;
        background-color: #337ab7;
        border-color: #337ab7;
        cursor: default;
    }

    .pagination > .disabled > span,
    .pagination > .disabled > span:hover,
    .pagination > .disabled > span:focus,
    .pagination > .disabled > a,
    .pagination > .disabled > a:hover,
    .pagination > .disabled > a:focus {
        color: #777777;
        background-color: #fff;
        border-color: #ddd;
        cursor: not-allowed;
    }

    .pagination-lg > li > a,
    .pagination-lg > li > span {
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.3333333;
    }

    .pagination-lg > li:first-child > a,
    .pagination-lg > li:first-child > span {
        border-bottom-left-radius: 6px;
        border-top-left-radius: 6px;
    }

    .pagination-lg > li:last-child > a,
    .pagination-lg > li:last-child > span {
        border-bottom-right-radius: 6px;
        border-top-right-radius: 6px;
    }

    .pagination-sm > li > a,
    .pagination-sm > li > span {
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
    }

    .pagination-sm > li:first-child > a,
    .pagination-sm > li:first-child > span {
        border-bottom-left-radius: 3px;
        border-top-left-radius: 3px;
    }

    .pagination-sm > li:last-child > a,
    .pagination-sm > li:last-child > span {
        border-bottom-right-radius: 3px;
        border-top-right-radius: 3px;
    }

    .pager {
        padding-left: 0;
        margin: 20px 0;
        list-style: none;
        text-align: center;
    }

    .pager li {
        display: inline;
    }

    .pager li > a,
    .pager li > span {
        display: inline-block;
        padding: 5px 14px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 15px;
    }

    .pager li > a:hover,
    .pager li > a:focus {
        text-decoration: none;
        background-color: #eeeeee;
    }

    .pager .next > a,
    .pager .next > span {
        float: right;
    }

    .pager .previous > a,
    .pager .previous > span {
        float: left;
    }

    .pager .disabled > a,
    .pager .disabled > a:hover,
    .pager .disabled > a:focus,
    .pager .disabled > span {
        color: #777777;
        background-color: #fff;
        cursor: not-allowed;
    }
    #filter-form button{
        width:100px !important;
    }

</style>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h2 style="font-size: 23px !important; padding-top:7px !important"><b> <?php echo  "{$campaign->name} Call Reports"; ?> </b></h2>
                        <div style="padding-top:7px !important">
                            <?= $this->element('cam_action') ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tabcenter" align="center">
                  
                            <form method="get" id="filter-form" class="form-inline" style="justify-content: center;" action="<?= $this->Url->build(['action' => 'report', $camid]) ?>">
                                    <?php echo $this->Form->input('contact_number', array('label' => false, 'div' => false, 'value' => $filter_number, 'required' => false, 'placeholder' => 'Contact Number',  'class' => 'form-control mr-2',)) ?>
                                    <?php echo $this->Form->input('call_status', array('label' => false, 'required' => false, 'value' => $filter_status, 'class' => 'form-control', 'placeholder' => 'status', 'options' => $call_status, 'empty' => 'Select status')); ?>
                                    <?php echo $this->Form->button('<span class="fa fa-filter"></span> Filter', array('type' => 'submit', 'value' => 'Filter', 'id' => 'filter-btn', 'class' => 'form-control  btn btn-primary ml-2 mr-2', 'escape' => false)); ?>
                                    <?php echo $this->Form->button('<span class="fa fa-download"></span> Export', array('type' => 'button', 'id' => 'export', 'class' => 'form-control btn btn-info ml-2 mr-2', 'escape' => false)); ?>

                     
                                <button class="form-control d-sm-inline-block btn btn-primary" type="submit" value="Reset"
                                                onClick="document.location.href='<?php echo $this->Url->build(array('action' => 'report/' . $camid)); ?>'; return false;">
                                            <span class="fa fa-refresh"></span> Reset
                                        </button>

                            <?php echo $this->Form->end(); ?>
                        </div>
                        
                        <table class="table  table-bordered">
                            <!--<table id="bootstrap-data-table-export" class="table  table-bordered">-->
                            <thead style="background-color: rgba(0,0,0,.05);">
                            <tr>
                              <!--  <th>Campaign Name</th> -->
                                <th>Contact Name</th>
                                <th>Contact Number</th>
                                <!--  <th>Status</th>     -->
                                <th>Duration</th>
                                <th>Time Details</th>
                                <th>Call Status</th>
                            </tr>
                            </thead>
                            <?php if (!empty($calls)) { ?>
                                <tbody>
                                <?php foreach ($calls as $call): ?>
                                    <tr>
                                      <!--     <td><?php echo h($call->campaign->name); ?>&nbsp;</td>     -->
                                        <td><?php echo ($call->contact)?h($call->contact->contact_name):"" ?></td>
                                        <td><?php echo h($call->contact_number); ?></td>
                                        <!--  <td><?php echo h($status[$call->campaign->status]); ?>   </td>   -->
                                        <td><?php echo ($call->call_status == 3)?(time() - $call->establish_time):($call->call_duration); ?> Sec   </td>
                                        <td>
                                            <?php
                                           
                                            $connect_time = ($call->connect_time != 0) ? date("d-M-y h:i A", $call->connect_time) : " Not Set";
                                            $establish_time = ($call->establish_time != 0) ? date("d-M-y h:i A", $call->establish_time) : " Not Set";
                                            $disconnect_time = ($call->disconnect_time != 0) ? date("d-M-y h:i A", $call->disconnect_time) : " Not Set";
                                            echo "Con: " . $connect_time;
                                            echo "</br>";
                                            echo "Est: " . $establish_time;
                                            echo "</br>";
                                            echo "Disc: " . $disconnect_time;
                                            ?>
                                        </td>
                                        <td>
                                        <?php
                                        if ($call->call_status == 4 && $call->call_duration > 0) echo "Received";
                                        else if ($call->call_status == 4 && $call->call_duration == 0)
                                            echo "Failed Count " . $call->retry_count;
                                            
                                        else if ($call->call_status == 3) echo "Connected";
                                        else if ($call->call_status == 2) echo "Ringing";
                                        else if ($call->call_status == 1) echo "Trying";
                                        else if($call->call_status == 0 && $call->connect_time !=0) echo "Connecting";
                                        else echo "Not Tried"

                                    ?>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            <?php } else { ?>
                                <tbody>
                                <tr>
                                    <td colspan="7" style="text-align: center"><strong style="font-size: large">No data
                                            found</strong></td>
                                </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                        <ul class="pagination">
                              <li class="page-item disabled">
                                  <?php echo $this->Paginator->prev('Previous',['templates'=>$templates]); ?>
                              </li>
                              <?php echo $this->Paginator->numbers(['templates'=>$templates]); ?>
                              <li class="page-item">
                                  <?php echo $this->Paginator->next('Next',['templates'=>$templates]); ?>
                              </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->start('script') ?>
    <script>
            $("#export").click(() => {
               
                if($("#contact-number").val().trim().length == 0 && $("#call-status").val().trim().length == 0 )
                    return false;

                $('<input>').attr({
                    type: 'hidden',
                    name: 'download',
                    class: 'download',
                    value: '1'
                }).appendTo('form');

                $("#filter-form").submit();
            });

            $("#filter-btn").click(() =>{
                event.preventDefault();
                $(".download").each((index, item) =>{
                    $(item).remove();
                })
                $("#filter-form").submit();
            })
    </script>

<?= $this->end() ?>