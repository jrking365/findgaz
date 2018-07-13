


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Fournisseurs Personnels </h2>

    </div>
    <div class="col-sm-6">
        <br />
        <a href="<?php echo base_url(); ?>administration/personnel/confirmInscription" class="btn btn-sm btn-outline btn-info"> <span class="fa fa-check-square"></span> Confirmer demande inscription </a>
        <a href="<?php echo base_url(); ?>administration/personnel/confirmModification" class="btn btn-sm btn-outline btn-info"> <span class="fa fa-check-square"></span> Confirmer demande de modification </a>
        <a href="<?php echo base_url(); ?>administration/personnel/confirmPointVente" class="btn btn-sm btn-outline btn-info"> <span class="fa fa-check-square"></span> Confirmer les points de ventes </a>
    </div>
</div>

<?php
if ($this->session->userdata('erreurmodif') != NULL) {
    $this->session->unset_userdata('erreurmodif');
    echo '<br /><div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="success" class="close" type="button">×</button>
                    <a class="alert-link" href="#"> Aucune demande de modification disponible ! </a>.
                </div>';
}

if ($this->session->userdata('erreurPointVente') != NULL) {
    $this->session->unset_userdata('erreurPointVente');
    echo '<br /><div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="success" class="close" type="button">×</button>
                    <a class="alert-link" href="#"> Aucune demande de validation de point de vente disponible ! </a>.
                </div>';
}

if ($this->session->userdata('erreurvalid') != NULL) {
    $this->session->unset_userdata('erreurvalid');
    echo '<br /><div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="success" class="close" type="button">×</button>
                    <a class="alert-link" href="#"> Aucune demande d\'inscription disponible ! </a>.
                </div>';
}
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Liste des personnels </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>

                    </div>
                </div><?php
                if ($this->session->userdata('success') != NULL) {
                    $this->session->unset_userdata('success');
                    echo '<div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="success" class="close" type="button">×</button>
                    <a class="alert-link" href="#"> Action éffectuée avec succes. </a>.
                </div>';
                }
                ?>

                <div class="ibox-content">
                    <a href="<?php echo base_url(); ?>administration/personnel/ajouter" class="btn btn-sm btn-outline btn-info"> <span class="fa fa-plus-square"></span> Ajouter </a><br/><br/>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Nom & prenom</th>
                                    <th>Numéro Télèphone</th>
                                    <th>Email </th>
                                    <th>Num CNI</th>
                                    <th>Profession</th>
                                    <th>Login</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < sizeof($liste); $i++) {
                                    ?>
                                    <tr>
                                        <td><?php echo $liste[$i]->nom . ' ' . $liste[$i]->prenom; ?></td>
                                        <td><?php echo $liste[$i]->contact; ?></td>
                                        <td><?php echo $liste[$i]->email; ?></td>
                                        <td><?php echo $liste[$i]->numerocni; ?></td>
                                        <td><?php echo $liste[$i]->profession; ?></td>
                                        <td><?php echo $liste[$i]->login; ?></td>
                                        <td> <a href="personnel/detail?id=<?php echo $liste[$i]->id; ?>" class="btn btn-sm btn-white, btn-outline btn-info" ><i class="fa fa-eye"> </i></a>
                                            <a href="personnel/modifier?id=<?php echo $liste[$i]->id; ?>" class="btn btn-sm btn-white, btn-bitbucket"><i class="fa fa-edit"></i></a>
                                            <a href="personnel/confirmer?id=<?php echo $liste[$i]->id; ?>" class="btn btn-sm btn-white btn-outline btn-danger"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nom & prenom</th>
                                    <th>Numéro Télèphone</th>
                                    <th>Email </th>
                                    <th>Num CNI</th>
                                    <th>Profession</th>
                                    <th>Login</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

