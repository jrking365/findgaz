


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Les Points de Livraisons </h2>
        <ol class="breadcrumb">

        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Liste des points </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
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
                    <a href="<?php echo base_url(); ?>administration/pointlivraisons/ajouter" class="btn btn-sm btn-outline btn-info"> <span class="fa fa-plus-square"></span> Ajouter </a> &nbsp;&nbsp;
                    <a href="<?php echo base_url(); ?>administration/pointlivraisons/carte" class="btn btn-sm btn-outline btn-success"> <span class="fa fa-map-marker"></span> <b>Visualiser Carte </b></a><br/><br/>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Quartier</th>
                                    <th>Libelle</th>
                                    <th>Description</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < sizeof($liste); $i++) {
                                  echo '<tr>';
                                    echo '<td> ' . $liste[$i]->nom .'</td>';
                                    echo '<td> ' . $liste[$i]->getQuartier->nom .'</td>';
                                    echo '<td> ' . $liste[$i]->libelle .'</td>';
                                    echo '<td> ' . $liste[$i]->description .'</td>';
                                    echo '<td> ' . $liste[$i]->longitude . '</td>';
                                    echo '<td> ' . $liste[$i]->latitude . '</td><td>';
                                    ?>
                                <a href="<?php echo base_url(); ?>administration/pointlivraisons/modifier?id=<?php echo $liste[$i]->id; ?>"class="btn btn-sm btn-white btn-bitbucket"><i class="fa fa-edit"></i></a>
                                <a href="<?php echo base_url(); ?>administration/pointlivraisons/supprimer?id=<?php echo $liste[$i]->id; ?>" class="btn btn-sm btn-white btn-outline btn-danger"><i class="fa fa-trash-o"></i></a>
                                    <?php
                                    echo '</td>';
                                 echo '</tr>';
                                }
                                ?>  
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Quartier</th>
                                    <th>Libelle</th>
                                    <th>Description</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th>
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



