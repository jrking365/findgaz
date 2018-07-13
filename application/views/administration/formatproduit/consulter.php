<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Formats de produit </h2>

    </div>
</div>

<?php
$code = $formatproduit -> code;
$masse = $formatproduit -> masse;
$unite = $formatproduit->unite;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5>Le format de produit &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/formatproduits" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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


                <form class="form-horizontal" method="post" action="">
                    <div class="form-group">
                        <div>
                            <a href="<?php echo base_url(); ?>administration/formatproduits" class="btn btn-warning btn-sm">Retour</a>
                        </div>
                    </div>
                    
                    <div class="form-group"><label class="col-lg-2 control-label">Code</label>
                        <div class="col-lg-10"><input disabled readonly name="code" value="<?php echo set_value('code',$code); ?>" type="text" placeholder="Code" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('code'); ?></span></div>
                    </div>
                    
                    <div class="form-group"><label class="col-lg-2 control-label">Masse</label>
                        <div class="col-lg-10"><input disabled readonly name="masse" value="<?php echo set_value('masse', $masse); ?>" type="text" placeholder="Masse" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('masse'); ?></span></div>
                    </div>
                    
                    <div class="form-group"><label class="col-lg-2 control-label">Unité</label>
                        <div class="col-lg-10"><input disabled readonly name="unite" type="text" value="<?php echo set_value('unite', $unite); ?>" placeholder="Unité" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('unite'); ?></span></div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>