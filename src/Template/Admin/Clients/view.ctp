<style type="text/css">

    #profile-image1 {
        cursor: pointer;
        width: 100px;
        height: 100px;
        border-radius: 50px;
        border: 2px solid #03b1ce;
    }
    .table td, .table th {
        padding: 0.31rem;
        vertical-align: top;
         border: none;
    }

</style>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class=" col-md-8 offset-md-2 ">
                <div class="card">
                    <div class="card-header">
                        <strong style="font-size: x-large"><i class="fa fa-user"></i> Your Profile Information</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="row col-md-12">
                            <div class="col-md-12">
                                <div align="center">
                                    <img alt="<?php $client['Client']['fullname'] ?>" src="<?php echo ($client['Client']['profileimage']!='') ? ($this->webroot."files/profiles/".$client['Client']['profileimage']) : ($this->webroot.'img/user.png'); ?>"
                                         id="profile-image1" class="img-circle img-responsive">
                                </div>

                                <div class="pt-2" align="center">
                                    <h3 style="color:#00b1b1;"> <?php echo h((isset($client['Client']['company_name']))?$client['Client']['company_name']:$client['Client']['fullname']); ?></h3></span>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-3">
                                <table class="table">
                                    <tr>
                                    </br>
                                    </tr>
                                    <tr>
                                        <th ><?php echo __('Username :'); ?></th>
                                        <td >
                                            <?php echo h($client['Client']['username']); ?>
                                            &nbsp;
                                        </td>
                                    </tr>
                                  <!--  <tr>
                                        <th><?php /*echo __('Password :'); */?></th>
                                        <td>
                                            <?php /*echo h($client['Client']['password']); */?>
                                            &nbsp;
                                        </td>
                                    </tr>-->
                                    
                                    <tr>
                                        <th ><?php echo __('Phone :'); ?></th>
                                        <td >
                                            <?php echo h($client['Client']['phone']); ?>
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <th ><?php echo __('Email :'); ?></th>
                                        <td >
                                            <?php echo h($client['Client']['email']); ?>
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <th ><?php echo __('Status :'); ?></th>
                                        <td >
                                            <?php echo ($client['Client']['active']==1)? "Active":"Deactivate"; ?>
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <th ><?php echo __('Created :'); ?></th>
                                        <td >
                                            <?php echo h($client['Client']['created']); ?>
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <th ><?php echo __('Last Update :'); ?></th>
                                        <td >
                                            <?php echo h($client['Client']['modified']); ?>
                                            &nbsp;
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div><!-- end col md 12 -->
        </div><!-- end row -->
    </div>
</div>