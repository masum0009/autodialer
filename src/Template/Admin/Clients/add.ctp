<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class=" col-md-8 offset-md-2 ">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h2>Add Client</h2>
                        <button  class="btn btn-kk btn-space pull-right" id="button" type="submit" value="Create" onClick="document.location.href='<?php echo $this->Url->build(array('controller' => 'clients','action' => 'index')); ?>'; return false;"><i class="fa fa-list"></i> Clients List </button>
                    </div>
                    <div class="card-body card-block">
                        <?php echo $this->Form->create('Client', array('role' => 'form', 'type' => 'file')); ?>
    
                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?php echo $this->Form->input('company_name', array('label' => 'Enter company name', 'class' => 'form-control', 'placeholder' => 'company name')); ?>
                            </div>
                        </div>
                        
                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('username', array('label' => 'Enter User name', 'class' => 'form-control', 'placeholder' => 'Username')); ?>
                            </div>

                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('password', array('type' => 'text', 'label' => 'Enter Password', 'class' => 'form-control', 'placeholder' => 'password')); ?>
                            </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('fullname', array('label' => 'Enter your full name', 'class' => 'form-control', 'placeholder' => 'Full name')); ?>
                            </div>

                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('phone', array('label' => 'Enter your phone', 'class' => 'form-control', 'placeholder' => 'phone')); ?>
                            </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('email', array('type' => 'email', 'label' => 'Enter your email', 'class' => 'form-control', 'placeholder' => 'email')); ?>
                            </div>

                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('image', array('type' => 'file', 'label' => 'Please select a your picture', 'class' => 'form-control', 'placeholder' => 'Select file')); ?>
                            </div>
                     
                        </div>
    
                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?php echo $this->Form->input('address', array('label' => 'Enter company address','type'=>'text','rows' => 2, 'class' => 'form-control', 'placeholder' => 'company address')); ?>
                            </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-4 mb-3">
                                <?= $this->Form->input('call_rate', ['label' => 'Enter call rate (In Poisha)', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Call rate' ]) ?>
                            </div>
                            <div class="col-md-4 mb-3">
                                <?= $this->Form->input('call_pulse', ['label' => 'Enter call pulse (In Seconds)', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Call pulse' ]) ?>
                            </div>
                            <div class="col-md-4 mb-3">
                                <?= $this->Form->input('sms_rate', ['label' => 'Enter sms rate (In Poisha)', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'sms rate' ]) ?>
                            </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="form-group col-md-12">
                                <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-info btn-block')); ?>
                            </div>
                        </div>
                        
                        <?php echo $this->Form->end() ?>
                    </div>

                </div><!-- end col md 12 -->
            </div><!-- end row -->
        </div>
    </div>
</div>
