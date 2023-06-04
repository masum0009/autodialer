<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-8 offset-md-2 ">
                </br>
                </br>
                </br>
                </br>
                </br>
                <div class="card">

                    <div class="card-header"><strong style="font-size: x-large">Update Call Forwarding Number </strong>
                        <div class="float-right">
                            <ol class="text-right">
                                <button class="btn btn-kk btn-space pull-right" id="button" type="submit" value="Create"
                                        onClick="document.location.href='<?php echo $this->Url->build(array('controller' => 'CallbackHistory', 'action' => 'index')); ?>'; return false;">
                                    <i class="fa fa-list"></i> Callback History List
                                </button>
                            </ol>
                        </div>
                    </div>
                    <div class="card-body card-block">
                        <?php echo $this->Form->create('CallbackHistory', array('role' => 'form')); ?>
                        <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?php echo $this->Form->input('forwarding_number', array('class' => 'form-control','value'=>$forwarding_number, 'placeholder' => 'forwarding_number')); ?>
                            </div>
                        </div>
                        <div class="form-row mt-2 col-md-12 clearfix">

                            <div class="form-group col-md-5 col-md-offset-5">
                                <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-info')); ?>
                            </div>
                        </div>
                        <?php echo $this->Form->end() ?>
                    </div>

                </div><!-- end col md 12 -->
            </div><!-- end row -->
        </div>
    </div>
    </br>
    </br>
    </br>
    </br>
</div>