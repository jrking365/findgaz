<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Les Points de Livraisons</h2>

    </div>
</div>

<?php 
    $id_quartier = $point->quartier;
    $libelle_quartier = $point->getQuartier->nom;
    $libelle = $point->libelle;
    $description = $point->description;
    $latitude = $point->latitude;
    $longitude = $point->longitude;
    if($latitude == 0 || $latitude == NULL || $longitude == 0 || $longitude == NULL){
        $defaut = 1;
        $latitude = 0;
        $longitude = 0;
    }else{
         $defaut = 0;
    }
    
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5> Modifier le point &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/pointlivraisons" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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

                <?php
                if (isset($erreur)) {
                    echo '<div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <a class="alert-link" href="#">' . $erreur . '</a>.
                </div>';
                }
                ?>

                <form class="form-horizontal" method="post" action="">
                    <p>Formulaire d'ajout</p>
                    <div class="form-group"><label class="col-lg-2 control-label">Quartier </label>
                        <div class="col-lg-10"><select name="quartier"  class="form-control m-b">
                                <option value="<?php echo set_value('quartier', $id_quartier); ?>"><?php echo set_value('quartier', $libelle_quartier); ?></option>
                                <?php
                                for ($i = 0; $i < sizeof($liste); $i++) {
                                    echo '<option value="' . $liste[$i]->id . '">' . $liste[$i]->nom . '</option>';
                                }
                                ?>
                            </select>
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('quartier'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Libelle</label>
                        <div class="col-lg-10"><input name="libelle" value="<?php echo set_value('libelle', $libelle); ?>" type="text" placeholder="Libelle " class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('libelle'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Localisation </label>
                        <div class="col-lg-10">

                            <div id="map" style="height: 400px;"></div>                                

                            <span class="alert-danger help-block m-b-none"><?php echo form_error('description'); ?></span>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label"></label>
                        <div class="col-lg-4">
                            <input id="latitude"  name="latitude" value="<?php echo set_value('latitude', $latitude); ?>" type="hidden" placeholder="Latitude " class="form-control">
                            <input id="lati"  disabled value="<?php echo set_value('latitude', $latitude); ?>" type="text" placeholder="Latitude " class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('latitude'); ?></span>
                        </div>
                        <div class="col-lg-4">
                            <input id="longitude" name="longitude" value="<?php echo set_value('longitude', $longitude); ?>" type="hidden" placeholder="Longitude " class="form-control">
                            <input id="longi"  disabled value="<?php echo set_value('logitude', $longitude); ?>" type="text" placeholder="Longitude " class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('longitude'); ?></span>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10"><textarea class="form-control" name="description"> <?php echo set_value('description', $description); ?> </textarea>
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('description'); ?></span></div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-sm btn-info" type="submit">Enregistrer</button>
                            <a href="<?php echo base_url(); ?>administration/pointlivraisons" class="btn btn-danger btn-sm">Annuler</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var log;
        var lat;
        var defaut = <?php echo $defaut; ?>;
    function initMap() {
        
        if(defaut == 1){
            log = 12; 
            lat = 6;
        }else{
            log = <?php echo $longitude ?>; 
            lat = <?php echo $latitude ?>;
        }
        var myLatLng = new google.maps.LatLng(lat, log);
        var mapOptions = {
            zoom: 8,
            center: myLatLng
        };

        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatLng,
            title: "La position du point",
            draggable: true,
            animation: google.maps.Animation.DROP,
        });
        
        marker.addListener('click', function(event){
            document.getElementById("latitude").value = this.getPosition().lat();
            document.getElementById("longitude").value = this.getPosition().lng();
            document.getElementById("lati").value = this.getPosition().lat();
            document.getElementById("longi").value = this.getPosition().lng();
        });
        marker.setMap(map);
    }
    
    /*function alerte(lat){
        alert('Hého'+lat);
    }*/

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKygcb6D11WVDM_C5v-0aowb8bdC79BEg&callback=initMap">
</script>