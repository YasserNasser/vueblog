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

<!--modals-->
<!--register-->
<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login-form">
                    <form action="/examples/actions/confirmation.php" method="post">
                        <h2 class="text-center">Create New Account</h2>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="firstname" required="required">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="lastname" required="required">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="email" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                        </div>
                        <div class="clearfix">
                            <a href="#" class="pull-right">Forgot Password?</a>
                        </div>
                    </form>
                    <p class="text-center">having account ?
                        <strong class="switch-tologin-modal" ><a href="#">Login</a></strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--login-->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login-form">
                    <form action="/examples/actions/confirmation.php" method="post">
                        <h2 class="text-center">Log in</h2>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Log in</button>
                        </div>
                        <div class="clearfix">
                            <a href="#" class="pull-right">Forgot Password?</a>
                        </div>
                    </form>
                    <p class="text-center"><a class="switch-toregister-modal" href="#">Create an Account</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--modals-->
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
