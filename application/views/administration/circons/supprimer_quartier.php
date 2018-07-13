<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Circonscriptions </h2>

    </div>
</div>
<?php
$nom = $quartier->nom;
$description = $quartier->description;
$id_commune = $quartier->commune;
$libelle_commune = $quartier->getCommune->libelle;
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5> Supprimer un quartier  &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>dministration/circonscription/liste_quartier" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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
                    <p></p>
                    <div class="form-group"><label class="col-lg-2 control-label">Nom</label>
                        <div class="col-lg-10"><input disabled name="nom" value="<?php echo set_value('nom', $nom); ?>" type="text" placeholder="Nom " class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('nom'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10"><input disabled name="description" value="<?php echo set_value('description', $description); ?>" type="text" placeholder="Description " class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('description'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Commune </label>
                        <div class="col-lg-10"><select disabled name="commune"  class="form-control m-b">
                                <option value="<?php echo set_value('commune', $id_commune); ?>"><?php echo set_value('commune', $libelle_commune); ?></option>
                                <?php
                                for ($i = 0; $i < sizeof($liste); $i++) {
                                    echo '<option value="' . $liste[$i]->id . '">' . $liste[$i]->libelle . '</option>';
                                }
                                ?>
                            </select>
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('commune'); ?></span></div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="<?php echo base_url(); ?>administration/circonscription/valid_sup_quartier?id=<?php echo $quartier->id; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                            <a href="<?php echo base_url(); ?>administration/circonscription/liste_quartier" class="btn btn-warning btn-sm">Annuler</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>