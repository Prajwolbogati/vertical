@extends("layouts.app")
		@section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">
                   

                    <!--end row-->
                    <div class="row">
                        <div class="col-xl-9 mx-auto">
                            <div class="card border-top border-0 border-4 border-info">
                                <div class="card-body">
                                    <div class="border p-4 rounded">
                                        <div class="card-title d-flex align-items-center">
                                            <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                            </div>
                                            <h5 class="mb-0 text-info">Add User</h5>
                                        </div>
                                        <form class="row g-3" method="post" action="{{url('register')}}">
               {{csrf_field()}}

               @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
            <span class="text-danger">{{ $error }} </span>
           
            @endforeach
        </ul>
    @endif
                                
                                        <hr/>
                                       
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-3 col-form-label">Enter Your Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name" placeholder="Enter Your Name">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="email" class="col-sm-3 col-form-label">Email </label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" name="email" placeholder="Enter Email">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="password" class="col-sm-3 col-form-label">Email Address</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" name="password" placeholder="Choose Password">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="password_confirmation" class="col-sm-3 col-form-label">Choose Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="role" class="col-sm-3 col-form-label">Choose Password</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="role" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    
                                        <div class="row mb-3">
                                            <label for="permissions" class="col-sm-3 col-form-label">Choose Password</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="permissions" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    
                                      
                                       
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-info px-5">Register</button>
                                            </div>
                                        </div>
                                    </div>
</form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
		@endsection



