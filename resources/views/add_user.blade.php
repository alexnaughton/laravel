@extends('layout')

@section('title')
    <title> Add User </title>
@stop

@section('content')

        <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
          @endif
        @endforeach
        </div> <!-- end .flash-message -->

        <form method="post" action="/save_user" enctype="multipart/form-data"> {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Name" name="name" value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Password" name="password" value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <br><button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Save User</button>
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

