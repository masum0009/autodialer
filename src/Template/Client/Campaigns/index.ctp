<?php
$templates = [ 
    'nextActive' => '<a class="page-link" href="{{url}}">{{text}}</a>',
    'nextDisabled' => '<a class="page-link" href="{{url}}" aria-disabled="true">{{text}}</a>',
    'prevActive' => '<a class="page-link" href="{{url}}" tabindex="-1" >{{text}}</a> ',
    'prevDisabled' => '<a class="page-link" href="{{url}}" tabindex="-1" aria-disabled="true">{{text}}</a>',
    'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'current' => '<li class="page-item"><a class="page-link" href="">{{text}}</a></li>',
    ];
?>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h2 style="font-size:22px; font-weight: bold">Campaigns</h2>                        
                        <button  class="btn btn-primary btn-sm pull-right" id="button" type="submit" value="Create" onClick="document.location.href='<?php echo $this->Html->Url->build(array('controller' => 'campaigns','action' => 'add')); ?>'; return false;"><i class="fa fa-plus-square"></i> Add Campaign </button>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($campaigns)): ?>
                        <table id="bootstrap-data-table1" class="table  table-bordered">
                        <thead style="background-color: rgba(0,0,0,.05);">
                        <tr>
                            <th>Name</th>
                            <th>Contacts</th>
                            <th>Gateway</th>
                            <th>Campaign Schedule</th>
                            
                            <th>Details</th>
                            <th>IVR</th>
                            <th>Status</th>
                            <th>Actions</th>
                           
                        </tr>
                        </thead>
                        
                            <tbody>
                        <?php foreach ($campaigns as $campaign):  ?>


                            <tr>
                                <td>
                                    <?php echo $this->Html->link($campaign->name, array('controller' => 'campaigns','action' => 'report', $campaign->id)); ?>
                                </td>
                                <td><?= $campaign->total_contact ?></td>
                                <td><?= $campaign->gateway->name ?></td>
                                
                                <td><?php echo date("d-M", strtotime($campaign->start_at));
                                    echo ' - ';
                                    echo date("d-M-Y", strtotime($campaign->finished_at));
                                    echo "</br>";
                                    echo date("h:ia", strtotime($campaign->daily_start_time));
                                    echo ' - ';
                                    echo date("h:ia", strtotime($campaign->daily_stop_time));
                                    echo "<br>";
                                    echo h($campaign->weekdays);
                                    ?> </td>
                              

                                <td><?php
                                    echo h("Frequency:".$campaign->frequency);
                                    echo "<br>";
                                    echo h("Duration:".$campaign->max_call_duration);
                                    echo "<br>";
                                    echo h("Try:".$campaign->time_between_retries);
                                    ?>
                                    </br>
                                    <button style="padding:0px; padding-left:3px; padding-right:3px; margin-top:5px" data-toggle="modal" data-target="#loadAudio_<?= $campaign->audios_id ?>"  class="play-audio btn btn-sm btn-primary"><i class="fa fa-headphones" aria-hidden="true"></i> Play Audio</button>
                                </td>
                                <td>
                                    <a href="<?= $this->Url->build(array('controller' => 'Actions', 'action' => 'index', $campaign->id)) ?>" class="badge badge-primary">IVR (<?= $campaign->total_action ?>)</a>
                                </td>
                                
                                <td>
                                
                                <div class="btn-group dropright">
                                    <?php 
                                    $status_colors = [
                                            0 => 'btn-secondary',
                                            1 => 'btn-primary',
                                            2 => 'btn-info',
                                            3 => 'btn-warning',
                                            6 => 'btn-success'
                                    ];
                                    ?>
                                    <?php 
                                        if ($campaign->status == 6){
                                            printf("<span class='badge badge-success'> %s <span>", $status[$campaign['status']]);
                                        }

                                        if($campaign->status != 6): 
                                    ?>

                                        <button class="btn <?= $status_colors[$campaign->status] ?> btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?= $status[$campaign['status']] ?>
                                        </button>
                                        <div class="dropdown-menu">
                                            <?php 
                                                $ready =  $this->Form->postLink('Start', array('action' => 'readyCam', $campaign->id), array('title' => 'Run','class' => 'dropdown-item', 'escape' => false, 'confirm' => __('Are you sure you want to run this campaign?', $campaign->name)));
                                                $start = $this->Form->postLink('Start', array('action' => 'change', $campaign->id,1), array('title' => 'Start','class' => 'dropdown-item', 'escape' => false, 'confirm' => __('Are you sure you want to start this campaign?', $campaign->name))); 
                                                $pause = $this->Form->postLink('Pause', array('action' => 'change', $campaign->id,3), array('title' => 'Pause','class' => 'dropdown-item', 'escape' => false, 'confirm' => __('Are you sure you want to pause this campaign?', $campaign->name)));
                                                $complete = $this->Form->postLink('Complete', array('action' => 'change', $campaign->id,6), array('title' => 'Complete','class' => 'dropdown-item', 'escape' => false, 'confirm' => __('Are you sure you want to stop for force complete this campaign # %s?', $campaign->name)));
                                                if($campaign->status == 0){
                                                    echo $ready;
                                                }
                                                else if($campaign->status == 1){
                                                    echo $pause;
                                                }
                                                else if($campaign->status == 2){
                                                    echo $pause;
                                                    echo '<div class="dropdown-divider"></div>';
                                                    echo $complete;
                                                }
                                                else if($campaign->status == 3){
                                                    echo $start;
                                                    echo '<div class="dropdown-divider"></div>';
                                                    echo $complete;

                                                }

                                                // else if($campaign->status == 4){
                                                //     echo $this->Form->postLink('Complete', array('action' => 'change', $campaign->id,6), array('title' => 'Complete','class' => 'dropdown-item', 'escape' => false), __('Are you sure you want to stop for force complete this campaign # %s?', $campaign->name));
                                                // }
                                                
                                            ?>
                                        </div>
                                    <?php endif ?>
                                </div>                                                                                                   
                            </td>
                            <?php 
                            $report = $this->Html->link('Call Records', array('action' => 'report', $campaign->id), array('title' => 'Call Records','escape' => false, 'class' => 'dropdown-item', 'target' => '_self'));
                            $call_forward = $this->Html->link('Forwarding History', array('controller' => 'CallForwarding', 'action' => 'index', $campaign->id), array('title' => 'Call Forwarding History','escape' => false, 'class' => 'dropdown-item', 'target' => '_self'));
                            $print_info = $this->Html->link('Call Summary', array('action' => 'printinfo', $campaign->id), array('title' => 'Report','escape' => false, 'class' => 'dropdown-item', 'target' => '_self'));
                            $print_history = $this->Html->link('Call History', array('action' => 'printhistory', $campaign->id), array('title' => 'Call Summary','escape' => false, 'class' => 'dropdown-item', 'target' => '_self'));
                            $edit_link = $this->Html->link('Edit', array('action' => 'edit', $campaign->id), array('title' => 'Campaign Edit','escape' => false, 'class' => 'dropdown-item', 'target' => '_self'));
                            $trash = $this->Form->postLink('Delete', array('action' => 'delete', $campaign->id), array('title' => 'Campaign Delete','class' => 'dropdown-item', 'escape' => false, 'confirm' => __('Are you sure you want to delete the Campaign ?')));

                            ?>

                                <td class="actions">
                                <?php if($campaign->status < 4): ?>
                                    <div class="btn-group mb-2">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Actions </button>
                                            <div class="dropdown-menu">
                                               <?php     
                                                    echo $edit_link;
                                                    echo '<div class="dropdown-divider"></div>';
                                                    echo $trash;
                                               ?>
                                            </div>
                                    </div>    
                                <?php endif; ?> 
                                <br>
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Reports </button>
                                            <div class="dropdown-menu">
                                               <?php    
                                               echo $report;
                                               echo '<div class="dropdown-divider"></div>';
                                               echo $print_info;
                                               echo '<div class="dropdown-divider"></div>';
                                               echo $print_history;
                                               echo '<div class="dropdown-divider"></div>';
                                               echo $call_forward;
                                               echo '<div class="dropdown-divider"></div>';

                                                // if($campaign->status != 0){
                                                //     echo $report;
                                                //     echo '<div class="dropdown-divider"></div>';
                                                //     echo $call_forward;
                                                //     echo '<div class="dropdown-divider"></div>';
                                                    
                                                // }

                                                // if($campaign->status == 6){
                                                //     echo $print_info;
                                                //     echo '<div class="dropdown-divider"></div>';
                                                //     echo $print_history;
                                                //     echo '<div class="dropdown-divider"></div>';
                                                // }

                                                

                                             //   echo $edit_link;

                                               ?>
                                            </div>
                                    </div>     
                                </td>
                            </tr>
                            <tr>
                                <td colspan='8'></td>
                                            </tr>
                        <?php endforeach; ?>

                        </tbody>

                        <?php  else: ?>
                        <tbody>
                        <tr>
                            <td colspan="7" style="text-align: center"><strong style="font-size: large">No data found</strong></td>
                        </tr>
                        </tbody>
                        <?php endif ?>
                        </table>
                        <ul class="pagination">
                              <li class="page-item disabled">
                                  <?php echo $this->Paginator->prev('Previous',['templates'=>$templates]); ?>
                              </li>
                              <?php echo $this->Paginator->numbers(['templates'=>$templates]); ?>
                              <li class="page-item">
                                  <?php echo $this->Paginator->next('Next',['templates'=>$templates]); ?>
                              </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->

</div>

<?php foreach($audios as $audio): ?>
    <!-- Modal -->
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
        url = "<?= $this->Url->build('/files/uploads/audio/'); ?>"


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

    </script>
<?php $this->end() ?>