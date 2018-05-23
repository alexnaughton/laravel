@extends('layout')

@section('title')
    <title> Home </title>
@stop

@section('content')

    <!-- League Table -->
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Home Team</th>
                        <th>Home Score</th>
                        <th>Away Score</th>
                        <th>Away Team</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($games as $game)
                    <tr class="info">
                        <td>{{ $game->date }}</td>
                        <td>{{ $game->home_team }}</td>
                        <td>{{ $game->home_score }}</td>
                        <td>{{ $game->away_score }}</td>
                        <td>{{ $game->away_team}}</td>
                        @if($game->result == "Pending")
                        <td><a href="enter_result/{{ $game->id }}" class="btn btn-danger confirmation"> Enter Result </a> </td>
                        @else
                        <td>Game Completed</td>
                        @endif
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
        });
    });
    </script>

@stop

    
    









