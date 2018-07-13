<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Visiteurs </h2>

    </div>
</div>

<?php
$adressemac = $visiteur -> adressemac;
$email = $visiteur -> email;
$message = $visiteur -> message;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5>Le visiteur &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/visiteurs" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>

                </div>
            </div>
            <div class="ibox-content">


                <form class="form-horizontal" method="post" action="">
                    <div class="form-group">
                        <div>
                            <a href="<?php echo base_url(); ?>administration/visiteurs" class="btn btn-warning btn-sm">Retour</a>
                        </div>
                    </div>
                    
                    <div class="form-group"><label class="col-lg-2 control-label">Adresse MAC</label>
                        <div class="col-lg-10"><input disabled readonly name="adressemac" value="<?php echo set_value('adressemac',$adressemac); ?>" type="text" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('adressemac'); ?></span></div>
                    </div>
                    
                    <div class="form-group"><label class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10"><input disabled readonly name="email" value="<?php echo set_value('email', $email); ?>" type="email" placeholder="Email " class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('email'); ?></span></div>
                    </div>
                    
                    <div class="form-group"><label class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                            <textarea disabled readonly name="message" class="form-control">
                                <?php echo set_value('message', $message); ?>
                            </textarea>
                        <span class="alert-danger help-block m-b-none"><?php echo form_error('message'); ?></span></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>