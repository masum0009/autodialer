<?php
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
</style>
<?php //echo pr($callstatus); ?>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card overflow-auto">
                    <div class="card-header">
                        <strong style="font-size: large" class="card-title"><?php echo __('Call Back list'); ?></strong>
                        <button  class="btn btn-kk btn-space pull-right" id="button" type="submit" value="Create" onClick="document.location.href='<?php echo $this->Url->build(array('controller' => 'CallbackHistory','action' => 'update')); ?>'; return false;"><i class="fa fa-plus-square"></i> Update Forwarding Number </button>
                    </div>
                    <div class="card-body">
                        
                        <div class="tabcenter" align="center">
                            <?php echo $this->Form->create('CallbackHistory', array('action' => "index", 'id' => 'filter-form' , "style" => "")); ?>
                            <table border='0' align="center">
                                <tr>
                                    <td id="td">
                                        <?php echo $this->Form->input('call_from', array('label' => false, 'div' => false, 'required' => false, 'placeholder' => 'Phone Number', 'class' => 'form-control',)) ?>
                                    </td>

                                    <td id="td">
                                        <?php echo $this->Form->input('call_status_id', array('label' => false, 'required' => false,  'class' => 'form-control', 'placeholder' => 'status', 'options' => $callstatus, 'empty' => 'Select status')); ?>
                                    </td>

                                    <td id="td">
                                        <?php echo $this->Form->button('<span class="fa fa-filter"></span> Filter', array('type' => 'submit', 'value' => 'Filter', 'class' => 'form-control btn btn-info', 'escape' => false)); ?>
                                    </td>
                                    <td id="td">
                                        <button class="form-control btn btn-primary" type="submit" value="Reset"
                                                onClick="document.location.href='<?php echo $this->Url->build(array('action' => 'index' )); ?>'; return false;">
                                            <span class="fa fa-refresh"></span> Reset
                                        </button>
                                    </td>
                                </tr>
                            </table>
                            <br/>
                            <?php echo $this->Form->end(); ?>
                        </div>

                        <table class="table  table-bordered">
                            <thead style="background-color: rgba(0,0,0,.05);">
                            <tr>
                                <th>Customer Name</th>
                                <th><?php echo $this->Paginator->sort('Customer Number'); ?></th>
                                <th><?php echo $this->Paginator->sort('Received By'); ?></th>
                                <th><?php echo $this->Paginator->sort('Status'); ?></th>
                                <th><?php echo $this->Paginator->sort('Duration'); ?></th>
                                <th><?php echo $this->Paginator->sort('Time'); ?></th>
                                <!--<th class="actions">Action</th>-->
                            </tr>
                            </thead>
                            <?php if (!empty($call_histries)):  ?>
                                <tbody>
                                <?php foreach ($call_histries as $call): ?>
                                    <tr>
                                        <td><?= $call->client->fullname ?> </td>
                                        <td><?= $call->call_from ?></td>
                                        <td><?= $call->call_to ?></td>
                                        <td><?= $callstatus[$call->call_status] ?></td>
                                        <td><?= $call->call_duration ?></td>
                                        <td><?= date("h:i:s A d-M-Y", strtotime($call->created))?></td>
                    
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            <?php else: ?>
                                <tbody>
                                <tr>
                                    <td colspan="7" style="text-align: center"><strong style="font-size: large">No data
                                            found</strong></td>
                                </tr>
                                </tbody>
                            <?php endif ?>
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
                    <?php if (!empty($contacts)) { ?>
                        <div class="row ">
                            <div class="col-sm-12 col-md-5 ">
                                <?php echo $this->Paginator->counter(array('format' => __('   Page {:page} of {:pages}, Showing {:start}, to {:end} of {:count} entries'))); ?>
                            </div>

                            <div class="col-sm-12 col-md-7 dataTables_paginate paging_simple_numbers float-right">
                                <?php $params = $this->Paginator->params();
                                if ($params['pageCount'] > 1) { ?>
                                    <ul class="pagination pagination-sm">
                                        <?php echo $this->Paginator->prev('&larr; Previous', array('class' => 'paginate_button page-item prev', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                                        echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'class' => 'paginate_button page-item', 'currentClass' => 'active', 'currentTag' => 'a'));
                                        echo $this->Paginator->next('Next &rarr;', array('class' => 'paginate_button page-item next', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
                                        ?>
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<?php $this->start('script') ?>
<script>
    $(document).ready(function() {
        $("#filter-form").submit(function(e){
            if($('#call-from').val().length == 0 && $("#call-status-id").val().length == 0)
                return false;
        });
    });
</script>
<?php $this->end() ?>