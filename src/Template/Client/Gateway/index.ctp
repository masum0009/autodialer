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

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card overflow-auto">
                    <div class="card-header d-flex justify-content-between">
                        <h2 style="font-size:22px; font-weight:bold">Gateway</h2>
                        <button  class="btn btn-sm btn-primary pull-right" id="button" type="submit" value="index" onClick="document.location.href='<?= $this->Url->build(['controller' => 'gateway','action' => 'add']) ?>'; return false;"><i class="fa fa-plus-square"></i> Add Gateway </button>
                    </div>
                    <div class="card-body table-responsive-sm">
                        <table  class="table table-bordered">
                            <thead style="background-color: rgba(0,0,0,.05);">
                            <tr>
                                <th>Name</th>
                                <th>IP address</th>
                                <th>Port</th>
                                <th>Prefix</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th class="actions"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($gateways as $gateway): ?>
                                <tr>
                                    <td><?= $gateway->name ?></td>  
                                    <td><?= $gateway->client_id != 0 ? $gateway->ip : '' ?></td>  
                                    <td><?= $gateway->client_id != 0 ? $gateway->port : '' ?></td>  
                                    <td><?= $gateway->client_id != 0 ? $gateway->prefix : '' ?></td>  
                                    <td><?= $gateway->client_id != 0 ? $gateway->user : '' ?></td>  
                                    <td><?= $gateway->client_id != 0 ? $gateway->password : '' ?></td>  

                                    <td class="actions">
                                        <div style="width:160px">
                                           <?php if($gateway->client_id != 0): ?>
                                            <div style="float: left; padding-left: 5px"><?php echo $this->Html->link('<i class="fa fa-edit"></i> Edit', array('action' => 'edit', $gateway->id), array('escape' => false, 'class' => 'btn btn-secondary btn-sm', 'target' => '_self')); ?></div>
                                            <div style="float: left; padding-left: 5px"><?php echo $this->Form->postLink('<i class="fa fa-trash"></i> Delete', array('action' => 'delete', $gateway->id), array('class' => 'btn btn-danger btn-sm', 'escape' => false), __('Are you sure you want to delete # %s?', $gateway['Gateway']['id'])); ?></div>
                                            <?php endif ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
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


