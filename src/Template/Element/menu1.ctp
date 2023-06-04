<nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            
            <li class="active">
                <?php echo $this->Html->link('<i class="menu-icon fa fa-laptop"></i>'.__(' Dashboard'), array('controller' => '', 'action' => 'index'), array('escape' => false)); ?>
            </li>
    
            <?php if ($client['Client']['user_type_id']==3){ ?>
            <li class="menu-title">Campaigns</li><!-- /.menu-title -->
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-group"></i>Campaigns</a>
                <ul class="sub-menu children dropdown-menu">
                    <li> <i class="fa fa-list"></i>  <?php echo $this->Html->link(__(' Campaigns'), array('controller' => 'campaigns', 'action' => 'index'), array('escape' => false)); ?></li>
                    <li> <i class="fa fa-plus-square"></i> <?php echo $this->Html->link(__(' Add Campaigns'), array('controller' => 'campaigns', 'action' => 'create'), array('escape' => false)); ?></li>
                </ul>
            </li>
            <?php }?>
    
            <?php if ($client['Client']['user_type_id']==1 || $client['Client']['user_type_id']==2){ ?>
            <li class="menu-title">Clients</li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Clients</a>
                <ul class="sub-menu children dropdown-menu">
                    <li> <i class="fa fa-list"></i>  <?php echo $this->Html->link(__(' Clients'), array('controller' => 'clients', 'action' => 'index'), array('escape' => false)); ?></li>
                    <li> <i class="fa fa-plus-square"></i> <?php echo $this->Html->link(__(' Add Client'), array('controller' => 'clients', 'action' => 'add'), array('escape' => false)); ?></li>
                </ul>
            </li>
			
			<li class="menu-title">Iptsps</li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Iptsps</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li> <i class="fa fa-list"></i>  <?php echo $this->Html->link(__(' Iptsps List'), array('controller' => 'iptsps', 'action' => 'index'), array('escape' => false)); ?></li>
                        <li> <i class="fa fa-plus-square"></i> <?php echo $this->Html->link(__(' Add Iptsps'), array('controller' => 'iptsps', 'action' => 'add'), array('escape' => false)); ?></li>
                    </ul>
                </li>
				
           <?php } ?>
            
            <?php if ($client['Client']['user_type_id']==3){?>
            <li class="menu-title">Contacts</li><!-- /.menu-title -->
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-phone"></i>Contacts</a>
                <ul class="sub-menu children dropdown-menu">
                    <li> <i class="fa fa-list"></i>   <?php echo $this->Html->link(__('  Contacts'), array('controller' => 'contacts', 'action' => 'index'), array('escape' => false)); ?></li>
                    <li> <i class="fa fa-plus-square"></i> <?php echo $this->Html->link(__('  Add Contacts'), array('controller' => 'contacts', 'action' => 'add'), array('escape' => false)); ?></li>
                    <!--<li> <i class="fa fa-file"></i> <?php /*echo $this->Html->link(__('  Import CSV Contact'), array('controller' => 'contacts', 'action' => 'importContact'), array('escape' => false)); */?></li>-->
                </ul>
            </li>
            
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-phone"></i>Contact Groups</a>
                <ul class="sub-menu children dropdown-menu">
                    <li> <i class="fa fa-list"></i>  <?php echo $this->Html->link(__('  Contact Groups'), array('controller' => 'contactGroups', 'action' => 'index'), array('escape' => false)); ?></li>
                    <li> <i class="fa fa-plus-square"></i> <?php echo $this->Html->link(__('  Add Groups'), array('controller' => 'contactGroups', 'action' => 'add'), array('escape' => false)); ?></li>
                </ul>
            </li>
            
            <?php } /*if ($client['Client']['user_type_id']==1 || $client['Client']['user_type_id']==2){*/ ?>
            <li class="menu-title">Gateways</li><!-- /.menu-title -->
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-group"></i>Gateways</a>
                <ul class="sub-menu children dropdown-menu">
                    <li> <i class="fa fa-list"></i>  <?php echo $this->Html->link(__(' Gateways'), array('controller' => 'gateways', 'action' => 'index'), array('escape' => false)); ?></li>
                    <li> <i class="fa fa-plus-square"></i> <?php echo $this->Html->link(__(' Add Gateway'), array('controller' => 'gateways', 'action' => 'add'), array('escape' => false)); ?></li>
                </ul>
            </li>
            <?php /*}*/ ?>
			
			<?php if ($client['Client']['user_type_id']==3){?>
            <li class="active">
                <?php echo $this->Html->link('<i class="menu-icon fa fa-laptop"></i>'.__(' Call Back'), array('controller' => 'CallbackHistories', 'action' => 'index'), array('escape' => false)); ?>
            </li>
            <?php } ?>
            
            <!--<li class="menu-title">Extras</li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-history"></i>History</a>
                <ul class="sub-menu children dropdown-menu">
                    <li> <i class="menu-icon fa fa-th-list"></i> <?php /*echo $this->Html->link(__('  Resent Call List'), array('controller' => 'campaigns', 'action' => 'history'), array('escape' => false)); */?></li>
                </ul>
            </li>-->
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>