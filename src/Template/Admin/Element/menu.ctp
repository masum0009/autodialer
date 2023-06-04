<nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            
            <li>
                <?php //echo $this->Html->link('<i class="menu-icon fa fa-laptop"></i>'.__(' Dashboard'), array('controller' => '', 'action' => 'index'), array('escape' => false)); ?>
            </li>
    
            <li class="menu-title">Clients</li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user-o"></i>Clients</a>
                <ul class="sub-menu children dropdown-menu">
                    <li> <i class="fa fa-list"></i>  <?php echo $this->Html->link(__(' Clients'), array('controller' => 'clients', 'action' => 'index'), array('escape' => false)); ?></li>
                    <li> <i class="fa fa-plus-square"></i> <?php echo $this->Html->link(__(' Add Client'), array('controller' => 'clients', 'action' => 'add'), array('escape' => false)); ?></li>
                </ul>
            </li>            
            
            <li class=" menu-title">Gateways</li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-group"></i>Gateways</a>
                <ul class="sub-menu children dropdown-menu">
                    <li> <i class="fa fa-list"></i>  <?php echo $this->Html->link(__(' Gateways'), array('controller' => 'gateway', 'action' => 'index'), array('escape' => false)); ?></li>
                    <li> <i class="fa fa-plus-square"></i> <?php  echo $this->Html->link(__(' Add Gateway'), array('controller' => 'gateway', 'action' => 'add'), array('escape' => false)); ?></li>
                </ul>
            </li>
            
        </ul>
    </div>
</nav>