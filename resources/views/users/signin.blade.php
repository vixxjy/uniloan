<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/1.jpg">
    <title>TechFS Cooperate Loans</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../minimal/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../minimal/css/colors/default-dark.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="../minimal/css/edit.css" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-color: rgb(0, 64, 128);"> 
               <div>
                    <img class="center" style="height: 80px; width: 80px;" src="{{ asset('assets/images/1.jpg')}}"></img>
                </div>
                <br>
                <div class="school-name" style="color:#FFF; text-shadow:#666 2px; font-weight:bold; text-shadow: 2px 2px #666666;">Unijos Cooperative</div>
                <br>
            <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('user.signin') }}">
                    {{ csrf_field() }}
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach()
                        </div>
                    @endif
                    
                     @if(Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                    
                    <!--<h3 class="box-title m-b-20">Sign In</h3>-->
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" name="email" placeholder="Username"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" name="password" placeholder="Password"> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                            <br>
                            <p><a href="#">Become a Member</a></p>
                        </div>
                    </div>
                   
            </div>
          </div>
        </div>
        
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../minimal/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../minimal/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../minimal/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../minimal/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>