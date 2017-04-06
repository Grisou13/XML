@extends("layouts.app")

@section("content")

<div id="map" style="height: 500px"></div>


@stop
@push("scripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-gpx/1.3.1/gpx.min.js"></script>
<script type="text/javascript">
  var map = L.map('map').setView([38.92940492128304, -94.66508077838485], 13);
  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
  attribution: 'Map data &copy; <a href="http://www.osm.org">OpenStreetMap</a>'
  }).addTo(map);
  var gpx = "{{ url('/trackings/'.$tracking->id.'/raw') }}"; // URL to your GPX file or the GPX itself
  new L.GPX(gpx, {async: true,
    marker_options: {
      startIconUrl: "{{ url('/images/pin-icon-start.png') }}",
      endIconUrl: "{{ url('/images/pin-icon-end.png') }}",
      shadowUrl: "{{ url('/images/pin-shadow.png') }}",
      wptIconUrls: {
      '': "{{ url('/images/pin-icon-wpt.png') }}",
      'Geocache Found': 'img/gpx/geocache.png',
      'Park': 'img/gpx/tree.png'
      },
    }}).on('loaded', function(e) {
      console.log(e);
    map.fitBounds(e.target.getBounds());
  }).addTo(map);
</script>
@endpush
