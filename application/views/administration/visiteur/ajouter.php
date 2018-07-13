<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Visiteurs</h2>
        
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5>Ajouter un visiteur &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/visiteurs" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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
                
                <?php
                    if(isset($erreur)){
                        echo '<div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <a class="alert-link" href="#">'.$erreur.'</a>.
                </div>';
                    }
                ?>
                
                <form class="form-horizontal" method="post" action="">
                    <p>Formulaire d'ajout</p>
                    <div class="form-group"><label class="col-lg-2 control-label">Adresse MAC</label>
                        <div class="col-lg-10"><input name="adressemac" value="<?php echo set_value('adressemac'); ?>" type="text" placeholder="Adresse MAC" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('adressemac'); ?></span></div>
                    </div>
                    
                    <div class="form-group"><label class="col-lg-2 control-label">Adresse email</label>
                        <div class="col-lg-10"><input name="email" value="<?php echo set_value('email'); ?>" type="email" placeholder="Adresse email " class="form-control">
                        <span class="alert-danger help-block m-b-none"><?php echo form_error('email'); ?></span></div>
                    </div>
                   
                    <div class="form-group"><label class="col-lg-2 control-label">Message</label>
                        <div class="col-lg-10">
                            <textarea name="message" value="<?php echo set_value('message'); ?>" class="form-control"></textarea>
                        <span class="alert-danger help-block m-b-none"><?php echo form_error('message'); ?></span></div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-sm btn-info" type="submit">Enregistrer</button>
                            <a href="<?php echo base_url(); ?>administration/visiteurs" class="btn btn-danger btn-sm">Annuler</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>