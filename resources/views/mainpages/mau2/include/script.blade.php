<script defer src="{{asset('../use.fontawesome.com/releases/v5.0.8/js/all.js')}}"></script>
<script type="text/javascript" src="{{asset('majestic/asset/js/jquery.min.js')}}"></script>
<script src="{{asset('../code.jquery.com/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('../cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js')}}"></script>
<!-- Slick slide -->
<script type="text/javascript" src="{{asset('majestic/asset/js/slick.min.js')}}"></script>
<!-- Bootstrap -->
<script type="text/javascript" src="{{asset('majestic/asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('../cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js')}}"></script>

<!-- Date Range Picker -->
<script type="text/javascript" src="{{asset('majestic/asset/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('majestic/asset/js/jquery.daterangepicker.min.js')}}"></script>

<!-- Fancy Box -->
<script type="text/javascript" src="{{asset('majestic/asset/js/jquery.fancybox.pack8cbb.js?v=2.1.5')}}"></script>
<script type="text/javascript" src="{{asset('majestic/asset/js/jquery.fancybox-thumbsf2ad.js?v=1.0.7')}}"></script>
<!-- BSS JS -->
<script type="text/javascript" src="{{asset('majestic/asset/js/tabbed-photos.js')}}"></script>

<script src="{{asset('majestic/asset/js/jquery.validate.min.js')}}"></script>

<script src="{{asset('majestic/asset/js/scripts.js')}}"></script>
<script src="{{asset('majestic/asset/js/customize.js')}}"></script>
<script>
    if($('#map')){
        var map;
        var lat = 12.2272857;
        var long = 109.1997271;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 19,
                center: new google.maps.LatLng(lat, long),
                mapTypeId: 'roadmap',
                gestureHandling: 'cooperative'
            });

            var features = [
                {
                    position: new google.maps.LatLng(lat, long),
                    type: 'location'
                }
            ];

            // Create markers.
            features.forEach(function (feature) {
                var marker = new google.maps.Marker({
                    position: feature.position,
                    map: map
                });
            });
        }
    }

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkB5GqIi0zwqONIzbePzXWYlBmc9refyk&amp;callback=initMap&amp;language=en">
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5ba35675c666d426648aefd1/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
