<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Les Points de Livraisons <a href="<?php echo base_url(); ?>administration/pointlivraisons" class="btn btn-warning btn-sm"> Retour </a>
        </h2>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div id="map"  style="height: 600px;"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var value = '{ "point" : <?php echo json_encode($points); ?> }';
    var obj = JSON.parse(value);

    function initMap() {
        var myLatLng = new google.maps.LatLng(3.856888, 11.501751);
        var mapOptions = {
            zoom: 15,
            center: myLatLng
        };
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        var image = '<?php echo base_url(); ?>style/img/icones/repere.png';
        var marker;

        for (i = 0; i < obj.point.length; i++) {

            var nom = "" + obj.point[i].libelle;
            var lat = obj.point[i].latitude;
            var long = obj.point[i].longitude;

            var latLongSet = new google.maps.LatLng(lat, long);

            var marker = new google.maps.Marker({
                map: map,
                position: latLongSet,
                title: nom,
                animation: google.maps.Animation.DROP,
                icon: image
            });

            var content = "Point de livraison  <b>"+ nom + " </b> ";

            var infowindow = new google.maps.InfoWindow();

            google.maps.event.addListener(marker, 'click', (function (marker, content, infowindow) {
                return function(){
                    infowindow.setContent(content);
                    infowindow.open(map,marker);
                };
            })(marker,content,infowindow));

        }


    }

    /*function alerte(lat){
     alert('Hého'+lat);
     }*/

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKygcb6D11WVDM_C5v-0aowb8bdC79BEg&callback=initMap">
</script>