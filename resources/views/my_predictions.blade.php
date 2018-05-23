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

        <form method="post" action="/update_predictions" enctype="multipart/form-data"> {{ csrf_field() }}
            
            @foreach($predictions as $prediction)
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-2">
                        <font color="green"> <center> {{ $prediction->game->home_team }} </center> </font>
                    </div>
                    <div class="col-lg-1">
                        <div class="input-group">
                            <select class="form-control" name="home_score{{$prediction->id}}">
                                <option selected>{{ $prediction->home_score }}</option>
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="input-group">
                            <select class="form-control" name="away_score{{$prediction->id}}">
                                <option selected>{{ $prediction->away_score }}</option>
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <font color="red"> <center> {{ $prediction->game->away_team }} </center> </font>
                    </div> 
                    <div class="col-lg-3"></div>
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="col-lg-12">
                    <br><button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Update Predictions</button>
                </div>
            </div>
            <br>
        </form>

        <script>
            $('#file').filestyle({
                iconName : 'glyphicon glyphicon-file',
                buttonText : 'Select File',
                buttonName : 'btn-warning'
            });                     
        </script>

@stop

