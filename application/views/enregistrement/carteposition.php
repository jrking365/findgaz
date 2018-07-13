<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Où vous trouvez-vous actuellement 
        </div>
        <div class="panel-body">
            <div class="p-xs">
                <div class="pull-left m-r-md">
                    <i class="fa fa-map-marker text-navy mid-icon"></i>
                </div>
                <br>
                <h2>Votre position dans notre pays ? </h2>

                <div class="col-lg-12">

                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    &nbsp; Sélectionner votre quartier dans la liste suivante, quelques secondes après la sélection, 
                                    la carte sera actualisée ce dois nous aider pour notre référencement.
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <select id="quartier" name="quartier" class="form-control">
                                        <option></option>
                                        <?php
                                        for ($i = 0; $i < sizeof($quartiers); $i++) {
                                            echo '<option value="' . $quartiers[$i]->nom . '">' . $quartiers[$i]->nom . '</option>';
                                        }
                                        ?>
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div id="map" style="height: 400px;"></div>                                

                </div>

                <div class="col-lg-12">
                    <div class="form-group"><label class="col-lg-2 control-label"></label>
                        <div class="col-lg-4">
                            <input id="latitude"  name="latitude"  type="hidden" placeholder="Latitude " class="form-control">
                            <input id="lati"  disabled  type="text" placeholder="Latitude " class="form-control">
                        </div>
                        <div class="col-lg-4">
                            <input id="longitude" name="longitude" type="hidden" placeholder="Longitude " class="form-control">
                            <input id="longi"  disabled type="text" placeholder="Longitude " class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <p>
                            <a href="<?php echo base_url(); ?>enregistrement" id="annuler" class="btn btn-danger"> annuler </a>
                            <button id="retour" class="btn btn-default"><i class="fa fa-arrow-left"></i> &nbsp; retour</button>

                        <div class="ibox-tools">
                            <button id="suivant" class="btn btn-success">suivant &nbsp;<i class="fa fa-arrow-right"></i> </button>
                        </div>
                        <p>
                    </div>
                </div>

            </div>

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
            geocodeAddress(geocoder, map);
        });

    }

    function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('quartier').value;
        geocoder.geocode({'address': address}, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location,
                    draggable: true,
                    animation: google.maps.Animation.DROP
                });
                marker.addListener('click', function (event) {
                    document.getElementById("latitude").value = this.getPosition().lat();
                    document.getElementById("longitude").value = this.getPosition().lng();
                    document.getElementById("lati").value = this.getPosition().lat();
                    document.getElementById("longi").value = this.getPosition().lng();
                });
                document.getElementById("latitude").value = marker.getPosition().lat();
                document.getElementById("longitude").value = marker.getPosition().lng();
                document.getElementById("lati").value = marker.getPosition().lat();
                document.getElementById("longi").value = marker.getPosition().lng();
                var zone = new google.maps.Circle({
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.5,
                    strokeWeight: 1.5,
                    fillColor: '#FF0000',
                    fillOpacity: 0.35,
                    map: resultsMap,
                    center: results[0].geometry.location,
                    radius: 105
                });
                resultsMap.setZoom(16);
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
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

<script>
    $(document).ready(function () {
        $('.chosen-select').chosen({width: "100%"});
    });
    $('#suivant').click(function () {
        var lat = document.getElementById("latitude").value;
        var longi = document.getElementById("longitude").value;
        alert(" localition " + lat + " : " + longi);
        $.post('enregistrement/ajoutPosition', {latitude: lat, longitude: longi}, function (data) {
            if (data === '1') {
                $(function () {
                    swal({
                        title: " Okay ",
                        text: " Votre inscription est éffectuée avec succes  ",
                        type: 'success'
                    });
                });
            } else {
                $(function () {
                    swal({
                        title: " Danger ",
                        text: " Erreur d'inscription  ",
                        type: 'error'
                    });
                });
            }

        });
    });
</script>
