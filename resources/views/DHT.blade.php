@extends('adminlte::page')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

<x-adminlte-card title="DHT" theme="dark" icon="fas fa-lg fa-thermometer-three-quarters">
    <div class="container">
        <div class="row justify-content-center">
            {!! $chart->container() !!}

            {!! $chart->script() !!}
        </div>
    </div>
</x-adminlte-card>

@endsection
