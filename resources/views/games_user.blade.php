@extends('layout')

@section('title')
    <title> Games </title>
@stop

@section('content')

    <!-- League Table -->
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Home Team</th>
                        <th>Away Team</th>
                        <th>Predictions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($games as $game)
                    <tr class="info">
                        <td>{{ $game->home_team }}</td>
                        <td>{{ $game->away_team}}</td>
                        <td><a href="game_predictions/{{ $game->id }}" class="btn btn-success confirmation"> Predictions </a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
            "pageLength": 50
        });
    });
    </script>

@stop

    
    









