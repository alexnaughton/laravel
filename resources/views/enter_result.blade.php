@extends('layout')

@section('title')
    <title> Enter Result </title>
@stop

@section('content')

        <form method="post" action="/submit_result/{{$game->id}}" enctype="multipart/form-data"> {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <input class="form-control" type="text" name="home_team" value="{{$game->home_team}}">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Home Score" name="home_score" value="">
                    </div>
                </div>
                <div class="col-lg-2"> - </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Away Score" name="away_score" value="">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <input class="form-control" type="text" name="away_team" value="{{$game->away_team}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <br><button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Submit Result</button>
                </div>
            </div>
        </form>

        <script>
            $('#file').filestyle({
                iconName : 'glyphicon glyphicon-file',
                buttonText : 'Select File',
                buttonName : 'btn-warning'
            });                     
        </script>

@stop

