<?php
    $qString =  $this->request->query();
    $conact_group_id = isset($qString['contact_groups_id']) && !empty($qString['contact_groups_id']) ? $qString['contact_groups_id'] : '';
    $contact_name = isset($qString['contact_name']) && !empty($qString['contact_name']) ? $qString['contact_name'] : '';
    $mobile_no = isset($qString['mobile_no']) && !empty($qString['mobile_no']) ? $qString['mobile_no'] : '';


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

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card overflow-auto">
                    <div class="card-header d-flex justify-content-between">
                        <h2 style="font-weight:bold; font-size:22px">Contacts</h2>
                        <button  class="btn btn-sm btn-primary pull-right" id="add-contact-btn" ><i class="fa fa-plus-square"></i> Add Contact </button>
                    </div>
                    <div class="card-body">
                        <!--id="bootstrap-data-table"-->
                        <div class="tabcenter" align="center">
                            <form action="<?= $this->Url->build(['controller' => 'contacts', 'action' => 'index']) ?>">
                            <table border='0' align="center">
                                <tr>
                        
                                    <td id="td">
                                        <?= $this->Form->input('contact_name', array('label' => false, 'div' => false, 'value' => $contact_name, 'required' => false, 'placeholder' => 'Filter contact name', 'class' => 'form-control',)) ?>
                                    </td>

                                    <td id="td">
                                        <?= $this->Form->input('mobile_no', array('label' => false, 'div' => false, 'value' => $mobile_no, 'required' => false, 'placeholder' => 'Filter by mobile number', 'class' => 'form-control',)) ?>
                                    </td>

                                    <td id="td">
                                        <?= $this->Form->input('contact_groups_id', array('label' => false, 'value' => $conact_group_id, 'required' => false, 'placeholder' => 'Filter by contact group', 'class' => 'form-control', 'placeholder' => 'filter status', 'options' => $contactGroups, 'empty' => 'Select contact group')); ?>
                                    </td>

                                    <td id="td">
                                        <?php echo $this->Form->button('<span class="fa fa-filter"></span> Filter', array('type' => 'submit', 'value' => 'Filter', 'class' => 'form-control btn btn-info', 'escape' => false)); ?>
                                    </td>
                                    <td id="td">
                                        <button class="form-control btn btn-primary" type="submit" value="Reset"
                                                onClick="document.location.href='<?php echo $this->Form->Url->build(array('action' => 'index' )); ?>'; return false;">
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
                                <th>Mobile No</th>
                                <th>Contact Name</th>
                                <th>Address</th>
                                <th>Contact Group Name</th>
                                <th class="actions">Action</th>
                            </tr>
                            </thead>
                            <?php if (!empty($contacts)): ?>
                            <tbody>
                            <?php foreach ($contacts as $contact): ?>
                                <tr>
                                    <td><?= $contact->mobile_no ?></td>
                                    <td><?= $contact->contact_name  ?></td>
                                    
                                    <td><?= $contact->address ?></td>
                                    <td><?= $this->Html->link($contact->contact_group->group_name, ['controller' => 'ContactGroups', 'action' => 'index']); ?></td>
                                    <td class="actions">
                                        <div class="d-flex justify-content-center">
                                            <div ><?= $this->Html->link('<i class="fa fa-edit"></i> Edit', array('action' => 'edit', $contact->id), array('escape' => false, 'class' => 'btn btn-secondary btn-sm', 'target' => '_self')); ?></div>
                                            <div style="float: left; padding-left: 5px"><?= $this->Form->postLink('<i class="fa fa-trash"></i> Delete', array('action' => 'delete', $contact->id), array('class' => 'btn btn-danger btn-sm', 'escape' => false, 'confirm' => 'Are you sure to delete this contact')); ?></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>

                            
                            <?php  else:  ?>
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
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->


<?php $this->start('script') ?>
<script>
    url = '<?= $this->Url->build(['controller' => 'contacts','action' => 'add']) ?>'
    $("#add-contact-btn").click(function(){
        let contact_gid = $("#contact-groups-id").val()
        if(contact_gid.trim().length != 0)
            url = url + '/' +  contact_gid
        
        window.location.href = url;
    });

</script>
<?php $this->end() ?>