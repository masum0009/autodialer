<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-8  offset-md-2">
                <div class="card">
                    <div class="card-header"><strong style="font-size: x-large">Add Iptsp</strong>
                        <div class="float-right">
                            <ol class="text-right">
                                <button  class="btn btn-kk btn-space pull-right" id="button" type="submit" value="Create" onClick="document.location.href='<?php echo $this->Url->build(array('controller' => 'iptsp','action' => 'index')); ?>'; return false;"><i class="fa fa-list"></i> IPTSP List </button>
                            </ol>
                        </div>
                    </div>
                    <div class="card-body card-block">
                        <?php echo $this->Form->create('Iptsp', array('role' => 'form')); ?>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('client_id', array('label'=>'Client Name','required' => true,'class' => 'form-control', 'placeholder' => 'Client Id','empty' => 'Select Client Name'));?>
                            </div>

                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('iptsp_number', array('label'=>'Iptsp Number','required' => true,'class' => 'form-control', 'placeholder' => 'Iptsp Number'));?>
                            </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('iptsp_user', array('label'=>'Iptsp User','required' => true,'class' => 'form-control', 'placeholder' => 'User'));?>
                            </div>

                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('iptsp_password', array('label'=>'Iptsp Password','required' => true,'class' => 'form-control', 'placeholder' => 'Password'));?>
                            </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('iptsp_ip', array('label'=>'Iptsp Ip','required' => true,'class' => 'form-control', 'placeholder' => 'Ip'));?>
                            </div>

                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('iptsp_port', array('label'=>'Iptsp Port','required' => true,'class' => 'form-control', 'placeholder' => 'Port'));?>
                            </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?php echo $this->Form->input('forwarding_number', array('label'=>'Forwarding Number','class' => 'form-control', 'placeholder' => 'Forwarding Number'));?>
                            </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">

                            <div class="form-group col-md-12">
                                <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-primary btn-block')); ?>
                            </div>
                        </div>
                        <?php echo $this->Form->end() ?>
                    </div>

                </div><!-- end col md 12 -->
            </div><!-- end row -->

        </div>
    </div>
</div>