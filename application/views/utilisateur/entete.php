<div class="wrapper wrapper-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if ($this->session->userdata('successAjoutGaz') != NULL) {
                    $this->session->unset_userdata('successAjoutGaz');
                    echo '<div class="alert alert-success alert-dismissable">
                                            <button aria-hidden="true" data-dismiss="success" class="close" type="button">×</button>
                                            <a class="alert-link" href="#"> Les produits ont biens été ajoutés à votre point de vente ! </a>.
                                        </div>';
                }
                if ($this->session->userdata('echecAjoutGaz') != NULL) {
                    $this->session->unset_userdata('echecAjoutGaz');
                    echo '<div class="alert alert-danger alert-dismissable">
                                            <button aria-hidden="true" data-dismiss="danger" class="close" type="button">×</button>
                                            <a class="alert-link" href="#"> Erreur lors de l\'ajout des produits reéssayé svp ! </a>.
                                        </div>';
                }
                if ($this->session->userdata('echecGaz') != NULL) {
                    $this->session->unset_userdata('echecGaz');
                    echo '<div class="alert alert-danger alert-dismissable">
                                            <button aria-hidden="true" data-dismiss="danger" class="close" type="button">×</button>
                                            <a class="alert-link" href="#"> Vous n\'avez rien selectionné ! </a>.
                                        </div>';
                }
                if ($this->session->userdata('successDemande') != NULL) {
                    $this->session->unset_userdata('successDemande');
                    echo '<div class="alert alert-success alert-dismissable">
                                            <button aria-hidden="true" data-dismiss="success" class="close" type="button">×</button>
                                            <a class="alert-link" href="#"> Votre demande à bien été envoyée ! </a>.
                                        </div>';
                }
                if ($this->session->userdata('exitDemande') != NULL) {
                    $this->session->unset_userdata('exitDemande');
                    echo '<div class="alert alert-warning alert-dismissable">
                                            <button aria-hidden="true" data-dismiss="warning" class="close" type="button">×</button>
                                            <a class="alert-link" href="#"> Vous avez une demande en cours de traitement ! </a>.
                                        </div>';
                }
                if (isset($msg['erreur'])) {
                    echo '<div class="alert alert-warning alert-dismissable">
                                            <button aria-hidden="true" data-dismiss="warning" class="close" type="button">×</button>
                                            <a class="alert-link" href="#"> Echec de l\'execution de l\'operation </a>.
                                        </div>';
                }
                ?>
            </div>
            <div class="col-md-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Mois</span>
                        <h5>Vues</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">386,200</h1>
                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                        <small>Total vues</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">Annuel</span>
                        <h5>Commande</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">80,800</h1>
                        <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                        <small>Nouvelle commande</small>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">Aujourd'hui</span>
                        <h5>Visites</h5>
                    </div>
                    <div class="align-center ibox-content">
                        <h1 class="no-margins">102</h1>
                        <div class="stat-percent font-bold text-warning">20% <i class="fa fa-level-up"></i></div>
                        <small>Moyenne</small>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php echo $utilisateur->nom . ' ' . $utilisateur->prenom; ?></h5>
                        <div class="ibox-tools col-md-offset-3">
                            <span class="label label-primary"><?php echo $utilisateur->getTypeUtilisateur->libelle; ?></span>
                        </div>
                    </div>
                    <div class="ibox-content no-padding ">

                        <div class="flot-chart m-t-lg col-md-offset-2" style="height: 55px;">
                            <div class="flot-chart-content <?php
                            if ($true) {
                                echo 'text-warning';
                            } else {
                                echo 'text-success';
                            }
                            ?>" id="flot-chart1"><h2 class="no-margins"> <?php
                                    if ($true) {
                                        echo 'Profil en cours de modification';
                                    } else {
                                        echo 'Votre profil est à jour';
                                    }
                                    ?></h2></div>
                        </div>
                    </div>

                </div>
            </div>


        </div>