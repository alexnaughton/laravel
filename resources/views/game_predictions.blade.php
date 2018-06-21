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
                        <th>User</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($predictions as $prediction)
                    <tr class="info">
                        <td>{{ $prediction->user->name }}</td>
                        <td>{{ $prediction->home_score." - ".$prediction->away_score}}</td>
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
            "pageLength": 20
        });
    });
    </script>

@stop

    
    










    









