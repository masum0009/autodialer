<?php //pr($gateway) ?>
<div class="content"> <div class="animated fadeIn"> <div class="row"> <div
class="col-md-8  offset-md-2"> <div class="card"> <div
class="card-header"><strong style="font-size: x-large">Add Gateway</strong>
<div class="float-right"> <ol class="text-right"> <button  class="btn btn-kk
btn-space pull-right" id="button" type="submit" value="Create"
onClick="document.location.href='<?= $this->Url->build(
['controller' => 'gateway','action' => 'index']) ?>'"><i class="fa
fa-list"></i> Gateways List </button> </ol> </div> </div> <div
class="card-body card-block"> <?=  $this->Form->create($gateway,
['controller' => 'Gateway', 'action' => 'edit', $gateway->id]) ?>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?= $this->Form->input('name', array('label' => 'Gateway Name', 'class' => 'form-control', 'required' => true, 'placeholder' => 'Gateway name')); ?>
                            </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?= $this->Form->input('ip', array('label' => 'IP Address', 'class' => 'form-control', 'required' => true, 'placeholder' => 'IP address')); ?>
                            </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?=  $this->Form->input('port', array('label' => 'Port', 'class' => 'form-control', 'required' => true, 'placeholder' => 'Port')); ?>
                            </div>
                        </div>
						
						<div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?= $this->Form->input('prefix', array('label' => 'Prefix', 'class' => 'form-control', 'required' => false, 'placeholder' => 'Prefix')); ?>
                            </div>
                        </div>
                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?= $this->Form->input('codec', array('label' => 'Codec', 'class' => 'form-control', 'required' => true, 'options' => $codecs, 'placeholder' => 'Password')); ?>
                            </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?= $this->Form->input('user', array('label' => 'Username', 'class' => 'form-control', 'required' => true, 'placeholder' => 'Username')); ?>
                            </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?= $this->Form->input('password', array('label' => 'Password', 'class' => 'form-control', 'required' => true, 'type' => 'text', 'placeholder' => 'Password')); ?>
                            </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->input('call_rate', array('label' => 'Call Rate', 'class' => 'form-control', 'required' => true, 'placeholder' => 'call rate')); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->input('call_pulse', array('label' => 'Call Pulse', 'class' => 'form-control', 'required' => true, 'placeholder' => 'call pulse')); ?>
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