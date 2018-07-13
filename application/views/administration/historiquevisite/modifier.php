<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Historiques de Visite</h2>

    </div>
</div>

<?php
    $adressemacVisiteur = $historiquevisite->getVisiteur->adressemac;
    $idVisiteur = $historiquevisite->visiteur;
    $jVisiteur = $idVisiteur;
    
    $libellePage = $historiquevisite->getPage->libelle;
    $idPage = $historiquevisite->page;
    $jPage = $idPage;
    
    $datevisite = $historiquevisite->datevisite;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5>Modifier une historique de visite &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/historiquevisites" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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
                    
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Visiteur </label>
                        <div class="col-lg-10"><select name="visiteur"  class="form-control m-b">
                                <option value="<?php echo set_value('visiteur', $idVisiteur); ?>"><?php echo set_value('visiteur', $adressemacVisiteur); ?></option>
                                
                                <?php
                                foreach ($visiteurs as $row):
                                    if ($row->id != $jVisiteur) {
                                        ?>
                                        <option value="<?php echo $row->id ?>"><?php echo $row->adressemac ?></option>
                                        <?php
                                    }
                                endforeach;
                                ?>
                            </select>
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('visiteur'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Page</label>
                        <div class="col-lg-10"><select name="page"  class="form-control m-b">
                                <option value="<?php echo set_value('page', $idPage); ?>"><?php echo $libellePage; ?></option>
                                
                                <?php
                                foreach ($pages as $row):
                                    if ($row->id != $jPage) {
                                        ?>
                                        <option value="<?php echo $row->id ?>"><?php echo $row->libelle ?></option>
                                        <?php
                                    }
                                endforeach;
                                ?>
                            </select>
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('page'); ?></span>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">Date de visite</label>
                        <div class="col-lg-10"><input name="datevisite" value="<?php echo set_value('datevisite', $datevisite); ?>" type="datetime" placeholder="Date de visite" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('datevisite'); ?></span></div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-sm btn-info" type="submit">Modifier</button>
                            <a href="<?php echo base_url(); ?>administration/historiquevisites" class="btn btn-danger btn-sm">Annuler</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>