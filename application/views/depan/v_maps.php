
<?php include_once "parsial/header.php"; ?>

<div id="googleMap" style="width:100%;height:580px;"></div>

<?php include_once "parsial/footer.php"; ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArQzHX2ODczAlJ_4iQwMqb8R4ey44ZhqY&sensor=false" type="text/javascript"></script>
<script>
    function initialize() {}
    var map;
    var mapOptions = {
        zoom: 9.56,
        center: new google.maps.LatLng(-8.6218762,116.902038,9),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        
    };
                
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
    map.setTilt(45);
    

    // multiple map markers
    var infowindow = new google.maps.InfoWindow();
    var markers_map = new Array();
    var marker = new Array();

    <?php 
        $i = 0; 
        foreach($profil_usaha as $pu): 
            if($pu->lat != '' |$pu->lat != null | $pu->long != '' | $pu->long != '' ) :
    ?>
                var position = new google.maps.LatLng(<?= $pu->lat ?>, <?= $pu->long ?>);
                var markerOptions = {
                    map: map,
                    position: position,
                    animation: google.maps.Animation.DROP,
                    icon: 'https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678111-map-marker-64.png'
                };
                marker[<?= $i ?>] = createMapMarker(markerOptions);

                google.maps.event.addListener(marker[<?= $i ?>], 'click', (function(marker, i) {
                    var html = '<div class="media" style="width:300px;">'+
                                    '<div class="media-body">'+
                                        '<div class="row mx-0">'+
                                            '<div class="col-12">'+
                                                '<a href="<?= base_url('datausaha/detail/' . $pu->id_usaha) ?>">'+
                                                    '<h5 style="color:black"><?= $pu->nama_usaha ?></h5>'+
                                                '</a>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="row mt-2 mx-0">'+
                                            '<div class="col-12 pl-2">'+
                                                '<p class="text-muted mb-2"> <b>Alamat</b> : <?= $pu->alamat ?></p>'+
                                                '<p class="text-muted"> <b>Jenis Usaha</b> : <?= $pu->jenis_usaha ?></p>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
                    return function() {
                        infowindow.setContent(html);
                        infowindow.open(map, this);
                    }
                })(marker, <?= $i ?>));
    <?php 
            endif; 
        $i++; 
        endforeach 
    ?>
    
    function createMapMarker(markerOptions) {
        var marker = new google.maps.Marker(markerOptions);
        markers_map.push(marker);
        return marker;
    }
</script>

