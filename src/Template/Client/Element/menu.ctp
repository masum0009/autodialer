<nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            
            <li>
                <?php echo $this->Html->link('<i class="menu-icon fa fa-laptop"></i>'.__(' Dashboard'), array('controller' => 'Dashboard', 'action' => 'index'), array('escape' => false)); ?>
            </li>
    
            <li class="menu-title">Campaigns</li><!-- /.menu-title -->
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bullhorn"></i>Campaigns</a>
                <ul class="sub-menu children dropdown-menu">
                    <li> <i class="fa fa-list"></i>  <?php echo $this->Html->link(__(' Campaigns'), array('controller' => 'campaigns', 'action' => 'index'), array('escape' => false)); ?></li>
                    <li> <i class="fa fa-plus-square"></i> <?php echo $this->Html->link(__(' Add Campaigns'), array('controller' => 'campaigns', 'action' => 'add'), array('escape' => false)); ?></li>
                </ul>
            </li>

            <!-- <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Actions</a>
                <ul class="sub-menu children dropdown-menu">
                    <li> <i class="fa fa-list"></i>   -->
                    <?php //echo $this->Html->link(__(' Actions'), array('controller' => 'Actions', 'action' => 'index'), array('escape' => false)); ?>
                <!-- </li>
                    <li> <i class="fa fa-plus-square"></i>  -->
                    <?php //echo $this->Html->link(__(' Add Actions'), array('controller' => 'Actions', 'action' => 'add'), array('escape' => false)); ?>
                
                <!-- </li>
                </ul>
            </li> -->

            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-audio-o"></i>Audio </a>
                <ul class="sub-menu children dropdown-menu">
                    <li> <i class="fa fa-list"></i>  <?php echo $this->Html->link(__(' Audio'), array('controller' => 'audios', 'action' => 'index'), array('escape' => false)); ?></li>
                    <li> <i class="fa fa-plus-square"></i> <?php echo $this->Html->link(__(' Add Audio'), array('controller' => 'audios', 'action' => 'add'), array('escape' => false)); ?></li>
                </ul>
            </li>

            <li class="menu-title">Contacts</li><!-- /.menu-title -->
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-address-card"></i>Contacts</a>
                <ul class="sub-menu children dropdown-menu">
                    <li> <i class="fa fa-list"></i>   <?php echo $this->Html->link(__('  Contacts'), array('controller' => 'contacts', 'action' => 'index'), array('escape' => false)); ?></li>
                    <li> <i class="fa fa-plus-square"></i> <?php echo $this->Html->link(__('  Add Contacts'), array('controller' => 'contacts', 'action' => 'add'), array('escape' => false)); ?></li>
                    <!--<li> <i class="fa fa-file"></i> <?php /*echo $this->Html->link(__('  Import CSV Contact'), array('controller' => 'contacts', 'action' => 'importContact'), array('escape' => false)); */?></li>-->
                </ul>
            </li>
            
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-address-book"></i>Contact Groups</a>
                <ul class="sub-menu children dropdown-menu">
                    <li> <i class="fa fa-list"></i>  <?php echo $this->Html->link(__('  Contact Groups'), array('controller' => 'contactGroups', 'action' => 'index'), array('escape' => false)); ?></li>
                    <li> <i class="fa fa-plus-square"></i> <?php echo $this->Html->link(__('  Add Groups'), array('controller' => 'contactGroups', 'action' => 'add'), array('escape' => false)); ?></li>
                </ul>
            </li>
            
            
            <li class=" menu-title">Gateways</li><!-- /.menu-title -->
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-send"></i>Gateways</a>
                <ul class="sub-menu children dropdown-menu">
                    <li> <i class="fa fa-list"></i>  <?php echo $this->Html->link(__(' Gateways'), array('controller' => 'gateway', 'action' => 'index'), array('escape' => false)); ?></li>
                    <li> <i class="fa fa-plus-square"></i> <?php echo $this->Html->link(__(' Add Gateway'), array('controller' => 'gateway', 'action' => 'add'), array('escape' => false)); ?></li>
                </ul>
            </li>
            
            
            <li>
                <?php //echo $this->Html->link('<i class="menu-icon fa fa-history"></i>'.__(' Call Forwarding'), array('controller' => 'CallForwarding', 'action' => 'index'), array('escape' => false)); ?>
            </li>
            
        </ul>
    </div>
</nav>