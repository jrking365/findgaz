<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Sociétés </h2>

    </div>
</div>

<?php
$nom = $societe -> nom;
$libelle = $societe -> libelle;
$description = $societe -> description;
$logo = $societe->logo;
$slogan = $societe -> slogan;
$siteweb = $societe -> siteweb;
$contact = $societe -> contact;
$boitepostal = $societe -> boitepostal;
$email = $societe -> email;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5>Modifier un société &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/societes" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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
                if (isset($erreur)) {
                    echo '<div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <a class="alert-link" href="#">' . $erreur . '</a>.
                </div>';
                }
                ?>

                <form class="form-horizontal" method="post" action="">
                    <p>Formulaire de modification</p>
                    <div class="form-group"><label class="col-lg-2 control-label">Nom</label>
                        <div class="col-lg-10"><input name="nom" value="<?php echo set_value('nom',$nom); ?>" type="text" placeholder="Nom" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('nom'); ?></span></div>
                    </div>
                    
                    <div class="form-group"><label class="col-lg-2 control-label">Libellé</label>
                        <div class="col-lg-10"><input name="libelle" value="<?php echo set_value('libelle', $libelle); ?>" type="text" placeholder="Libellé" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('libelle'); ?></span></div>
                    </div>
                    
                    <div class="form-group"><label class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                            <textarea name="description" class="form-control">
                                <?php echo set_value('description', $description); ?>
                            </textarea>
                        <span class="alert-danger help-block m-b-none"><?php echo form_error('description'); ?></span></div>
                    </div>
                    
                    <div class="form-group"><label class="col-lg-2 control-label">Logo</label>
                        <div class="col-lg-10"><input name="logo" type="text" value="<?php echo set_value('logo', $logo); ?>" placeholder="Logo" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('logo'); ?></span></div>
                    </div>
                    
                    <div class="form-group"><label class="col-lg-2 control-label">Slogan</label>
                        <div class="col-lg-10"><input name="slogan" type="text" value="<?php echo set_value('slogan', $slogan); ?>" placeholder="Slogan" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('slogan'); ?></span></div>
                    </div>
                    
                    <div class="form-group"><label class="col-lg-2 control-label">Site web </label>
                        <div class="col-lg-10"><input name="siteweb" type="text" value="<?php echo set_value('siteweb', $siteweb); ?>" placeholder="Site web" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('siteweb'); ?></span></div>
                    </div>
                    
                    <div class="form-group"><label class="col-lg-2 control-label">Contact</label>
                        <div class="col-lg-10"><input name="contact" type="text" value="<?php echo set_value('contact', $contact); ?>" placeholder="Contact" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('contact'); ?></span></div>
                    </div>
                    
                    <div class="form-group"><label class="col-lg-2 control-label">Boite postal</label>
                        <div class="col-lg-10"><input name="boitepostal" type="text" value="<?php echo set_value('boitepostal', $boitepostal); ?>" placeholder="Boite postal" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('boitepostal'); ?></span></div>
                    </div>
                    
                    <div class="form-group"><label class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10"><input name="email" value="<?php echo set_value('email', $email); ?>" type="email" placeholder="Email " class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('email'); ?></span></div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-sm btn-info" type="submit">Modifier</button>
                            <a href="<?php echo base_url(); ?>administration/societes" class="btn btn-danger btn-sm">Annuler</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>