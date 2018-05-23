@extends('layout')

@section('title')
    <title> My Predictions </title>
@stop

@section('content')

        <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
          @endif
        @endforeach
        </div> <!-- end .flash-message -->

        @foreach($predictions as $prediction)
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-lg-3"></div>
                <div class="col-lg-2">
                    <font color="green"> <center> {{ $prediction->game->home_team }} </center> </font>
                </div>
                <div class="col-lg-1">
                    {{ $prediction->home_score }}
                </div>
                <div class="col-lg-1">
                    {{ $prediction->away_score }}
                </div>
                <div class="col-lg-2">
                    <font color="red"> <center> {{ $prediction->game->away_team }} </center> </font>
                </div> 
                <div class="col-lg-3"></div>
            </div>
        </div>
        @endforeach
        <br>

        <script>
            $('#file').filestyle({
                iconName : 'glyphicon glyphicon-file',
                buttonText : 'Select File',
                buttonName : 'btn-warning'
            });                     
        </script>

@stop

