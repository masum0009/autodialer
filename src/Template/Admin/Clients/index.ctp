<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card overflow-auto">
                    <div class="card-header d-flex justify-content-between">
                        <h2>Clients</h2>
                        <button  class="btn btn-kk btn-space pull-right" id="button" type="submit" value="Create" onClick="document.location.href='<?php echo $this->Url->build(array('controller' => 'clients','action' => 'add')); ?>'; return false;"><i class="fa fa-plus-square"></i> Add Client </button>
                    </div>
                    <div class="card-body table-responsive-sm">
                        <table id="bootstrap-data-table" class="table table-bordered">
                            <thead style="background-color: rgba(0,0,0,.05);">
                            <tr>
                                <th>Username</th>
                                <th>Fullname</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Profile image</th>
                                <th>Status</th>
                                <th class="actions">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($clients as $client):?>
                                <tr>
                                    <td> <?= $client->username ?></td>
                                    <!-- <td nowrap><?php /*echo h($client['Client']['password']); */ ?></td>-->
                                    <td><?= $client->fullname ?></td>
                                    <td><?= $client->phone ?> </td>
                                    <td><?= $client->email ?></td>
                                    <td><?php echo $this->Html->image('/files/uploads/profiles/' . $client->profileimage, array('alt' => 'Image not found', 'border' => '0', 'height' => 50, 'width' => 50)); ?></td>
                                    <td> <?= $client->active == 1 ? "Yes" : "No" ?></td>
                             
                                    <td class="actions">
                                        <div style="width:160px">
                                            <div style="float: left; padding-left: 5px"><?php echo $this->Html->link('<i class="fa fa-edit"></i> ', array('action' => 'edit', $client->id), array('escape' => false, 'class' => 'btn btn-secondary btn-sm', 'target' => '_self')); ?></div>
                                            <div style="float: left; padding-left: 5px"><?php echo $this->Form->postLink('<i class="fa fa-trash"></i> ', array('action' => 'delete', $client->id), array('class' => 'btn btn-danger btn-sm', 'escape' => false), __('Are you sure you want to delete # %s?', $client->id)); ?></div>
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



