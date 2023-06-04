<?php //pr($contactGroups) ?>
<style type="text/css">
    .label {
        color: white;
        padding: 8px;
    }
    .success {
        background-color: #4CAF50;
    }
    /* Green */
</style>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">

                    <div class="card-header d-flex justify-content-between">
                        <h2 style="font-size:22px; font-weight:bold" >Create Campaign</h2>
                        <div class="float-right">
                            <ol class="text-right">

                                <button class="btn btn-primary btn-sm pull-right px-2 ml-2" id="button" type="submit"
                                        value="add"
                                        onClick="document.location.href='<?php echo $this->Html->Url->build(array('controller' => 'contactGroups', 'action' => 'add')); ?>'; return false;">
                                    <i class="fa fa-plus-square"></i> Add Contact Group
                                </button>

                                <button class="btn btn-primary btn-sm pull-right px-2 ml-2" id="button" type="submit"
                                        value="add"
                                        onClick="document.location.href='<?php echo $this->Html->Url->build(array('controller' => 'gateway', 'action' => 'add')); ?>'; return false;">
                                    <i class="fa fa-plus-square"></i> Add Gateway
                                </button>

                                <button class="btn btn-primary btn-sm pull-right px-2" id="button" type="submit"
                                        value="Create"
                                        onClick="document.location.href='<?php echo $this->Html->Url->build(array('controller' => 'campaigns', 'action' => 'index')); ?>'; return false;">
                                    <i class="fa fa-list"></i> Campaigns
                                </button>

                            </ol>
                        </div>
                    </div>
                    <div class="card-body card-block ">
                        <?php echo $this->Form->create('Campaign', array('role' => 'form', 'type' => 'file')); ?>
                        <?php //echo $this->Form->hidden('id'); ?>
                        <?php //echo $this->Form->hidden('status'); ?>
                        <?php //echo $this->Form->hidden('contact_groups_previous'); ?>
                        <?php //echo $this->Form->hidden('previous_file.previous_file'); ?>

                        <div class="card">
                            <div class="card-header"><strong>General Settings</strong></div>
                            <div class="card-body card-block">
                                <div class="form-row mt-2 col-md-12 clearfix">
                                    <div class="col-md-6 mb-3">
                                        <?php echo $this->Form->input('name', array('label' => 'Please enter campaign name','required' => true, 'class' => 'form-control', 'placeholder' => 'Campaign name')); ?>
                                        <div class="form-group mt-2">
                                            <?php echo $this->Form->input('contact_groups', array('label' => 'Please select contact group', 'required' => true,  'class' => 'form-control', 'options' => $contactGroups, 'multiple' => true)); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <?php echo $this->Form->input('gateway_id', array('label' => 'Please select a gateway which campaign will pass call','required' => true, 'class' => 'form-control', 'placeholder' => 'Gateway Id', 'empty' => 'Select your gateway')); ?>
                                        <div class="d-none" id="pbx">
                                            <div class="form-group">
                                                <?php echo $this->Form->input('pbx_gateway_id', array('label' => 'PBX Gateway','required' => false, 'options' => $gateways, 'class' => 'form-control', 'placeholder' => 'PBX Gateway', 'empty' => 'Select your gateway')); ?>
                                            </div>
                                            <div class="form-group">
                                                <?php echo $this->Form->input('pbx_number', array('label' => 'PBX Number','required' => false, 'class' => 'form-control', 'placeholder' => 'PBX Number')); ?>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="audios_id">Please choose a voice file which will be played</label>
                                            <div class="input-group mb-3">
                                            <?php echo $this->Form->select('audios_id', $audios, array('required' => false, 'id' => 'audios_id', 'class' => 'form-control', 'required' => true, 'placeholder' => 'voice file', 'empty' => 'Please choose')); ?>
                                                <div id="playBtn" data-toggle="modal" data-target="#loadAudio_" class="input-group-append" style="cursor:pointer">
                                                    <span class="input-group-text"><i class="fa fa-headphones"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mt-2">
                                            <input type="checkbox" name="connect_pbx" id="connect-pbx">
                                            <label for="connect-pbx">I want to connect pbx instead use a voice file </label>
                                        </div>
                                        <div class="form-group mt-1">
                                            <input type="checkbox" name="setup_ivr" id="setup_ivr">
                                            <label for="setup_ivr">Need to setup IVR (Interactive Voice Response) </label>
                                        </div>

                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header"><strong>Schedule Settings</strong></div>
                            <div class="card-body card-block">
                                <div class="form-row mt-2 col-md-12 clearfix">
                                    <div class="col-md-12 mb-6">
                                        <label>Week day</label>
                                        <?php
                                        ?>
                                        <div class="weekDays-selector">
                                            <?php echo $this->Form->checkbox('weekdays.Mon', array('id' => "weekday-mon", 'class' => 'weekday','default'=>'1')); ?>
                                            <label for="weekday-mon">Mo</label>
                                            <?php echo $this->Form->checkbox('weekdays.Tue', array('id' => "weekday-tue", 'class' => 'weekday','default'=>'1')); ?>
                                            <label for="weekday-tue">Tu</label>
                                            <?php echo $this->Form->checkbox('weekdays.Wed', array('id' => "weekday-wed", 'class' => 'weekday','default'=>'1')); ?>
                                            <label for="weekday-wed">We</label>
                                            <?php echo $this->Form->checkbox('weekdays.Thu', array('id' => "weekday-thu", 'class' => 'weekday','default'=>'1')); ?>
                                            <label for="weekday-thu">Th</label>
                                            <?php echo $this->Form->checkbox('weekdays.Fri', array('id' => "weekday-fri", 'class' => 'weekday','default'=>'1')); ?>
                                            <label for="weekday-fri">Fr</label>
                                            <?php echo $this->Form->checkbox('weekdays.Sat', array('id' => "weekday-sat", 'class' => 'weekday','default'=>'1')); ?>
                                            <label for="weekday-sat">Sa</label>
                                            <?php echo $this->Form->checkbox('weekdays.Sun', array('id' => "weekday-sun", 'class' => 'weekday','default'=>'1')); ?>
                                            <!--<input type="checkbox" id="weekday-sun" class="weekday"/>-->
                                            <label for="weekday-sun">Su</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mt-2 col-md-12 clearfix">
                                    <div class="col-md-6 mb-3">
                                        
                                        <?php echo $this->Form->input('start_at', array('value' => date('Y-m-d'), 'class' => 'form-control', 'placeholder' => 'Start At')); ?>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        
                                        <?php echo $this->Form->input('finished_at', array('value' => date('Y-m-d', strtotime("+7 day")), 'class' => 'form-control', 'required' => true, 'placeholder' => 'Finished At')); ?>
                                    </div>
                                </div>
                                <div class="form-row mt-2 col-md-12 clearfix">
                                    <div class="col-md-6 mb-3">
                                        <?php echo $this->Form->input('daily_start_time', array('value' => '10:00:00', 'class' => 'form-control', 'placeholder' => 'Daily Start Time')); ?>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <?php echo $this->Form->input('daily_stop_time', array('value' => '18:00:00',  'class' => 'form-control', 'placeholder' => 'Daily Stop Time')); ?>
                                       <?php echo $this->Form->input('timezone', array('label' => 'Timezone','type'=>'hidden', 'required' => true,  'class' => 'form-control', /*'options' => $timezones,*/ 'value' => "Asia/Dhaka")); ?>
                                   
                                    </div>
                                     <!-- <div class="col-md-4 mb-3"> -->
                                         <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header"><strong>Other Settings</strong></div>
                            <div class="card-body card-block">
                                <div class="form-row mt-2 col-md-12 clearfix">
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('max_call_duration', array('label' => 'Max Call Duration (In Second)', 'required' => true, 'class' => 'form-control', 'placeholder' => 'Ex: Maximum call in second','default'=>'0')); ?>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <?php echo $this->Form->input('play_count', array('label' => 'How many time play', 'class' => 'form-control', 'placeholder' => 'Gateway Id', 'options'=>array('1'=>1,'2'=>2,'3'=>3))); ?>
                                    </div>
                                </div>
                                <div class="form-row mt-2 col-md-12 clearfix">  
                                    <div class="col-md-4 mb-3">
                                        <?php echo $this->Form->input('frequency', array('label' => 'How many call at a time', 'required' => true, 'value' => '1', 'class' => 'form-control', 'placeholder' => 'Frequency')); ?>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <?php echo $this->Form->input('max_call_retry', array('label' => 'How many time retry same number', 'class' => 'form-control', 'value' => '3', 'placeholder' => 'Max Call Retry','default'=>'0')); ?>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <?php echo $this->Form->input('time_between_retries', array('label' => 'How many time wait for retry (In Minute)', 'class' => 'form-control', 'value' =>'30', 'placeholder' => 'Time Between Retries','default'=>'0')); ?>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <?php echo $this->Form->input('sms', array('label' => 'Send SMS after Call received (optional)', 'type' => 'textarea', 'class' => 'form-control char-count', 'placeholder' => 'SMS Content')); ?>
                                        <span class="float-right" id="content-info"></span>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <?php echo $this->Form->input('description', array('label' => 'Please describe your campaign', 'type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Description')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mt-2 col-md-12 clearfix">
                            <div class="form-group col-md-12">
                                <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-primary btn-block')); ?>
                            </div>
                        </div>
                    </div>

                </div><!-- end col md 12 -->
            </div><!-- end row -->
        </div>
    </div>
</div>



<?php foreach($_audios as $audio): ?>
    <div class="modal fade" id="loadAudio_<?= $audio->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:335px !important">
        <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
            <h5 class="modal-title" id="exampleModalLabel">Listen Audio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <audio controls>
                <source src="<?= $this->Url->build('/files/uploads/audio/'. $audio->filename); ?>" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
        </div>
    </div>
    </div>

<?php endforeach ?>


<?php $this->start('script') ?>
<script>
  $(document).ready(function(){

    $("#connect-pbx").change(function(e){
        if( $("#connect-pbx").prop('checked') == true){
            $("#pbx").removeClass('d-none');
            $("#voice").addClass('d-none');
            $("#pbx-gateway-id").attr('required', true);
            $("#pbx-number").attr("required", true);
            $("#audios-id").attr('required', false);
            $("#audios-id").val('');
        }
        else{
            $("#pbx").addClass('d-none');
            $("#voice").removeClass('d-none');
            $("#pbx-gateway-id").attr('required', false);
            $("#pbx-number").attr("required", false)
            $("#audios-id").attr('required', true);
        }
    });


    $("#start-at").datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $("#finished-at").datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $("#daily-start-time").datetimepicker({
        format: 'HH:mm:ss'
    })

    $("#daily-stop-time").datetimepicker({
        format: 'HH:mm:ss'
    })


            //let perSMS = 160;
            $(".char-count").keyup(function(){
                let val = $(this).val();
                console.log(val);
                let max_limit = isUnicode(val) ? 1005 : 2095;
                if(isUnicode(val) && val.length <= 70){
                    perSMS = 70;
                }

                else if(isUnicode(val) && val.length > 70){
                    perSMS = 67;
                }
               
                else if(val.length > 160){
                    perSMS = 153;
                }
                else{
                    perSMS = 160;
                }


                 
                if(val.length > max_limit){
                    $(this).val(val.substring(0, max_limit));
                    $(this).trigger('keyup');
                } 

                let info = val.length + " Characters | "+ (max_limit - val.length) +" Characters Left | " + Math.ceil(val.length / perSMS ) + " SMS (" + perSMS + " Char./SMS)";
                console.log(info);
                $("#content-info").text(info);
                
            });


            function isUnicode(str) {
                for (var i = 0, n = str.length; i < n; i++) {
                    //if (str.charCodeAt( i ) > 255 && str.charCodeAt( i )!== 8364 ) 
                    if (str.charCodeAt(i) > 255
                        || str.charCodeAt(i) == 91
                        || str.charCodeAt(i) == 92
                        || str.charCodeAt(i) == 93
                        || str.charCodeAt(i) == 94
                        || str.charCodeAt(i) == 123
                        || str.charCodeAt(i) == 124
                        || str.charCodeAt(i) == 125
                        || str.charCodeAt(i) == 126
                    ) { return true; }
                }

                return false;
            }

            setModal()
            $("#audios_id").change(function(){
                setModal()
            })

            function setModal(){
                let aid  = $("#audios_id").val()
                if( aid.length > 0){
                    $('#playBtn').attr('data-target', '#loadAudio_'+aid)
                }
                else{
                    $('#playBtn').attr('data-target', '#')
                }
            }

            $(document).on('show.bs.modal', '.modal', function () {
                $(this).find("audio")[0].play()
                // console.log("working")
            });

            $(document).on('hidden.bs.modal', '.modal', function () {
                sound = $(this).find("audio")[0]
                // console.log("working")
                sound.pause();
                sound.currentTime = 0;
            });


  });
</script>
<?php $this->end() ?>