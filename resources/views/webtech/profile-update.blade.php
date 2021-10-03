		@extends("layouts.app")
		@section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">User Profile</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                                </ol>
                            </nav>
                        </div>
                       
                    </div>
                    <!--end breadcrumb-->
                    <div class="container">
                        <div class="main-body">
                        <form class="row g-3" method="post" action="{{url('update')}}" enctype="multipart/form-data">
				{{csrf_field()}}
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-column  text-center">
                                                <!-- <img src="assets/images/avatars/avatar-2.png" alt="Admin"  class="rounded-circle p-1 bg-primary" width="110"> -->

                                             

                                                @if(!empty(Auth::user()->image))
              <p><img src= "{{asset('user')}}/{{Auth::user()->image}}"  id="output" alt="Admin"  class="rounded-circle p-1 bg-primary" height="200px" width="200px"></p>
              <input type="file"  accept="image/*" name="image" id="file" class="form-control"  onchange="loadFile(event)" style="display: none;">

              <p class="label"><label for="file" style="cursor: pointer;" class=" col-form-label" >Choose Image</label></p>
              <hr>


@else
              <p><img src= "assets/images/avatars/avatar-2.png" id="output" alt="Admin"  class="rounded-circle p-1 bg-primary" height="200px" width="200px"></p>
              <input type="file"  accept="image/*" name="image" id="file" class="form-control"  onchange="loadFile(event)" style="display: none;">

              <p class="label"><label for="file" style="cursor: pointer;" class=" col-form-label" >Choose Image</label></p>
              <hr>
                
              @endif
              <div>
                                                    <h4>{{Auth::user()->name }}</h4>
                                                    <p class="text-secondary mb-1">{{Auth::user()->email }}</p>
                                                    <p class="text-secondary mb-1">{{Auth::user()->phone }}</p>
                                                
                                                </div>
                                            </div>
                                           
                                    
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="d-flex align-items-center mb-3">Edit Profile</h5>
                                                   <hr>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Full Name</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" name="name"   value="{{Auth::user()->name }}" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Email</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" name="email"  value="{{Auth::user()->email }}" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Phone</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" name="phone"  value="{{Auth::user()->phone }}" />
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Address</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" name="address"  value="{{Auth::user()->address }}" />
                                                </div>
                                            </div>
                                            <div class="row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary px-4">Update</button>
                                            </div>
                                        </div>

                                        </div>
                                    </div>
                                    </form>
                                    <div class="row">
                                    <form class="form-horizontal" method="POST" action="{{url('change')}}">
                        @csrf
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="d-flex align-items-center mb-3">Change Password</h5>
                                                   <hr>
                                                    <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">New Password</h6>
                                                </div>
                                                <div class="col-sm-9">
                                                <input type="password" class="form-control" name="newpassword" placeholder="Choose Password">
                                            </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Re-type Password</h6>
                                                </div>
                                                <div class="col-sm-9">
                                                <input type="password" class="form-control" name="newpassword_confirmation" placeholder="Confirm Password">
                                            </div>
                                            </div>

                                            <div class="row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary px-4">Change Password</button>
                                            </div>
                                        </div>
                                                </div>
                                            </div>
                                        </div>
    </form>
                                    </div>


                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>

		@endsection






