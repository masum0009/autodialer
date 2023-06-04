<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href=""><img src="<?= $this->Url->build('/img/logo.png', true) ?>" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle" src="<?= $this->Url->build('/img/avater.png') ?>">
                    
                </a>
                
                <div class="user-menu dropdown-menu">
                    <?php //echo $this->Html->link(__('<i class="fa fa-user-o"></i>'.'profile'), array('controller' => 'users', 'action' => 'edit'), array('class'=>'nav-link','escape' => false)); ?>
                    <?php echo $this->Html->link(__('<i class="fa fa-power-off"></i>'.'Logout'), array('controller' => 'auth', 'action' => 'logout'), array('class'=>'nav-link','escape' => false)); ?>
                </div>
            </div>
        
        </div>
    </div>
</header>