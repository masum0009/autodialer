<style type="text/css">

    #profile-image1 {
        cursor: pointer;
        width: 120px;
        height: 120px;
        border-radius: 60px;
        border: 2px solid #03b1ce;
    }

</style>
<div class="content pb-5">
    <div class="animated fadeIn">
        <div class="row">
            <div class=" col-md-8 offset-md-2 ">
                <div class="card">
                    <div class="card-header"><strong style="font-size: x-large"><?= $client->fullname ?>'s Information</strong></div>
                    <div class="card-body card-block">
                        <?php echo $this->Form->create($client, array('role' => 'form', 'type' => 'file')); ?>
                        <?php  echo $this->Form->input('id', array('type' => 'hidden', 'class' => 'form-control', 'placeholder' => 'Id')); ?>

                        <div class="col-md-12">
                            <div  align="center">
                                <img alt="" src="<?= $this->Url->build("/files/uploads/profiles/" . $client->profileimage) ?>"
                                     id="profile-image1" class="img-circle img-responsive">
                            </div>
                        </div>

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
                                <?php echo $this->Form->input('password', array('type' => 'text', 'label' => 'Enter Password', 'value' => '', 'required' => 'false', 'class' => 'form-control', 'placeholder' => 'password')); ?>
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

                            <!-- <div class="col-md-6 mb-3"> -->
                                <?php //echo $this->Form->input('ative', array( 'label' => 'Status','class' => 'form-control','options' => ["1" => "Yes", "0" => "No"], 'empty' => false)); ?>
                            <!-- </div> -->
                        </div>

    
                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?php echo $this->Form->input('address', array('label' => 'Enter company address','type'=>'text','rows' => 2, 'class' => 'form-control', 'placeholder' => 'company address')); ?>
                            </div>
                         </div>
                        
                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="form-group col-md-12 ">
                                <?php echo $this->Form->submit(__('Update'), array('class' => 'btn btn-info btn-block')); ?>
                            </div>
                        </div>
                        
                        <?php echo $this->Form->end() ?>
                    </div>

                </div><!-- end col md 12 -->
            </div><!-- end row -->
        </div>
    </div>
</div>