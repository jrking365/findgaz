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
                <?php
                if (isset($msg['erreur'])) {
                    echo '<div class="alert alert-warning alert-dismissable">
                    <button aria-hidden="true" data-dismiss="warning" class="close" type="button">×</button>
                    <a class="alert-link" href="#"> Echec de l\'execution de l\'operation </a>.
                </div>';
                }
                ?>


                <div class="row">
                    <?php if(isset($pointvente->nom)){ ?>
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
                    <?php }else{ ?>
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
                                        
                                        <form class="form-horizontal" method="post" action="ajoutPointVente">
                                            <div class="col-md-10">
                                                <div>
                                                    <div class="form-group"><label class="col-lg-3 control-label">Nom du point de vente</label>
                                                        <div class="col-lg-6"><input name="nom" value="<?php echo set_value('nom'); ?>" type="text" placeholder="Nom " class="form-control">
                                                        <span class="alert-danger help-block m-b-none"><?php echo form_error('nom'); ?></span></div>
                                                    </div>
                                                    <div class="form-group"><label class="col-lg-3 control-label">Statut matrimonial</label>
                                                        <div class="col-lg-6"><select name="quartier"  class="form-control m-b">
                                                                <option><?php echo set_value('quartier'); ?></option>
                                                                <?php for($i=0; $i<sizeof($quartier); $i++){ ?>
                                                                <option value="<?php echo $quartier[$i]->id; ?>"><?php echo $quartier[$i]->nom ; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <span class="alert-danger help-block m-b-none"><?php echo form_error('quartier'); ?></span></div>
                                                    </div>
                                                    <div class="form-group"><label class="col-lg-3 control-label">Description de votre point de vente</label>
                                                        <div class="col-lg-6"><textarea name="description" value="<?php echo set_value('description'); ?>" type="text" placeholder="Mon point de vente est..." class="form-control"></textarea>
                                                        <span class="alert-danger help-block m-b-none"><?php echo form_error('description'); ?></span></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-offset-5 col-lg-10">
                                                    <button class="btn btn-sm btn-info" type="submit">Enregistrer</button>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                                
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <?php if(isset($pointvente->nom)){ ?>
                            <div class="ibox-title">
                                <span class="label label-warning pull-right">Data has changed</span>
                                <h5><?php echo $pointvente->nom ; ?></h5>
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
                            
                            <?php }else{ ?>
                            
                            
                            
                            <?php } ?>
                        </div>
                    </div>

                </div>
