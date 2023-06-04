<?php //pr($gateways) ?>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card overflow-auto">
                    <div class="card-header d-flex justify-content-between">
                        <h2>Gateway</h2>
                        <button  class="btn btn-kk btn-space pull-right" id="button" type="submit" value="index" onClick="document.location.href='<?= $this->Url->build(['controller' => 'gateway','action' => 'add']) ?>'; return false;"><i class="fa fa-plus-square"></i> Add Gateway </button>
                    </div>
                    <div class="card-body table-responsive-sm">
                        <table id="bootstrap-data-table" class="table table-bordered">
                            <thead style="background-color: rgba(0,0,0,.05);">
                            <tr>
                                <th>Gateway Name</th>
                                <th>IP address</th>
                                <th>Port</th>
                                <th>Prefix</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Client</th>
                                <th class="actions"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($gateways as $gateway): ?>
                                
                                <tr>
                                    <td><?= $gateway->name ?></td>  
                                    <td><?= $gateway->ip ?></td>  
                                    <td><?= $gateway->port ?></td>  
                                    <td><?= $gateway->prefix ?></td>  
                                    <td><?= $gateway->user ?></td>  
                                    <td><?= $gateway->password ?></td>  
                                    <td>
                                    <?php if(isset($gateway->client->fullname)): ?>
                                        <a href="<?= $this->Url->build(['controller' => 'clients', 'action' => 'edit', $gateway->client->id]) ?>"> <?= $gateway->client->fullname ?> </a>
                                    <?php endif ?>
                                    </td>

                                    <td class="actions">
                                        <div style="width:160px">
                                            <div style="float: left; padding-left: 5px"><?php echo $this->Html->link('<i class="fa fa-edit"></i> Edit', array('action' => 'edit', $gateway->id), array('escape' => false, 'class' => 'btn btn-secondary btn-sm', 'target' => '_self')); ?></div>
                                            <div style="float: left; padding-left: 5px"><?php echo $this->Form->postLink('<i class="fa fa-trash"></i> Delete', array('action' => 'delete', $gateway->id), array('class' => 'btn btn-danger btn-sm', 'escape' => false), __('Are you sure you want to delete # %s?', $gateway['Gateway']['id'])); ?></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->


