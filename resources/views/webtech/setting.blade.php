@extends("layouts.app")
		@section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    
                    <!--end breadcrumb-->
       
                    <div class="row">
                        <div class="col-xl-9 mx-auto">
                           
                            <div class="card border-top border-0 border-4 border-info">
                                <div class="card-body">
                                    <div class="border p-4 rounded">
                                        <div class="card-title d-flex align-items-center">
                                            <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                            </div>
                                            <h5 class="mb-0 text-info">Add Company Info</h5>
                                        </div>
                                        <hr/>
                                        <div class="row mb-3">
                                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Company Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputEnterYourName" placeholder="Enter Your Name">
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Company Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputPhoneNo2" placeholder="Phone No">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Company Phone No</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputPhoneNo2" placeholder="Phone No">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Company Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="inputEmailAddress2" placeholder="Email Address">
                                            </div>
</div>
                                       
                               

                                  
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-info px-5">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
		@endsection



