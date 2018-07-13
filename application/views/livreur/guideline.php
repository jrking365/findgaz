<?php
if ($this->session->userdata('success') != NULL) {
    $this->session->unset_userdata('success');
    echo '<div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="success" class="close" type="button">×</button>
                    <a class="alert-link" href="#"> Commande passé en cours ! </a>.
                </div>';
}
?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Feuille de route</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Tableau de bord</a>
            </li>

            <li class="active">
                <strong>Feuille de route</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-content">
                    <h3>A faire</h3>
                    <ul class="sortable-list connectList agile-list" id="todo">

                        <?php
                        foreach ($aFaire as $cmd) {
                            ?>
                            <li class="danger-element">
                                <h3><strong><?php echo ' ' .$cmd->getClient->nom .' '.$cmd->getClient->prenom; ?></strong></h3>
                                <p><i class="fa fa-map-marker"></i><?php echo $cmd->pointLivraison->libelle; ?><br>
                                    <?php echo $cmd->pointLivraison->description; ?>
                                </p>
                                <address>
                                    adresse du client
                                    <strong><?php
                                        echo $cmd->quantite .' bouteille(s)' .'<br>';
                                        echo $cmd->packLivraison->description;
                                        ?></strong><br>
                                    <abbr title="Phone">Tel:</abbr> <?php echo $cmd->getCLient->contact; ?>
                                </address>


                                <div class="clearfix"></div>
                                <div class="agile-detail"> 
                                    <a href="<?php echo base_url(); ?>livreur/accueil/ExpedierCommande?id=<?php echo $cmd->id; ?>" class="pull-right btn btn-xs btn-primary"><i class="fa fa-paper-plane-o"></i>Livrer</a>
                                    a livrer avant<br>
                                    <i class="fa fa-clock-o"></i>
                                    <?php
                                    $datec = $cmd->date;
                                    $date = date_create_from_format('Y-m-d', $datec);
                                    //date('Y-m-d H:i:s', strtotime('+1 day',str_replace('-','/',$datec)));
                                    $date->add(new DateInterval('P1D'));
                                    //$date->modify('+1 day');
                                    ?> <span class="label-danger"><?php echo htmlspecialchars($date->format('g:ia \o\n l jS F Y'), ENT_QUOTES, "UTF-8");
                                    ?></span>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-content">
                    <h3>En cours</h3>

                    <ul class="sortable-list connectList agile-list" id="inprogress">
                        <?php
                        foreach ($enCours as $cmd) {
                            ?>
                            <li class="warning-element">
                                <h3><strong><?php echo ' ' .$cmd->getClient->nom .' '.$cmd->getClient->prenom; ?></strong></h3>
                                <p><i class="fa fa-map-marker"></i><?php echo $cmd->pointLivraison->libelle; ?><br>
                                    <?php echo $cmd->pointLivraison->description; ?>
                                </p>
                                <address>
                                    <strong><?php
                                        echo $cmd->quantite .' bouteille(s)' .'<br>';
                                        echo $cmd->packLivraison->description;
                                        ?></strong><br>
                                    <abbr title="Phone">Tel:</abbr> <?php echo $cmd->getCLient->contact; ?>
                                </address>


                                <div class="clearfix"></div>
                                <div class="agile-detail"> a livrer avant<br>
                                    <i class="fa fa-clock-o"></i>
                                    <?php
                                    $datec = $cmd->date;
                                    $date = date_create_from_format('Y-m-d', $datec);

                                    //date('Y-m-d H:i:s', strtotime('+1 day',str_replace('-','/',$datec)));
                                    $date->add(new DateInterval('P1D'));
                                    //$date->modify('+1 day');
                                    ?> <span class="label-danger"><?php echo htmlspecialchars($date->format('g:ia \o\n l jS F Y'), ENT_QUOTES, "UTF-8");
                                    ?></span>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-content">
                    <h3>Déja exécuté</h3>

                    <ul class="sortable-list connectList agile-list" id="completed">
                        <?php
                        foreach ($execute as $cmd) {
                            ?>
                            <li class="success-element">
                                <h3><strong><?php echo ' ' .$cmd->getClient->nom .' '.$cmd->getClient->prenom; ?></strong></h3>
                                <i class="fa fa-map-marker"></i><?php echo $cmd->pointLivraison->libelle; ?><br>
                                    <?php echo $cmd->pointLivraison->description; ?>
                                </p>
                                <address>
                                    adresse du client
                                    <strong><?php
                                        echo $cmd->quantite .' bouteille(s)' .'<br>';
                                        echo $cmd->packLivraison->description;
                                        ?></strong><br>
                                    <abbr title="Phone">Tel:</abbr> <?php echo $cmd->getCLient->contact; ?>
                                </address>


                                <div class="clearfix"></div>
                                <div class="agile-detail"> 
                                    
                                   
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>

    </div>




</div>