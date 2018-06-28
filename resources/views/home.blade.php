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
                        <th>Position</th>
                        <th>Name</th>
                        <th>Points</th>
                        <th>CS</th>
                        <th>CR</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    @if($user->position == 1 && $games == 0)
                    <tr class="warning">
                    <td>C</td>
                    @elseif($user->position == 1 && $games > 0)
                    <tr class="success">
                    <td>{{ $user->position }}</td>
                    @else
                    <tr class="info">
                    <td>{{ $user->position }}</td>
                    @endif
                        <td><a href="/user_predictions/{{ $user->id }}"> {{ $user->name }}</a></td>
                        <td>{{ $user->points }}</td>
                        <td>{{ $user->cs }}</td>
                        <td>{{ $user->cr }}</td>
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

    
    







