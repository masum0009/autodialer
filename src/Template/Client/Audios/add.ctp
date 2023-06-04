<div class="content"> <div class="animated fadeIn"> <div class="row"> <div
class="col-md-8  offset-md-2"> <div class="card"> <div
class="card-header"><strong style="font-size: x-large">Add a new Audio</strong>
<div class="float-right"> <ol class="text-right"> <button  class="btn btn-sm btn-primary pull-right" id="button" type="submit" value="Create"
onClick="document.location.href='<?= $this->Url->build(
['controller' => 'Audios','action' => 'index']) ?>'"><i class="fa
fa-list"></i> Audio files </button> </ol> </div> </div> <div
class="card-body card-block"> <?=  $this->Form->create($audio,
['controller' => 'Actions', 'action' => 'add', 'type' => 'file']) ?>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?= $this->Form->input('caption', array('label' => 'Caption', 'class' => 'form-control', 'required' => true, 'placeholder' => 'audio file caption')); ?>
                            </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="col-md-12 mb-3">
                                <?= $this->Form->input('file', array('label' => 'Audio voice file', 'type' => 'file', 'accept'=>'.wav,.mp3', 'class' => 'form-control', 'required' => true, 'placeholder' => 'upload your voice file')); ?>
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
        
    </script>
<?php $this->end() ?>