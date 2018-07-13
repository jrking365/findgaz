<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Valider les modifications des point de ventes </h2>

    </div>
</div>

<div class="ibox-title">
    <h5>Liste des points de ventes &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/personnel" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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
    if (isset($erreur)) {
        echo '<div class="alert alert-danger alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <a class="alert-link" href="#">' . $erreur . '</a>.
              </div>';
    }
    ?>
    <div class="row">
        <?php
        $u = 0;
        for ($i = 0; $i < sizeof($liste); $i++) {
            $u++;
            if ($u == 2) {
                echo '<div class="row">';
            }
            ?>
            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-content product-box">

                        <div class="product-imitation">
                            <div class="table-responsive text-center">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Produit </th>
                                            <th>Type de bouteille </th>
                                            <th>Format de la bouteille </th>
                                            <th>Prix unitaire</th>
                                            <th>Disponibilité</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($maListe as $gaz): if($gaz->getPointVente->id == $liste[$i]->id){ ?>
                                            
                                            <tr>
                                                <td><?= $gaz->getGaz->getProduit->libelle ?></td>
                                                <td><?= $gaz->getGaz->getProduit->getSociete->nom ?></td>
                                                <td><?= $gaz->getGaz->getFormatProduit->masse . ' ' . $gaz->getGaz->getFormatProduit->unite ?></td>
                                                <td><?= $gaz->getGaz->prix_unitaire . ' Fcfa' ?></td>
                                                <td>
                                                    <?php 
                                                        if($gaz->getEtat->id == 9)
                                                            echo 'Oui' ;
                                                        else
                                                            echo 'Non' ;
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php } endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="product-desc">
                            <span class="product-price">
                                ???
                            </span>
                            <small class="text-muted">Point de vente</small>
                            <b class="product-name"> <?= $liste[$i]->nom ?></b>

                            <div class="small m-t-xs">
                                j'ai deja verifie !
                            </div>
                            <div class="m-t text-righ">
                                <a href="<?php echo base_url(); ?>administration/personnel/validerpoint?oui=<?php echo $liste[$i]->id ?>" class="btn btn-xs btn-outline btn-primary">Valider le point de vente</a>
                                <a href="<?php echo base_url(); ?>administration/personnel/validerpoint?non=<?php echo $liste[$i]->id ?>" class="btn btn-xs btn-outline btn-danger">Ne pas valider</a>
                            </div>
                        </div>
                    </div>
            </div>
            <?php
            if ($u == 2) {
                echo '</div>';
                $u = 0;
            }
        }
        ?>
    </div>
