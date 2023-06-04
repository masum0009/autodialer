<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <?php /*echo $this->Html->image('logo.png', array('alt' => 'Auto dialer','class'=>'navbar-brand')); */?>
            <a class="navbar-brand" href="./"><img src="img/logo.png" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <!--<div class="header-left">
                <div class="dropdown for-notification">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="count bg-danger">3</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="notification">
                        <p class="red">You have 3 Notification</p>
                        <a class="dropdown-item media" href="#">
                            <i class="fa fa-check"></i>
                            <p>Server #1 overloaded.</p>
                        </a>
                        <a class="dropdown-item media" href="#">
                            <i class="fa fa-info"></i>
                            <p>Server #2 overloaded.</p>
                        </a>
                        <a class="dropdown-item media" href="#">
                            <i class="fa fa-warning"></i>
                            <p>Server #3 overloaded.</p>
                        </a>
                    </div>
                </div>
                
                <div class="dropdown for-message">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-envelope"></i>
                        <span class="count bg-primary">4</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="message">
                        <p class="red">You have 4 Mails</p>
                        <a class="dropdown-item media" href="#">
                            <span class="photo media-left"><img alt="avatar" src="<?php /*echo $this->webroot; */?>img/1.jpg"></span>
                            <div class="message media-body">
                                <span class="name float-left">Jonathan Smith</span>
                                <span class="time float-right">Just now</span>
                                <p>Hello, this is an example msg</p>
                            </div>
                        </a>
                        <a class="dropdown-item media" href="#">
                            <span class="photo media-left"><img alt="avatar" src="<?php /*echo $this->webroot; */?>img/2.jpg"></span>
                            <div class="message media-body">
                                <span class="name float-left">Jack Sanders</span>
                                <span class="time float-right">5 minutes ago</span>
                                <p>Lorem ipsum dolor sit amet, consectetur</p>
                            </div>
                        </a>
                        <a class="dropdown-item media" href="#">
                            <span class="photo media-left"><img alt="avatar" src="<?php /*echo $this->webroot; */?>img/3.jpg"></span>
                            <div class="message media-body">
                                <span class="name float-left">Cheryl Wheeler</span>
                                <span class="time float-right">10 minutes ago</span>
                                <p>Hello, this is an example msg</p>
                            </div>
                        </a>
                        <a class="dropdown-item media" href="#">
                            <span class="photo media-left"><img alt="avatar" src="<?php /*echo $this->webroot; */?>img/4.jpg"></span>
                            <div class="message media-body">
                                <span class="name float-left">Rachel Santos</span>
                                <span class="time float-right">15 minutes ago</span>
                                <p>Lorem ipsum dolor sit amet, consectetur</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>-->
            
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" title="<?php $client['Client']['fullname'] ?>" src="<?php echo ($client['Client']['profileimage']!='') ? ($this->webroot."files/profiles/".$client['Client']['profileimage']) : ($this->webroot.'img/user.png'); ?>" alt="<?php $client['Client']['username'] ?>">
                    <!--<img class="user-avatar rounded-circle" src="http://localhost:8080/autodialerb/img/user.png" alt="User Avatar">-->
                </a>
                
                <div class="user-menu dropdown-menu">
                    <?php echo $this->Html->link(__('<i class="fa fa-eye"></i>'.'Show profile'), array('controller' => 'clients', 'action' => 'view', $client->id), array('class'=>'nav-link','escape' => false)); ?>
                    
                    <?php echo $this->Html->link(__('<i class="fa fa-edit"></i>'.'Update profile'), array('controller' => 'clients', 'action' => 'update',$client->id), array('class'=>'nav-link','escape' => false)); ?>
                    
                    <!--<a class="nav-link" href="#"><i class="fa fa-envelope"></i>Notifications <span class="count">13</span></a>-->
                    
                    <!--<a class="nav-link" href="#"><i class="fa fa-cog"></i>Settings</a>-->
    
                    <?php echo $this->Html->link(__('<i class="fa fa-power-off"></i>'.'Logout'), array('controller' => 'clients', 'action' => 'logout'), array('class'=>'nav-link','escape' => false)); ?>
                    
                   <!-- <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>-->
                </div>
            </div>
        
        </div>
    </div>
</header>