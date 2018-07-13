


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les livreurs </h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">This is</a>
            </li>
            <li class="active">
                <strong>Breadcrumb</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Liste des livreurs</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>

                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-2">
                            <a href="<?php echo base_url(); ?>administration/livreur/ajouter" class="btn btn-sm btn-outline btn-info"> <span class="fa fa-plus-square"></span> Ajouter </a><br/><br/>
                        </div>
                        <div class="col-lg-6">
                            
                        </div>
                        <div class="col-lg-4">
                           <a href="<?php echo base_url(); ?>administration/livreur/AccepterModification" class="btn btn-sm btn-outline btn-warning"> <span class="fa fa-plus-square"></span> Confirmer demande Modification </a><br/><br/> 
                        </div>
                    </div>
                    </div>    
                    
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Nom & prenom</th>
                                    <th>Numéro Télèphone</th>
                                    <th>Email </th>
                                    <th>Sexe</th>
                                    <th>Profession</th>
                                    <th>Login</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for($i=0; $i<sizeof($liste); $i++){
                              
                            echo '<tr>';
                                    echo '<td> ' . $liste[$i]->nom . ' ' . $liste[$i]->prenom . '</td>';
                                    echo '<td> ' . $liste[$i]->contact . '</td>';
                                    echo '<td> ' . $liste[$i]->email . '</td>';
                                    echo '<td> ' . $liste[$i]->genre . '</td>';
                                    echo '<td> ' . $liste[$i]->profession . '</td>';
                                    echo '<td> ' . $liste[$i]->login . '</td>';
                                    echo '<td>';
                              ?>
                            <a href="<?php echo base_url(); ?>administration/livreur/detail?id=<?php echo $liste[$i]->id; ?>" class="btn btn-sm btn-white, btn-outline btn-info"><i class="fa fa-eye"></i></a>
                            <a href="<?php echo base_url(); ?>administration/livreur/modifier?id=<?php echo $liste[$i]->id; ?>" class="btn btn-sm btn-white, btn-bitbucket"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url(); ?>administration/livreur/supprimer?id=<?php echo $liste[$i]->id; ?>" class="btn btn-sm btn-white, btn-outline btn-danger"><i class="fa fa-trash-o"></i></a>
                            <a href="<?php echo base_url(); ?>administration/livreur/zoneAction?id=<?php echo $liste[$i]->id; ?>" class="btn btn-sm btn-outline btn-primary"> <span class="fa fa-plus-square"></span> </a>
                            
                            <?php
                                }
                            ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nom & prenom</th>
                                    <th>Numéro Télèphone</th>
                                    <th>Email </th>
                                    <th>Sexe</th>
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



