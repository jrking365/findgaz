<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Circonscriptions </h2>

    </div>
</div>
<?php
$code = $commune->code;
$libelle = $commune->libelle;
$id_departement = $commune->departement;
$libelle_departement = $commune->getDepartement->libelle;
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5> Supprimer un département  &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>dministration/circonscription/listecomm" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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
                    <div class="form-group"><label class="col-lg-2 control-label">Code</label>
                        <div class="col-lg-10"><input disabled name="code" value="<?php echo set_value('code', $code); ?>" type="text" placeholder="Code " class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('code'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Libelle</label>
                        <div class="col-lg-10"><input disabled name="libelle" value="<?php echo set_value('libelle', $libelle); ?>" type="text" placeholder="Libelle " class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('libelle'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Région </label>
                        <div class="col-lg-10"><select disabled name="departement"  class="form-control m-b">
                                <option value="<?php echo set_value('departement', $id_departement); ?>"><?php echo set_value('departement', $libelle_departement); ?></option>
                                <?php
                                for ($i = 0; $i < sizeof($liste); $i++) {
                                    echo '<option value="' . $liste[$i]->id . '">' . $liste[$i]->libelle . '</option>';
                                }
                                ?>
                            </select>
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('departement'); ?></span></div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="<?php echo base_url(); ?>administration/circonscription/valid_sup_commune?id=<?php echo $commune->id; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                            <a href="<?php echo base_url(); ?>administration/circonscription/listecomm" class="btn btn-warning btn-sm">Annuler</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>