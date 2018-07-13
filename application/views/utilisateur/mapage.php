<div class="row">    
    <?php if (is_object($pointvente) && isset($pointvente->nom)) { ?>
        <?php if ($pointvente->etat == 8) { ?>
            <div class="col-lg-8"> 
                <div class="ibox float-e-margins">
                    <div class="ibox-content"> 
                        <div>
                            <span class="pull-right text-right">
                                <small>Average value of sales in the past month in: <strong>United states</strong></small>
                                <br/>
                                All sales: 162,862
                            </span>
                            <h3 class="font-bold no-margins">
                                Half-year revenue margin
                            </h3>
                            <small>Sales marketing.</small>
                        </div>

                        <div class="m-t-sm">

                            <div class="row">
                                <div class="col-md-8">
                                    <div>
                                        <canvas id="lineChart" height="114"></canvas>
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
                        <h5><?php echo $pointvente->nom; ?></h5>
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

        <?php } else { ?>
            <div class="col-lg-12"> 
                <div class="ibox float-e-margins">
                    <div class="ibox-content"> 
                        <div>
                            <span class="pull-right text-right">
                                <small>votre point de vente sera valide par l'adminitrateur <strong>Findgaz</strong></small>
                                <br/>
                                <?php echo date('H:m:s'); ?>
                            </span>
                            <h3 class="font-bold no-margins">
                                Configurer votre point de vente
                            </h3>
                            <small>en quelques minutes</small>
                        </div>
                        <div class="m-t-sm">
                            <div class="row">        
                                <div class="col-md-12">
                                    <div>
                                        <?php if (is_object($liste)) { ?>
                                        <form method="post" action="<?= base_url()?>compte/accueil/ajouterGaz">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th># </th>
                                                            <th>Produit </th>
                                                            <th>Type de bouteille </th>
                                                            <th>Format de la bouteille </th>
                                                            <th>Prix unitaire</th>
                                                            <th>Ajouter</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 0; foreach ($liste as $gaz): $i++ ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $gaz->getProduit->libelle ?></td>
                                                            <td><?= $gaz->getProduit->getSociete->nom ?></td>
                                                            <td><?= $gaz->getFormatProduit->masse.' '.$gaz->getFormatProduit->unite ?></td>
                                                            <td><?= $gaz->prix_unitaire.' Fcfa' ?></td>
                                                            <td> 
                                                                <div class="switch col-md-offset-3">
                                                                    <div class="checkbox checkbox-success">
                                                                        <input value="<?= $gaz->id ?>" name="gaz[]" id="checkbox3" type="checkbox">
                                                                        <label for="checkbox3">
                                                                            
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <div class="col-md-offset-9">
                                                    <button type="submit" class="btn btn-success btn-facebook btn-outline">
                                                        <i class="fa fa-check"> </i> Confirmer
                                                    </button>
                                                </div>
                                            </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="col-lg-12"> 
            <div class="ibox float-e-margins">
                <div class="ibox-content"> 
                    <div>
                        <span class="pull-right text-right">
                            <small>votre point de vente sera valide par l'adminitrateur <strong>Findgaz</strong></small>
                            <br/>
                            <?php echo date('H:m:s'); ?>
                        </span>
                        <h3 class="font-bold no-margins">
                            Créer votre point de vente
                        </h3>
                        <small>en 1 minute</small>
                    </div>
                    <div class="m-t-sm">
                        <div class="row">        
                            <div class="col-md-12">
                                <div>
                                    <div class="text-center p-lg h-200 animated bounceInDown">
                                        <a href="<?php echo base_url(); ?>compte/accueil/ajoutPointVente" class="btn btn-block btn-outline btn-success" ><h2><i class="fa fa-send-o" > Commencer par créer votre point de vente</i></h2></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>