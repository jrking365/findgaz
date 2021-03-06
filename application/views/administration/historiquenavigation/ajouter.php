<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Historiques de Navigation </h2>
        
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5>Ajouter une historique de navigation &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/historiquenavigations" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Utilisateur</label>
                        <div class="col-lg-10">
                            <select name="utilisateur" value="<?php echo set_value('utilisateur'); ?>" class="form-control m-b">
                                <option selected="selected" disabled value="">--- Selectionner ---</option>
                                <?php
                                foreach($utilisateurs as $row):
                                    ?>
                                <option value="<?php echo $row->id ?>"><?php echo $row->nom ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                            
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('utilisateur'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Page</label>
                        <div class="col-lg-10">
                            <select name="page" value="<?php echo set_value('page'); ?>" class="form-control m-b">
                                <option selected="selected" disabled value="">--- Selectionner ---</option>
                                <?php
                                foreach($pages as $row):
                                    ?>
                                
                                <option value="<?php echo $row->id ?>"><?php echo $row->libelle ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                            
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('page'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group"><label class="col-lg-2 control-label">Date de navigation</label>
                        <div class="col-lg-10"><input name="datenavigation" value="<?php echo set_value('datenavigation'); ?>" type="datetime" placeholder="Date de navigation" class="form-control">
                        <span class="alert-danger help-block m-b-none"><?php echo form_error('datenavigation'); ?></span></div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-sm btn-info" type="submit">Enregistrer</button>
                            <a href="<?php echo base_url(); ?>administration/historiquenavigations" class="btn btn-danger btn-sm">Annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
