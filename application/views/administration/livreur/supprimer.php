<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les livreurs </h2>

    </div>
</div>

<?php
//var_dump($utilisateur);
$nom = $utilisateur->nom;
$prenom = $utilisateur->prenom;
$contact = $utilisateur->contact;
$email = $utilisateur->email;
$numerocni = $utilisateur->numerocni;
$genre = $utilisateur->genre;
$profession = $utilisateur->profession;
$statutmatrimonial = $utilisateur->statutmatrimonial;
$login = $utilisateur->login;
$motpasse = $utilisateur->motpasse;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5>Supprimer le livreur &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/livreur" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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
                    <p>Formulaire d'ajout</p>
                    <div class="form-group"><label class="col-lg-2 control-label">Nom</label>
                        <div class="col-lg-10"><input name="nom" value="<?php echo set_value('nom',$nom); ?>" type="text" placeholder="Nom " disabled="disabled" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('nom'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Prenom</label>
                        <div class="col-lg-10"><input name="prenom" value="<?php echo set_value('prenom', $prenom); ?>" type="text" placeholder="Prenom " disabled="disabled" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('prenom'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Contact(Téléphone)</label>
                        <div class="col-lg-10"><input name="contact" value="<?php echo set_value('contact', $contact); ?>" type="number" placeholder="Contact " disabled="disabled" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('contact'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10"><input name="email" value="<?php echo set_value('email', $email); ?>" type="email" placeholder="Email " disabled="disabled" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('email'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Numéro CNI</label>
                        <div class="col-lg-10"><input name="numerocni" type="text" value="<?php echo set_value('numerocni', $numerocni); ?>" placeholder="Numéro de télèphone " disabled="disabled" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('numerocni'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Genre</label>
                        <div class="col-lg-10"><input name="genre" value="<?php echo set_value('genre',$genre); ?>" type="text" placeholder="Nom " disabled="disabled" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('genre'); ?></span></div>
                    </div>
                    
                    <div class="form-group"><label class="col-lg-2 control-label">Profession</label>
                        <div class="col-lg-10"><input name="profession" type="text" value="<?php echo set_value('profession', $profession); ?>" placeholder="Numéro de télèphone " disabled="disabled" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('profession'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Statut matrimonial</label>
                        <div class="col-lg-10"><input name="statutmatrimonial" value="<?php echo set_value('statutmatrimonial',$statutmatrimonial); ?>" type="text" placeholder="Nom " disabled="disabled" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('statutmatrimonial'); ?></span></div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="<?php echo base_url(); ?>administration/livreur/validersuppression?id=<?php echo $utilisateur->id ?>" class="btn btn-warning btn-sm">Supprimer</a>
                            <a href="<?php echo base_url(); ?>administration/livreur" class="btn  btn-info btn-sm">Annuler</a>
                        </div>

                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>