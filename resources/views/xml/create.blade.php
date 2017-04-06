@extends("layouts.app")

@section("content")

<form class="" action="{{ url('/trackings') }}" method="post" enctype="multipart/form-data">
  {!! csrf_field() !!}
  <input type="file" name="tracking_data" value="" accept=".xml,.gpx,.gps">
  <input type="submit" name="" value="Ajouter!">
</form>

@stop
