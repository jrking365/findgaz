<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Sociétés</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url(); ?>administration/societes/index">Société</a>
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
                    <h5>Liste des sociétés </h5>
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
                    <a href="<?php echo base_url(); ?>administration/societes/ajouter" class="btn btn-sm btn-outline btn-info"> <span class="fa fa-plus-square"></span> Ajouter </a><br/><br/>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Libellé</th>
                                    <th>Description</th>
                                    <th>Logo</th>
                                    <th>Slogan</th>
                                    <th>Site web</th>
                                    <th>Contact</th>
                                    <th>Boite postal</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for ($i = 0; $i < sizeof($liste); $i++) {
                                ?>
                                <tr>
                                    <td><?php echo $liste[$i] -> nom ?></td>
                                    <td><?php echo $liste[$i] -> libelle ?></td>
                                    <td><?php echo $liste[$i] -> description ?></td>
                                    <td><?php echo $liste[$i] -> logo ?></td>
                                    <td><?php echo $liste[$i] -> slogan ?></td>
                                    <td><?php echo $liste[$i] -> siteweb ?></td>
                                    <td><?php echo $liste[$i] -> contact ?></td>
                                    <td><?php echo $liste[$i] -> boitepostal ?></td>
                                    <td><?php echo $liste[$i] -> email ?></td>
                                    <td>
                                    <a href="<?php echo base_url(); ?>administration/societes/detail?id=<?php echo $liste[$i]->id; ?>" class="btn btn-sm btn-white btn-bitbucket"><i class="fa fa-eye"></i></a>
                                    <a href="<?php echo base_url(); ?>administration/societes/modifier?id=<?php echo $liste[$i]->id; ?>"class="btn btn-sm btn-white btn-bitbucket"><i class="fa fa-edit"></i></a>
                                    <a href="<?php echo base_url(); ?>administration/societes/supprimer?id=<?php echo $liste[$i]->id; ?>" class="btn btn-sm btn-white btn-outline btn-danger"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                <tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nom</th>
                                    <th>Libellé</th>
                                    <th>Description</th>
                                    <th>Logo</th>
                                    <th>Slogan</th>
                                    <th>Site web</th>
                                    <th>Contact</th>
                                    <th>Boite postal</th>
                                    <th>Email</th>
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