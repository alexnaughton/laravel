<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        @include('stylings')
        @yield('title')
    </head>

    <body>
        <!-- /#wrapper -->
        <div id="wrapper">

            <!-- Navigation -->
            @include('navigation/navigation')
            <!-- Navigation -->
                
            <!-- Page Wrapper -->
            <div id="page-wrapper"><br><br>

            @yield('content')

            </div>
            <!-- Page Wrapper -->
        </div>
        <!-- /#wrapper -->
    </body>
    
</html>
