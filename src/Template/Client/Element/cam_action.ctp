<?php 
    $controller = $this->getRequest()->getParam('controller');
    $action = $this->getRequest()->getParam('action');
    $records  =$this->Html->link('<i class="fa fa-eye"></i> Call Records', array('controller' => 'campaigns','action' => 'report', $campaign->id), array('title' => 'Call Records','escape' => false, 'class' => 'btn btn-secondary btn-sm   my-1 ml-2', 'target' => '_self'));
    $forward = $this->Html->link('<i class="fa fa-reply"></i> Forwording History', array('controller' => 'CallForwarding', 'action' => 'index', $campaign->id), array('title' => 'Call Forwarding History ','escape' => false, 'class' => 'btn btn-success btn-sm ml-2', 'target' => '_self'));
    $summary = $this->Html->link('<i class="fa fa-print"></i> Summary', array('controller' => 'campaigns','action' => 'printinfo', $campaign->id), array('title' => 'Summary','escape' => false, 'class' => 'btn btn-primary btn-sm  my-1 ml-2', 'target' => '_self'));
    $history = $this->Html->link('<i class="fa fa-history"></i> History', array('controller' => 'campaigns','action' => 'printhistory', $campaign->id), array('title' => 'History','escape' => false, 'class' => 'btn btn-info btn-sm  my-1 ml-2', 'target' => '_self'));
    $actions = $this->Html->link('<i class="fa fa-list-ul"></i> Actions', array('controller' => 'Actions', 'action' => 'index', $campaign->id), array('title' => 'Key Press Action','escape' => false, 'class' => 'btn btn-primary btn-sm  my-1 ml-2', 'target' => '_self'));
    $campaign = $this->Html->link('<i class="fa fa-list-ul"></i> Campaigns', array('controller' => 'Campaigns', 'action' => 'index', $campaign->id), array('title' => 'Campaigns','escape' => false, 'class' => 'btn btn-primary btn-sm my-1  ml-2', 'target' => '_self'));
    
    if(strtolower($controller) == 'campaigns' && strtolower($action) == 'report');
    else echo $records;
    echo( $summary . $history . $forward);



    if(strtolower($controller) == 'campaigns' && strtolower($action) == 'index');
    else echo $campaign;

    if(strtolower($controller) != 'actions' && strtolower($action) != 'index')
        echo $actions;

?>