<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz</title>
    <!-- Bootstrap -->
    <link href="{{ asset('node_modules/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('node_modules/gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('node_modules/gentelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('node_modules/gentelella/build/css/custom.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">

	@yield('style')
	
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
			
			<div class="col-md-3 left_col">
                @include('backend.partials.sidebar-menu')
            </div>
			
			<!-- top navigation -->
            @include('backend.partials.top-menu')
            <!-- /top navigation -->
			
			<!-- page content -->
            <div class="right_col" role="main">
                <div class="">

                    @yield('content')
                </div>
            </div>
            <!-- /page content -->
            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    ©
                    <?php echo(date('Y')) ?>. Quiz
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('node_modules/gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('node_modules/gentelella/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('node_modules/gentelella/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('node_modules/gentelella/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('node_modules/gentelella/build/js/custom.min.js') }}"></script>
	<script src="{{ asset('js/script.js') }}"></script>

	@yield('script')


</body>

</html>