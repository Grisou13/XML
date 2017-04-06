@extends("layouts.app")

@section("content")

<p>Voici vos info de tracking: </p>
@forelse($trackings as $tr)
<ul>

    <li><a href="{{ url("trackings/".$tr->id) }}">{{ $tr->file_path }}</a></li>

</ul>
@empty
  <a href="{{ url("/trackings/create") }}">Vous n'avez pas de tracking!</a>
@endforelse

@stop
