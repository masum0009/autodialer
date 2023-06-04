<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card overflow-auto">
                    <div class="card-header d-flex justify-content-between">
                        <h2>IPTSP</h2>
                        <button  class="btn btn-kk btn-space pull-right" id="button" type="submit" value="index" onClick="document.location.href='<?php echo $this->Url->build(array('controller' => 'iptsp','action' => 'add')); ?>'; return false;"><i class="fa fa-plus-square"></i> Add IPTSP </button>
                    </div>
                    <div class="card-body table-responsive-sm">
                        <table id="bootstrap-data-table" class="table table-bordered">
                            <thead style="background-color: rgba(0,0,0,.05);">
                            <tr>
                                <th><?php echo $this->Paginator->sort('client_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('User'); ?></th>
                                <th><?php echo $this->Paginator->sort('Password'); ?></th>
                                <th><?php echo $this->Paginator->sort('IP'); ?></th>
                                <th><?php echo $this->Paginator->sort('Port'); ?></th>
                                <th><?php echo $this->Paginator->sort('Number'); ?></th>
                                <th><?php echo $this->Paginator->sort('forwarding_number'); ?></th>
                                <th class="actions">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($iptsps as $iptsp):  //pr($iptsp); die(); ?>
                                <tr>
                                    <td>
                                    <?php echo $this->Html->link($iptsp->client->fullname, array('controller' => 'clients', 'action' => 'view', $iptsp->id)); ?>
                                    </td>
                                    <td nowrap><?php echo h($iptsp->iptsp_user); ?></td>
                                    <td nowrap><?php echo h($iptsp->iptsp_password); ?></td>
                                    <td nowrap><?php echo h($iptsp->iptsp_ip); ?></td>
                                    <td nowrap><?php echo h($iptsp->iptsp_port); ?></td>
                                    <td nowrap><?php echo h($iptsp->iptsp_number); ?></td>
                                    <td nowrap><?php echo h($iptsp->forwarding_number); ?></td>
                                    <td class="actions">
                                        <div style="width:160px">
                                            <div style="float: left; padding-left: 5px"><?php echo $this->Html->link('<i class="fa fa-edit"></i> Edit', array('action' => 'edit', $iptsp->id), array('escape' => false, 'class' => 'btn btn-secondary btn-sm', 'target' => '_self')); ?></div>
                                            <div style="float: left; padding-left: 5px"><?php echo $this->Form->postLink('<i class="fa fa-trash"></i> Delete', array('action' => 'delete', $iptsp->id), array('class' => 'btn btn-danger btn-sm', 'escape' => false), __('Are you sure you want to delete # %s?', $iptsp->id)); ?></div>
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