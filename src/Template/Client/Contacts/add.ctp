<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-header">
                        <h2 style="font-size:22px; font-weight:bold; display:inline"> Add Contact </h2>
                        <div class="float-right">
                        <button data-toggle="modal" data-target="#group-modal" class="btn btn-sm btn-primary pull-right ml-2" id="button" type="submit" value="add" ><i class="fa fa-plus-square"></i> Add Contact Group </button>
                                    <button  class="btn btn-sm btn-primary pull-right" id="button" type="submit" value="Create" onClick="document.location.href='<?= $this->Url->build(['controller' => 'contacts','action' => 'index']) ?>'"><i class="fa fa-list"></i> Contacts </button>
                        </div>
                    </div>
                    <div class="card-body card-block">
                        <?php echo $this->Form->create('Contact', array('role' => 'form')); ?>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('contact_name', array('label' => 'Please enter name ', 'class' => 'form-control', 'placeholder' => 'Contact name')); ?>
                            </div>
    
                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('mobile_no', array('label' => 'Please enter mobile number *', 'class' => 'form-control', 'required' => true, 'placeholder' => 'Contact mobile no')); ?>
                            </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            
                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('contact_groups_id', array('label' => 'Please select contact group *','class' => 'form-control', 'required' => true, 'value' => $contact_gid, 'placeholder' => 'Contact Group Id','empty'=>'Select contact group')); ?>
                            </div>
    
                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->input('address', array('label' => 'Please enter address if have', 'class' => 'form-control', 'placeholder' => 'address')); ?>
                            </div>
                            
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?php echo $this->Form->input('extra_information', array('label' => 'Please enter extra information if have','type'=>'textarea','rows' => 3, 'class' => 'form-control', 'placeholder' => 'More information')); ?>
                            </div>
                        </div>


                        <div class="form-row mt-2 col-md-12 clearfix">

                            <div class="form-group col-md-12">
                                <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-block btn-primary')); ?>
                            </div>
                        </div>
                        <?php echo $this->Form->end() ?>
                    </div>

                </div><!-- end col md 12 -->
            </div><!-- end row -->

            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-header"><strong style="font-size: 22px">Import CSV Contact</strong></div>
                    <div class="card-body card-block">
                        <?php echo $this->Form->create('Contact', array('action'=>'import','role' => 'form','type'=>'file')); ?>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <a class="btn btn-outline-secondary" href="/files/sample_contact.csv" role="button"><i class="fa fa-download"></i> Download Sample CSV</a>
                            </div>
                        </div>
                        
                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3" id="file">
                                
                                <?php echo $this->Form->input('contact_groups_id', array('class' => 'form-control', 'value' => $contact_gid, 'placeholder' => 'Contact Group Id', 'required' => true ,'empty'=>'Select Contact Group')); ?>
                            </div>
                        </div>
                        
                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?php echo $this->Form->input('csv', array('type' => 'file', 'label' => 'Please select a .csv file', 'class' => 'form-control', 'required' => true, 'placeholder' => 'Select contacts file')); ?>  </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">

                            <div class="form-group col-md-12">
                                <?php echo $this->Form->submit(__('Import Contact'), array('class' => 'btn btn-primary btn-block')); ?>
                            </div>
                        </div>
                        <?php echo $this->Form->end() ?>
                    </div>

                </div><!-- end col md 12 -->
            </div><!-- end row -->
            
        </div>
    </div>
</div>



<div class="modal" id="group-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Contact Groups</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php $url = $this->Url->build(['controller' => 'ContactGroups', 'action' => 'add']); ?>
      <?= $this->Form->create(null, ['url' => $url]) ?>
      <div class="modal-body">
        <?= $this->Form->hidden('ref', ['value' => 'contact']) ?>
      <div class="form-group">
          <label for="group-name">Group Name</label>
          <input type="text" class="form-control" name="group_name" id="group-name" required placeholder="Group Name"> 
        </div>
      </div>
      <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Save Changes">
      </div>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
