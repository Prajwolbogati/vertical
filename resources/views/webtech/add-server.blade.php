@extends("layouts.app")
		@section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Service</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add New</li>
                                </ol>
                            </nav>
                        </div>
                
                    </div>
                    <!--end breadcrumb-->
       
                    <div class="row">
                        <div class="col-xl-9 mx-auto">
                           
                            <div class="card border-top border-0 border-4 border-info">
                                <div class="card-body">
                                    <div class="border p-4 rounded">
                                        <div class="card-title d-flex align-items-center">
                                            <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                            </div>
                                            <h5 class="mb-0 text-info">Add Service</h5>
                                        </div>
                                        <hr/>
                                        <div class="row mb-3">
                                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Server Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputEnterYourName" placeholder="Enter Your Name">
                                            </div>
                                        </div>
                                        
                                
                                       
                                        <div class="row mb-3">
                                            <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Domain Provider</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="inputChoosePassword2" placeholder="Choose Password">
                                            </div>
                                        </div>

                                     
                                      
                                        <div class="row mb-3">
                                            <label for="inputAddress4" class="col-sm-3 col-form-label">Email Service Provider</label>
                                            <div class="col-sm-9">
                                            <input type="email" class="form-control" id="inputChoosePassword2" placeholder="Choose Password">
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



