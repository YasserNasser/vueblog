<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/added_style.css')}}" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
@include('front.includs.header')


<!-- Page Content -->
@yield('content')
<!-- /.container -->
@include('front.includs.footer')
<!-- Footer -->


<!-- Bootstrap core JavaScript -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('../js/app.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.switch-tologin-modal').on('click',function(){
            $('#register-modal').modal('hide');
            $('#login-modal').modal('show');
        })
        $('.switch-toregister-modal').on('click',function(){
            $('#login-modal').modal('hide');
            $('#register-modal').modal('show');
        })
    })
</script>
</body>


</html>
