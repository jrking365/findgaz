<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Valider les demandes d'inscription </h2>

    </div>
    <!--
    <div class="col-sm-4">
        <br />
        <a href="<?php echo base_url(); ?>administration/personnel/confirmInscription" class="btn btn-sm btn-outline btn-info"> <span class="fa fa-check-square"></span> Confirmer demande inscription </a>
        <a href="<?php echo base_url(); ?>administration/personnel/confirmModification" class="btn btn-sm btn-outline btn-info"> <span class="fa fa-check-square"></span> Confirmer demande de modification </a>
    </div>
    -->
    
</div>

<div class="ibox-title">
    <h5>Liste des demandes d'inscription &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/personnel" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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
        for($i=0; $i<sizeof($liste); $i++){
            $u++ ;
            if($u == 4){
                echo '<div class="row">';
            }   
            ?>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                <h4>
                                <?php 
                                    echo 'Nom : '.$liste[$i]->nom.' <br /> Prenom : '.$liste[$i]->prenom.'<br />';
                                    echo 'Tel : '.$liste[$i]->contact.' <br /> Email : '.$liste[$i]->email.'<br />';
                                    echo 'CNI : '.$liste[$i]->numerocni.' <br />';
                                ?>
                                </h4>
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    ???
                                </span>
                                <small class="text-muted">Fournisseur personnel</small>
                                <b class="product-name"> <?php echo $liste[$i]->nom.' '.$liste[$i]->prenom ; ?></b>

                                <div class="small m-t-xs">
                                    j'ai deja verifie !
                                </div>
                                <div class="m-t text-righ">
                                    <a href="<?php echo base_url(); ?>administration/personnel/validerinscript?oui=<?php echo $liste[$i]->id ?>" class="btn btn-xs btn-outline btn-primary">Confimer l'inscription</a>
                                    <a href="<?php echo base_url(); ?>administration/personnel/validerinscript?non=<?php echo $liste[$i]->id ?>" class="btn btn-xs btn-outline btn-danger">Refuser l'inscription</a>
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
            