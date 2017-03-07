<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Money Streak" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Money Streaks</title>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    {{--styles--}}
    {{--<link href="{{url('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}" rel="stylesheet" type="text/css" media="all" />--}}
    <link href="{{url('index_style/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{url('index_style/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    {{--style--}}

    {{--scripts--}}
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!---->
    <script src="{{url('index_style/js/jquery.min.js')}}"></script>
    <script src="{{url('index_style/js/bootstrap.min.js')}}"></script>
    {{--<script type="text/javascript" src="js/numscroller-1.0.js"></script>--}}
    <!---->
    <link href='http://fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
    <!--startsmothscrolling-->
    <script type="text/javascript" src="{{url('index_style/js/move-top.js')}}"></script>
    <script type="text/javascript" src="{{url('index_style/js/easing.js')}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>
    <!--script-->
    <script src="{{url('index_style/js/responsiveslides.min.js')}}"></script>
    {{--scripts--}}
</head>
<body >

@yield('content')

</body>
</html>
