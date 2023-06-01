<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/bootstrap/css/fontawesome.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('vendor/bootstrap/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            
            
            <div class="col-xl-7 col-lg-6 col-md-8">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="{{url('login')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail"   value="{{ old('email') }}" 
                                                aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="password" placeholder="Password">
                                            <input type="checkbox" class="form-checkbox"> Show password

                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/register">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body>
<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/bootstrap/javascript/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/javascript/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/bootstrap/javascript/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('vendor/bootstrap/javascript/sb-admin-2.min.js')}}"></script>
<script>
    $(document).ready(function(){		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('#password').attr('type','text');
			}else{
				$('#password').attr('type','password');
			}
		});
	});
</script>

</html>