<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>Rocker - Multipurpose Bootstrap5 Admin Template</title>
</head>

<body class="bg-forgot">
<!-- wrapper -->
<div class="wrapper">
    <div class="authentication-forgot d-flex align-items-center justify-content-center">
        <div class="card forgot-box">
            <div class="card-body">
                <div class="p-4 rounded  border">
                    <div class="text-center">
                        <img src="assets/images/icons/forgot-2.png" width="120" alt="" />
                    </div>
                    <h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
                    <p class="text-muted">Enter your registered email ID to reset the password</p>
                    <form method="POST" action= "{{url('forgot-password')}}">
               {{csrf_field()}}

               @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
            <span class="text-danger">{{ $error }} </span>
           
            @endforeach
        </ul>
    @endif
                    <div class="my-4">
                        <label class="form-label">Email id</label>
                        <input type="email" class="form-control form-control-lg" name="email" placeholder="example@user.com" />
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Send</button> <a href="{{ url('login') }}" class="btn btn-light btn-lg"><i class='bx bx-arrow-back me-1'></i>Back to Login</a>
                    </div>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end wrapper -->
</body>


</html>