{{--  --}}


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
                    @if (session('status') == 'verification-link-sent')
               <div class="mb-4 font-medium text-sm text-green-600 text-success">
                   Verification link has been sent.
               </div>
           @endif
                    <div class="text-center">
                        <img src="assets/images/icons/forgot-2.png" width="120" alt="" />
                    </div>
                    <h4 class="mt-5 font-weight-bold">Email Verification</h4>
                    <p class="text-muted">Verify your registered email ID to proceed</p>
                    <form method="POST" action= "{{url('/email/verification-notification')}}">
               {{csrf_field()}}

               
                    
                    <div class="d-grid gap-2">
                        @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
            <span class="text-danger">{{ $error }} </span>
           
            @endforeach
        </ul>
    @endif
                        <button type="submit" class="btn btn-primary btn-lg">Verify</button>

                    </form>
                        <form method="POST" action="{{url('logout')}}">
                            @csrf
        
                            <button  class="btn btn-light btn-lg"><i class='bx bx-arrow-back me-1'></i>Back to Login</button>
                                    
        </form>
                        
                        
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end wrapper -->
</body>


</html>
