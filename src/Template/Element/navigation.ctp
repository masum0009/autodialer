<div class="panel-primary  navbar navbar-dark bg-primary navbar-color navbar-fixed-top">
    <!--<nav class="navbar navbar-dark bg-primary">-->
        <div class="container">
            <div class="navbar-header n">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Auto Dialer</a>
            </div>
            <div class="collapse navbar-collapse navbar-light">
                <ul class="nav navbar-nav">
                    <?php
                    /* $action = !empty($this->params['action']) ? $this->params['action'] : null;*/
                    $action = !empty($this->params['controller']) ? $this->params['controller'] : null;
                    ?>
                    <li class=""><a href="#">Dashboard</a></li>
                    <?php /*echo $this->Html->link('<i class="glyphicon glyphicon-dashboard"></i>'.__('Dashboard'), array('controller' => 'pages', 'action' => 'display'), array('escape' => false)); */ ?>
                    
                    <li class="dropdown <?php echo ($action == 'campaigns') ? 'active' : '' ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Campaigns <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://localhost:8080/autodialerb/campaigns">Campaign</a></li>
                            <li><a href="http://localhost:8080/autodialerb/campaigns/create">New Campaign</a></li>
                            <li><a href="http://localhost:8080/autodialerb/campaigns/dashboard">Campaign Dashboard</a></li>
                        </ul>
                    </li>

                    <li class="dropdown <?php echo ($action == 'clients') ? 'active' : '' ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Clients <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://localhost:8080/autodialerb/clients">Clients</a></li>
                            <li><a href="http://localhost:8080/autodialerb/clients/add">New Clients</a></li>
                        </ul>
                    </li>

                    <li class="dropdown "<?php echo ($action == 'contacts') ? 'active' : '' ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contact <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://localhost:8080/autodialerb/contacts">Contact</a></li>
                            <li><a href="http://localhost:8080/autodialerb/contacts/add">Add New Contact</a></li>
                            <li><a href="http://localhost:8080/autodialerb/contacts/groupContact">Add Group Contact</a></li>
                            <li><a href="http://localhost:8080/autodialerb/contacts/importContact">Import CSV Contact</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="http://localhost:8080/autodialerb/contact_groups">Contact Group</a></li>
                        </ul>
                    </li>
                    <li><a href="#about">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown <?php echo ($action == 'campaigns') ? 'active' : '' ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-flag"></span> Notification <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://localhost:8080/autodialerb/client">Profile</a></li>
                            <li><a href="http://localhost:8080/autodialerb/clients/edit">Edit profile</a></li>
                            <li><a href="http://localhost:8080/autodialerb/clients/edit">Change password</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="http://localhost:8080/autodialerb/campaigns/dashboard">Logout</a></li>
                        </ul>
                    </li>
                    <li class="dropdown <?php echo ($action == 'campaigns') ? 'active' : '' ?>">
                        <!--<php> echo $this->Html->link($this->Html->image('design/unige_logo.png', array('width' => '48', 'height' => '48')) . ' ' . __('Add user'),'#',array('escape' => false));</php>-->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Profile <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://localhost:8080/autodialerb/client">Profile</a></li>
                            <li><a href="http://localhost:8080/autodialerb/clients/edit">Edit profile</a></li>
                            <li><a href="http://localhost:8080/autodialerb/clients/edit">Change password</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="http://localhost:8080/autodialerb/campaigns/dashboard">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div><!--/.nav-collapse -->
        </div>
 <!--   </nav>-->
</div>
<script>
    $('.dropdown').hover(
        function() {
            $(this).find('.dropdown-menu').stop(true, true).fadeIn();
        },
        function() {
            $(this).find('.dropdown-menu').stop(true, true).fadeOut();
        }
    );

   /* $('.dropdown').hover(
        function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn();
        },
        function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut();
        }
    );*/

   /* $('.dropdown-menu').hover(
        function() {
            $(this).stop(true, true);
        },
        function() {
            $(this).stop(true, true).delay(200).fadeOut();
        }
    );*/
</script>