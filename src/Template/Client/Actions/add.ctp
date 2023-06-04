<div class="content"> <div class="animated fadeIn"> <div class="row"> <div
class="col-md-8  offset-md-2"> <div class="card"> <div
class="card-header"><strong style="font-size: x-large">Add a new action</strong>
<div class="float-right"> <ol class="text-right"> <button  class="btn btn-sm btn-primary pull-right" id="button" type="submit" value="Create"
onClick="document.location.href='<?= $this->Url->build(
['controller' => 'actions','action' => 'index']) ?>'"><i class="fa
fa-list"></i> Actions </button> </ol> </div> </div> <div
class="card-body card-block"> <?=  $this->Form->create($action,[ 'url'=> $this->Url->build(['controller' => 'Actions', 'action' => 'add', $cid], true)]); ?>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?= $this->Form->input('campaigns_id', array( 'type' => 'hidden', 'value' => $cid)); ?>
                            </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?= $this->Form->input('key_press', array('label' => 'Press Key', 'class' => 'form-control', 'required' => true, 'options' => $key_press, 'placeholder' => 'press key')); ?>
                            </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?=  $this->Form->input('action', array('label' => 'Action', 'class' => 'form-control', 'required' => true, 'options' => $actionList,  'placeholder' => 'action')); ?>
                            </div>
                        </div>
						
                        <div id="agent">
                            <div class="form-row mt-2 col-md-12 clearfix">
                                <div class="col-md-12 mb-3">
                                    <?= $this->Form->input('data[]', array('label' => 'Gateway', 'options' => $gateway, 'class' => 'form-control', 'required' => false, 'placeholder' => 'action data')); ?>
                                </div>
                            </div>
                            <div class="form-row mt-2 col-md-12 clearfix">
                                <div class="col-md-12 mb-3">
                                    <?= $this->Form->input('data[]', array('label' => 'Agent Number', 'class' => 'form-control', 'id' => 'agent_number', 'required' => false, 'placeholder' => 'agent number')); ?>
                                </div>
                            </div>
                        </div>

                        <div id="action_data_div" class="form-row mt-2 col-md-12 clearfix d-none">
                                <div class="col-md-12 mb-3">
                                    <?= $this->Form->input('data_field', array('label' => 'Custom text', 'type' => 'textarea', 'rows' => 3, 'class' => 'form-control',  'id' => 'action_data', 'required' => false, 'placeholder' => 'Custom text')); ?>
                                </div>
                        </div>
     
                        <div class="form-row mt-2 col-md-12 clearfix">

                            <div class="form-group col-12">
                                <?= $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary btn-block')); ?>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>

                </div><!-- end col md 12 -->
            </div><!-- end row -->

        </div>
    </div>
</div>


<?php $this->start('script') ?>
    <script>
        $("#action").change(function(){
            if($(this).val() == 0){
                $("#agent_number").attr('required', true);
                $("#agent").removeClass('d-none');
            }
            else{
                $("#agent").addClass('d-none');
                $("#agent_number").attr('required', false);
            }

            if($(this).val() == 2 || $(this).val() == 1){
                $("#action_data_div").removeClass('d-none');
                $("#action_data").attr('required', true);
            }
            else{
                $("#action_data_div").addClass('d-none');
                $("#action_data").attr('required', false);
            }
        })
    </script>
<?php $this->end() ?>