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

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card overflow-auto">
                    <div class="card-header d-flex justify-content-between">
                        <h2 style="font-size: 23px !important; padding-top:7px !important"><b> <?php echo  "{$campaign->name} - Actions"; ?> </b></h2>
                        <div style="padding-top:7px !important">
                            <?= $this->element('cam_action') ?>
                            <?= $this->Html->link('<i class="fa fa-plus"></i> Actions', array('controller' => 'Actions', 'action' => 'add', $campaign->id), array('title' => 'Add New Action','escape' => false, 'class' => 'btn btn-primary btn-sm  my-1 ml-2', 'target' => '_self')); ?>
                        </div>
                    </div>

                    <div class="card-body">
                        <!--id="bootstrap-data-table"-->
                        
                        <table class="table  table-bordered">
                        <thead style="background-color: rgba(0,0,0,.05);">
                            <tr>
                                <!-- <th>Campaigns</th> -->
                                <th>Key Press</th>
                                <th>Action</th>
                                <th>Response</th>
                               
                                <th class="actions">Action</th>
                            </tr>
                            </thead>
                            <?php if ($actions->count()): ?>
                            <tbody>
                            <?php foreach ($actions as $action): ?>
                                <tr>
                                    <?php //echo $action->campaign->name  ?>
                                    <td><?= $action->key_press ?></td>
                                    <td><?= $actionList[$action->action] ?></td>
                                    <td>
                                        <a target="_blank" href="<?= $this->Url->build(['action' => 'view', $cid,  $action->id]) ?>"> <span class="badge badge-success">
                                        <?php
                                            $resp = 0;
                                            foreach($call_received_action_keys as $val){
                                                if($action->key_press == $val[0])
                                                    $resp =  $val[1];
                                            }
                                            echo $resp;
                                        ?>
                                        </span></a>
                                    </td>

                                    
                                    <td class="actions">
                                        <div class="d-flex justify-content-center">
                                            <div ><?= $this->Html->link('<i class="fa fa-edit"></i> Edit', array('action' => 'edit', $action->id, $cid), array('escape' => false, 'class' => 'btn btn-secondary btn-sm', 'target' => '_self')); ?></div>
                                            <div style="float: left; padding-left: 5px"><?= $this->Form->postLink('<i class="fa fa-trash"></i> Delete', array('action' => 'delete', $action->id, $cid), array('class' => 'btn btn-danger btn-sm', 'escape' => false), __('Are you sure you want to delete # %s?', $action->id)); ?></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>

                            
                            <?php  else:  ?>
                                <tbody>
                                <tr>
                                    <td colspan="7" style="text-align: center"><strong style="font-size: large">No data found</strong></td>
                                </tr>
                                </tbody>
                            <?php endif ?>
                        </table>
           
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->