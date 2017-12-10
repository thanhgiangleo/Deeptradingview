@extends('admin.partials.layout')
@section('content')
    <div id="map"></div>
@endsection

@section("js")
    <script>
        $().ready(function(){
            demo.initGoogleMaps();
        });
    </script>
@endsection
