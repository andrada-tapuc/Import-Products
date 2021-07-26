<!DOCTYPE html>
<html lang="en">
    <head>
        @section('metadata')
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <meta name="author" content="" />
            <meta name="csrf-token" content="{{ csrf_token() }}" />
        @show

        @section('title')
            <title>{{ config('app.name', 'Import Products') }}</title>
        @show

        @section('fonts')
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Rubik:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
        @show

        @section('styles')
            <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link href="{{ asset('css/app.css')}}" rel="stylesheet" type="text/css" />
        @show
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" class="dashboard-sidebar">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <h1><a href="#" class="logo">Dashboard</a></h1>
        <ul class="list-unstyled components mb-5">
            <li class="@if(Route::current()->getName() == 'welcome') active @endif">
                <a href="#"><span class="fa fa-home mr-3"></span> Account Data</a>
            </li>
            <li class="@if(Route::current()->getName() == 'products') active @endif">
                <a href="{{route('products')}}"><span class="fa fa-sticky-note mr-3"></span> Products</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-sticky-note mr-3"></span> Settings</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-sticky-note mr-3"></span> Reports</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-paper-plane mr-3"></span> Payment</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-user mr-3"></span> Users</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-paper-plane mr-3"></span> Install </a>
            </li>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5 dashboard-content-wrapp">
        @yield('content')
    </div>
</div>
    @section('scripts')
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
    @show
</body>
</html>
