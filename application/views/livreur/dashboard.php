<?php
if ($this->session->userdata('successDemande') != NULL) {
    $this->session->unset_userdata('successDemande');
    echo '<div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="success" class="close" type="button">×</button>
                    <a class="alert-link" href="#"> Votre demande à bien été envoyée ! </a>.
                </div>';
}
?>
<?php
if ($this->session->userdata('exitDemande') != NULL) {
    $this->session->unset_userdata('exitDemande');
    echo '<div class="alert alert-warning alert-dismissable">
                    <button aria-hidden="true" data-dismiss="warning" class="close" type="button">×</button>
                    <a class="alert-link" href="#"> Vous avez une demande en cours de traitement ! </a>.
                </div>';
}
?>

<div class="wrapper wrapper-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Mensuel</span>
                        <h5>Livré</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $livre; ?></h1>
                        <div class="stat-percent font-bold text-success"><?php echo '98%'; ?><i class="fa fa-bolt"></i></div>
                        <small>Pourcentage</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">Journalier</span>
                        <h5>A faire</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo '05'; ?></h1>
                        <div class="stat-percent font-bold text-info"><?php echo '20%'; ?> <i class="fa fa-level-up"></i></div>
                        <small>commandes</small>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-danger pull-right">Aujourd'hui</span>
                        <h5>travail</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="no-margins">2</h1>
                                <div class="font-bold text-navy">40% <i class="fa fa-level-up"></i> <small>déja livré</small></div>
                            </div>
                            <div class="col-md-6">
                                <h1 class="no-margins">3</h1>
                                <div class="font-bold text-navy">60% <i class="fa fa-level-up"></i> <small>restant</small></div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php echo $utilisateur; ?></h5>
                        <div class="ibox-tools">
                            <span class="label label-primary"><?php echo $type; ?></span>
                        </div>
                    </div>
                    <div class="ibox-content no-padding">

                        <div class="flot-chart m-t-lg" style="height: 55px;">
                            <div class="flot-chart-content" id="flot-chart1"><h3 class="no-margins text-success"> <?php
                                    if ($true) {
                                        echo 'Profil en cours de modification';
                                    } else {
                                        echo 'Pas de modification en cours';
                                    }
                                    ?></h3></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div>
                            <span class="pull-right text-right">
                                <small>Detail et moyenne de note pour le <strong>Livreur</strong></small>
                                <br/>
                                Ce mois
                            </span>
                            <h3 class="font-bold no-margins">
                                Details sur le profil
                            </h3>
                            <small>Notation & classement.</small>
                        </div>

                        <div class="m-t-sm">

                            <div class="row">
                                <div class="col-md-8">
                                    <div><br>
                                        <h2><strong  ><?php echo $utilisateur; ?></strong></h2>
                                        <strong>Statut :</strong><?php echo $statut ?><br>
                                        <strong>Profession :</strong><?php echo $profession ?><br><br>
                                        <address>
                                            <strong>Contact :</strong><?php echo $contact ?><br>
                                            <strong>email :</strong><?php echo $email ?><br>
                                            <strong>CNI N0 :</strong><?php echo $cni ?>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="stat-list m-t-lg">
                                        <li>
                                            <h2 class="no-margins">2,346</h2>
                                            <small>Total orders in period</small>
                                            <div class="progress progress-mini">
                                                <div class="progress-bar" style="width: 48%;"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">4,422</h2>
                                            <small>Orders in last month</small>
                                            <div class="progress progress-mini">
                                                <div class="progress-bar" style="width: 60%;"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="m-t-md">
                            <small class="pull-right">
                                <i class="fa fa-clock-o"> </i>
                                Update on 16.07.2015
                            </small>
                            <small>
                                <strong>Analysis of sales:</strong> The value has been changed over time, and last month reached a level over $50,000.
                            </small>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-warning pull-right">Data has changed</span>
                        <h5>User activity</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stats-label">Pages / Visit</small>
                                <h4>236 321.80</h4>
                            </div>

                            <div class="col-xs-4">
                                <small class="stats-label">% New Visits</small>
                                <h4>46.11%</h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stats-label">Last week</small>
                                <h4>432.021</h4>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stats-label">Pages / Visit</small>
                                <h4>643 321.10</h4>
                            </div>

                            <div class="col-xs-4">
                                <small class="stats-label">% New Visits</small>
                                <h4>92.43%</h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stats-label">Last week</small>
                                <h4>564.554</h4>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stats-label">Pages / Visit</small>
                                <h4>436 547.20</h4>
                            </div>

                            <div class="col-xs-4">
                                <small class="stats-label">% New Visits</small>
                                <h4>150.23%</h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stats-label">Last week</small>
                                <h4>124.990</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Commandes A Livrer</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-9 m-b-xs">
                                <div data-toggle="buttons" class="btn-group">
                                    <label class="btn btn-sm btn-white"> <input type="radio" id="option1" name="options"> Ce Jour</label>
                                    <label class="btn btn-sm btn-white active"> <input type="radio" id="option2" name="options">Ce Mois </label>
                                    <label class="btn btn-sm btn-white"> <input type="radio" id="option3" name="options"> Cette Annee </label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>client</th>
                                        <th>point de livraison</th>
                                        <th>pack de livraison</th>
                                        <th>quantite</th>
                                        <th>Prix</th>
                                        <th>Date</th>
                                        <th>etat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                                                        
                                    for ($i = 0; $i < sizeof($liste); $i++) {
                                         $c = $i+1;
                                        echo '<tr>';
                                        echo '<td>' .$c.'</td>';
                                        echo '<td> ' . $liste[$i]->getClient->nom . ' ' . $liste[$i]->getClient->prenom . '</td>';
                                        echo '<td> ' . $liste[$i]->pointLivraison->description . '</td>';
                                        echo '<td> ' . $liste[$i]->packLivraison->description . '</td>';
                                        echo '<td> ' . $liste[$i]->quantite . '</td>';
                                        echo '<td> ' . $liste[$i]->prix . '</td>';
                                        echo '<td> ' . $liste[$i]->date . '</td>';
                                        ?>
                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                    <?php
                                        echo '</tr>';
                                    }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

