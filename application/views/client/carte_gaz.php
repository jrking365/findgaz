
<br><br>

<div class="contents">
    <div class="row border-left-right landing-pages " > 

        <div class="text-center p-lg h-20 animated bounceIn">
            <h3> Localisation des différentes zones où il y'a une boteille de gaz disponible </h3>                                
        </div>

    </div>

    <div class="row border-left-right">

        <div class="col-lg-5 animated bounceIn"> 
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Vos caractéristiques </h5>
                </div>

                <div class="ibox-content">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Quartier</label>
                        <div class="col-sm-9">
                            <select class="form-control m-b" name="quartier" id="quartier">
                                <option value="pays"> le pays </option>
                                <?php foreach ($quartiers as $quartier): ?>
                                    <option value="<?= $quartier->nom; ?>" ><?= $quartier->nom; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="checkbox checkbox-danger">
                            <input id="checkboxPos" type="checkbox" >
                            <label for="checkboxPos">
                                <h5>Avoir les points de vente de gaz disponible autour de votre position.</h5>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 ">
                        <p>
                            <span class="m-r-xxs text-muted welcome-message"><b>Le format de votre bouteille</b></span>
                        </p>
                        <?php
                        for ($i = 0; $i < sizeof($formats); $i++) {
                            ?>  
                            <div class="radio radio-info radio-inline">
                                <input type="radio" id="inlineRadio<?php echo $formats[$i]->id; ?>" value="<?php echo $formats[$i]->id; ?>" name="radioInline" checked="">
                                <label for="inlineRadio<?php echo $formats[$i]->id; ?>"> <?php echo '<b>' . $formats[$i]->masse . ' ' . $formats[$i]->unite . '</b>'; ?> </label>
                            </div>
                            <?php
                        }
                        ?>

                    </div>

                    <div class="form-group  col-sm-12">
                        <p> <span class="m-r-xxs text-muted welcome-message"><b>Sociéte de votre(vos) bouteille(s)</b></span>
                        </p><br/>
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="checkbox checkbox-info ">
                                    <input id="checkbox0" type="checkbox" checked="">
                                    <label for="checkbox0">
                                        <h4>Toute</h4>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-8 well">
                                <?php
                                for ($i = 0; $i < sizeof($societes); $i++) {
                                    ?>
                                    <div class="checkbox checkbox-info col-md-4 ">
                                        <input id="checkbox<?php echo $societes[$i]->id; ?>" type="checkbox">
                                        <label for="checkbox<?php echo $societes[$i]->id; ?>">
                                            <h4><?php echo $societes[$i]->nom; ?></h4>
                                        </label>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <i class="fa fa-info-circle"></i> Info Panel
                        </div>
                        <div class="panel-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                        </div>

                    </div>
                </div>
                <!-- zone pour le nombre de commande  -->
                <div class="col-lg-4">
                    <div class="text-center">
                        <i class="fa fa-shopping-cart fa-5x count-info"></i>
                        <span class="label label-primary"><b>0</b></span>
                    </div>
                    <button class="btn btn-success btn-xs btn-block">consulter</button>
                    <a href="<?php echo base_url(); ?>client/commande" class="btn btn-primary btn-xs btn-block"> <b>valider ></b> </a>

                </div> 

            </div>
        </div>

        <div class="col-lg-7"> 
            <div id="map" class="col-sm-12" style="height: 620px;"></div>
        </div>

    </div>

</div>

<script type="text/javascript">

    function initMap() {
        var myLatLng = new google.maps.LatLng(6, 12);
        var mapOptions = {
            zoom: 6,
            center: myLatLng
        };
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);


        var geocoder = new google.maps.Geocoder();

        document.getElementById('quartier').addEventListener('change', function () {
            if (document.getElementById('quartier').value == "pays") {
                map.setCenter(myLatLng);
                map.setZoom(6);
            } else {
                zoomQuartiier(geocoder, map);
            }

        });
    }

    function zoomQuartiier(geocoder, resultsMap) {
        var address = document.getElementById('quartier').value;
        geocoder.geocode({'address': address}, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                resultsMap.setCenter(results[0].geometry.location);
                /*var marker = new google.maps.Marker({
                 map: resultsMap,
                 position: results[0].geometry.location,
                 draggable: true,
                 animation: google.maps.Animation.DROP
                 });*/
                resultsMap.setZoom(16);
            } else {
                alert(' le quartier est-il existant dans notre système ? ' + status);
            }
        });
    }

    /*function alerte(lat){
     alert('Hého'+lat);
     }*/

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKygcb6D11WVDM_C5v-0aowb8bdC79BEg&callback=initMap">
</script>


