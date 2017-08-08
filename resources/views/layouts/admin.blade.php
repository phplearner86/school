
<!DOCTYPE html>
<html lang="en">
<head>

    @include('partials.top._head')
    @include('partials.admin._links')

    @yield('links')

</head>

<body class="admin">

    <div id='app'>
        @include('partials.admin._nav')

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">

                    @include('partials.admin._side')

                </div>

                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

                    @yield('content')

                </div>
            </div>
        </div>
    </div>
    
    @include('partials.bottom._scripts')
    @yield('scripts')

</body>
</html>
