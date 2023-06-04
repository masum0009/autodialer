
<div class="content pb-5">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h2 style="font-size:22px; font-weight:bold">Edit Contact</h2>
                        <button  class="btn btn-sm btn-primary pull-right" id="button" type="submit" value="Create" onClick="document.location.href='<?php echo $this->Html->Url->build(array('controller' => 'contacts','action' => 'index')); ?>'; return false;"><i class="fa fa-arrow-left"></i> Back </button>
                    </div>
                    <div class="card-body card-block">
                        <?php echo $this->Form->create($contact, array('role' => 'form')); ?>
                        <?php //echo $this->Form->input('client_id', array('type' => 'hidden')); ?>
    
                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('contact_name', array('label' => 'Please enter name', 'class' => 'form-control', 'placeholder' => 'Contact name')); ?>
                            </div>
        
                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('mobile_no', array('label' => 'Please enter mobile number *', 'class' => 'form-control', 'placeholder' => 'Contact mobile no')); ?>
                            </div>
                        </div>
    
                        <div class="form-row mt-2 col-md-12 clearfix">
        
                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('contact_groups_id', array('label' => 'Please select contact group *','class' => 'form-control', 'placeholder' => 'Contact Group Id','empty'=>'Select contact group')); ?>
                            </div>
        
                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('address', array('label' => 'Please enter address if have', 'class' => 'form-control', 'placeholder' => 'address')); ?>
                            </div>
                        </div>
    
                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12">
                                <?php echo $this->Form->input('extra_information', array('label' => 'Please enter extra information if have','type'=>'textarea','rows' => 3, 'class' => 'form-control', 'placeholder' => 'More information')); ?>
                            </div>
                        </div>
                        
                        <div class="form-row mt-2 col-md-12 clearfix">

                            <div class="form-group col-md-12">
                                <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-primary btn-block')); ?>
                            </div>
                        </div>
                        <?php echo $this->Form->end() ?>
                    </div>

                </div>
                <!-- end col md 12 -->
            </div>
            </div><!-- end row -->
        </div>
</div>
