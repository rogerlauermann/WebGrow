@extends('adminlte::page')

@section('content')
    <style>
        .small-label {
            font-size: 0.800rem; /* You can adjust the font size as needed */
        }
        .small-input {
            font-size: 0.800rem; /* You can adjust the font size as needed */
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

    <x-adminlte-card title="DHT" theme="dark" icon="fas fa-lg fa-thermometer-three-quarters">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    {!! $chart->container() !!}
                    {!! $chart->script() !!}
                </div>
                <div class="col-md-2">
                    <form method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="date_ini" class="small-label">Start Date</label>
                            <input type="datetime-local" class="form-control small-input" name="date_ini" id="date_ini" value="{{ $oldDateIni }}">
                        </div>
                        <div class="form-group">
                            <label for="date_end" class="small-label">End Date</label>
                            <input type="datetime-local" class="form-control small-input" name="date_end" id="date_end" value="{{ $oldDateEnd }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </x-adminlte-card>
@endsection
