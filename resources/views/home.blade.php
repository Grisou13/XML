@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>You are logged in!</p>
                    <p>If you want you can <a href="{{ url("/trackings/create") }}">add</a> or <a href="{{ url("/trackings") }}">visit</a> all your trackings</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
