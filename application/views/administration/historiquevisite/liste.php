<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Historiques de Visite </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url(); ?>administration/historiquevisites/liste">Historique des visites</a>
            </li>
            <li class="active">
                <strong>Liste</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Liste de l'historique des visites </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="">
                            <i class="fa fa-wrench"></i>
                        </a>

                    </div>
                </div>
                
                
                <?php
                if ($this->session->userdata('succes') != NULL) {
                    $this->session->unset_userdata('succes');
                    echo '<div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="success" class="close" type="button">×</button>
                    <a class="alert-link" href="#"> Action éffectuée avec succes. </a>.
                </div>';
                }
                if ($this->session->userdata('erreur') != NULL) {
                    $this->session->unset_userdata('erreur');
                    echo '<div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="success" class="close" type="button">×</button>
                    <a class="alert-link" href="#"> '.$this->session->userdata('erreur').' </a>.
                </div>';
                }
                ?>
                
                <div class="ibox-content">
                    <a href="<?php echo base_url(); ?>administration/historiquevisites/ajouter" class="btn btn-sm btn-outline btn-info"> <span class="fa fa-plus-square"></span> Ajouter </a><br/><br/>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Visiteur</th>
                                    <th>Page</th>
                                    <th>Date de visite</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < sizeof($liste); $i++) {
                                    ?>
                                    <tr>
                                        <td><?php echo $liste[$i]->getVisiteur->adressemac ?></td>
                                        <td><?php echo $liste[$i]->getPage->libelle ?></td>
                                        <td><?php echo $liste[$i]->datevisite ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>administration/historiquevisites/detail?id=<?php echo $liste[$i]->id; ?>" class="btn btn-sm btn-white btn-bitbucket"><i class="fa fa-eye"></i></a>
                                            <a href="<?php echo base_url(); ?>administration/historiquevisites/modifier?id=<?php echo $liste[$i]->id; ?>"class="btn btn-sm btn-white btn-bitbucket"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url(); ?>administration/historiquevisites/supprimer?id=<?php echo $liste[$i]->id; ?>" class="btn btn-sm btn-white btn-outline btn-danger"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    <tr>

                                        <?php
                                    }
                                    ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Visiteur</th>
                                    <th>Page</th>
                                    <th>Date de visite</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>