<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Valider les demandes de modification de compte </h2>

    </div>
    
</div>

<div class="ibox-title">
    <h5>Liste des demandes de modifications &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/personnel" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
    <div class="ibox-tools">
        <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
        </a>
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-wrench"></i>
        </a>

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    
    <?php
        if(isset($erreur)){
        echo '<div class="alert alert-danger alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <a class="alert-link" href="#">'.$erreur.'</a>.
              </div>';
        }
    ?>
    <div class="row">
    <?php 
        $u = 0 ;
        for($i=0; $i<sizeof($nouveau['nouveau']); $i++){
            $u++ ;
            if($u == 4){
                echo '<div class="row">';
            }   
            ?>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Attributs</th>
                                            <th>Anciennes informations</th>
                                            <th>Nouvelles informations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Login</th>
                                            <td><?php echo $ancien['ancien'][$i]->login ; ?></td>
                                            <td><?php echo $nouveau['nouveau'][$i]->login ; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nom</th>
                                            <td><?php echo $ancien['ancien'][$i]->nom ; ?></td>
                                            <td><?php echo $nouveau['nouveau'][$i]->nom ; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Prenom</th>
                                            <td><?php echo $ancien['ancien'][$i]->prenom ; ?></td>
                                            <td><?php echo $nouveau['nouveau'][$i]->prenom ; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tel</th>
                                            <td><?php echo $ancien['ancien'][$i]->contact ; ?></td>
                                            <td><?php echo $nouveau['nouveau'][$i]->contact ; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo $ancien['ancien'][$i]->email ; ?></td>
                                            <td><?php echo $nouveau['nouveau'][$i]->email ; ?></td>
                                        </tr>
                                        <tr>
                                            <th>CNI</th>
                                            <td><?php echo $ancien['ancien'][$i]->numerocni ; ?></td>
                                            <td><?php echo $nouveau['nouveau'][$i]->numerocni ; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Genre</th>
                                            <td><?php echo $ancien['ancien'][$i]->genre ; ?></td>
                                            <td><?php echo $nouveau['nouveau'][$i]->genre ; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Profession</th>
                                            <td><?php echo $ancien['ancien'][$i]->profession ; ?></td>
                                            <td><?php echo $nouveau['nouveau'][$i]->profession ; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Statut</th>
                                            <td><?php echo $ancien['ancien'][$i]->statutmatrimonial ; ?></td>
                                            <td><?php echo $nouveau['nouveau'][$i]->statutmatrimonial ; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    ???
                                </span>
                                <small class="text-muted">Fournisseur personnel</small>
                                <b class="product-name"> <?php echo $nouveau['nouveau'][$i]->nom.' '.$nouveau['nouveau'][$i]->prenom ; ?></b>

                                <div class="small m-t-xs">
                                    j'ai deja verifie !
                                </div>
                                <div class="m-t text-righ">
                                    <a href="<?php echo base_url(); ?>administration/personnel/validermodification?oui=<?php echo $nouveau['nouveau'][$i]->id ?>" class="btn btn-xs btn-outline btn-primary">Confimer la modification</a>
                                    <a href="<?php echo base_url(); ?>administration/personnel/validermodification?non=<?php echo $nouveau['nouveau'][$i]->id ?>" class="btn btn-xs btn-outline btn-danger">Refuser la modification</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            if($u == 4){
                echo '</div>' ;
                $u = 0 ;
            } 
        }
    ?>
    </div>
</div>
