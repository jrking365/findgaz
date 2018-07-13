<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Administrateurs </h2>
        
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5>Ajouter un personnel &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/personnel" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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
                    <div class="form-group"><label class="col-lg-2 control-label">Nom</label>
                        <div class="col-lg-10"><input name="nom" value="<?php echo set_value('nom'); ?>" type="text" placeholder="Nom " class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('nom'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Prenom</label>
                        <div class="col-lg-10"><input name="prenom" value="<?php echo set_value('prenom'); ?>" type="text" placeholder="Prenom " class="form-control">
                        <span class="alert-danger help-block m-b-none"><?php echo form_error('prenom'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Contact(Téléphone)</label>
                        <div class="col-lg-10"><input name="contact" value="<?php echo set_value('contact'); ?>" type="number" placeholder="Contact " class="form-control">
                        <span class="alert-danger help-block m-b-none"><?php echo form_error('contact'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10"><input name="email" value="<?php echo set_value('email'); ?>" type="email" placeholder="Email " class="form-control">
                        <span class="alert-danger help-block m-b-none"><?php echo form_error('email'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Numéro CNI</label>
                        <div class="col-lg-10"><input name="numerocni" type="text" value="<?php echo set_value('numerocni'); ?>" placeholder="Numéro de télèphone " class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('numerocni'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Genre</label>
                        <div class="col-lg-10"><select name="genre"  class="form-control m-b">
                                <option><?php echo set_value('genre'); ?></option>
                                <option value="Masculin">Masculin</option>
                                <option value="Feminin">Feminin</option>
                            </select>
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('genre'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Profession</label>
                        <div class="col-lg-10"><input name="profession" type="text" value="<?php echo set_value('profession'); ?>" placeholder="profession " class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('profession'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Statut matrimonial</label>
                        <div class="col-lg-10"><select name="statutmatrimonial"  class="form-control m-b">
                                <option><?php echo set_value('statutmatrimonial'); ?></option>
                                <option value="Célibataire">Célibataire</option>
                                <option value="Marié">Marié</option>
                            </select>
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('statutmatrimonial'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Login </label>
                        <div class="col-lg-10"><input name="login" type="text" value="<?php echo set_value('login'); ?>" placeholder="Login" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('login'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Mot de passe  </label>
                        <div class="col-lg-10"><input name="motpasse" type="password" value="<?php echo set_value('motpasse'); ?>" placeholder="" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('motpasse'); ?></span></div>
                    </div>
                    

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-sm btn-info" type="submit">Enregistrer</button>
                            <a href="<?php echo base_url(); ?>administration/personnel" class="btn btn-danger btn-sm">Annuler</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>