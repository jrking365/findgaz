


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Administrateurs </h2>
        <ol class="breadcrumb">

        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Liste des administrateurs </h5>
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
                ?>
                <div class="ibox-content">
                    <a href="<?php echo base_url(); ?>administration/admin/ajouter" class="btn btn-sm btn-outline btn-info"> <span class="fa fa-plus-square"></span> Ajouter </a><br/><br/>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Nom & prenom</th>
                                    <th>Numéro Télèphone</th>
                                    <th>Email </th>
                                    <th>Genre</th>
                                    <th>Profession</th>
                                    <th>Login</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < sizeof($liste); $i++) {
                                  echo '<tr>';
                                    echo '<td> ' . $liste[$i]->nom . ' ' . $liste[$i]->prenom . '</td>';
                                    echo '<td> ' . $liste[$i]->contact . '</td>';
                                    echo '<td> ' . $liste[$i]->email . '</td>';
                                    echo '<td> ' . $liste[$i]->genre . '</td>';
                                    echo '<td> ' . $liste[$i]->profession . '</td>';
                                    echo '<td> ' . $liste[$i]->login . '</td>';
                                    echo '<td>';
                                    ?>
                                <a href="<?php echo base_url(); ?>administration/admin/detail?id=<?php echo $liste[$i]->id; ?>" class="btn btn-sm btn-white btn-bitbucket"><i class="fa fa-eye"></i></a>
                                <a href="<?php echo base_url(); ?>administration/admin/modifier?id=<?php echo $liste[$i]->id; ?>"class="btn btn-sm btn-white btn-bitbucket"><i class="fa fa-edit"></i></a>
                                <a href="<?php echo base_url(); ?>administration/admin/supprimer?id=<?php echo $liste[$i]->id; ?>" class="btn btn-sm btn-white btn-outline btn-danger"><i class="fa fa-trash-o"></i></a>
                                    <?php
                                    echo '</td>';
                                 echo '</tr>';
                                }
                                ?>  
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nom & prenom</th>
                                    <th>Numéro Télèphone</th>
                                    <th>Email </th>
                                    <th>Genre</th>
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



