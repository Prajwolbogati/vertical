@extends("layouts.app")
		@section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Services</div>
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
                    
                      <div class="col">
                  
                          
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-pills mb-3" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-home" role="tab" aria-selected="true">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-icon"><i class='fadeIn animated bx bx-chevron-down-circle font-18 me-1'></i>
                                                    </div>
                                                    <div class="tab-title">Add Service Type</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile" role="tab" aria-selected="false">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-icon"><i class='fadeIn animated bx bx-chevron-down-circle font-18 me-1'></i>
                                                    </div>
                                                    <div class="tab-title">Add Services</div>
                                                </div>
                                            </a>
                                        </li>
                                       
                                    </ul>


                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="primary-pills-home" role="tabpanel">
                                            
                                        <div class="col-xl-9 mx-auto">
                           
                           <div class="card border-top border-0 border-4 border-info">
                               <div class="card-body">
                                   <div class="border p-4 rounded">
                                       <div class="card-title d-flex align-items-center">
                                           <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                           </div>
                                           <h5 class="mb-0 text-info">Add Service Type</h5>
                                       </div>
                                       <form class="row g-3" method="post" action="{{url('addservice')}}">
               {{csrf_field()}}
                                       <hr/>

                
                                       <div class="row mb-3">
                                           <label for="inputEnterYourName" class="col-sm-3 col-form-label">Service Name</label>
                                           <div class="col-sm-9">
                                               <input type="text" class="form-control" name="service_name" placeholder="Enter Your Name">
                                               @error('service_name')
                                               <div class="alert-danger">{{ $message }}</div>
                                               @enderror
                                           </div>
                                       </div>
                                       
                               
                                      
                                       <div class="row mb-3">
                                           <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Domain Provider</label>
                                           <div class="col-sm-9">
                                           <select class="form-control" name="stype_id">
                       <option value="">No Subcategory</option>
                       @foreach($data as $serv)
                       <option value="{{$serv->stype_id}}">{{$serv->stype_name}}</option>
                       @endforeach
                   
</select>
@error('stype_id')
<div class="alert-danger">{{ $message }}</div>
@enderror
                                           </div>
                                       </div>

                                    
                                     
                                
                                 
                                       <div class="row">
                                           <label class="col-sm-3 col-form-label"></label>
                                           <div class="col-sm-9">
                                               <button type="submit" class="btn btn-info px-5">Submit</button>
                                           </div>
                                       </div>
                                   </div>
</form>
                               </div>
                           </div>
                       </div>
                                        </div>

                                        <div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">
                                        <div class="col-xl-9 mx-auto">
                           
                           <div class="card border-top border-0 border-4 border-info">
                               <div class="card-body">
                                   <div class="border p-4 rounded">
                                       <div class="card-title d-flex align-items-center">
                                           <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                           </div>
                                           <h5 class="mb-0 text-info">Add Services</h5>
                                       </div>
                                       <form class="row g-3" method="post" action="{{url('addservicetype')}}">
               {{csrf_field()}}
                                       <hr/>
                         
                                       <div class="row mb-3">
                                           <label for="stype_name" class="col-sm-3 col-form-label">Service Type Name</label>
                                           <div class="col-sm-9">
                                               <input type="text" class="form-control" name="stype_name" placeholder="Enter Service Type">
                                               @error('stype_name')
                                               <div class="alert-danger">{{ $message }}</div>
                                               @enderror
                                           </div>
                                       </div>
                                       
                               
                                      
                                  

                                    
                                     
                                
                                 
                                       <div class="row">
                                           <label class="col-sm-3 col-form-label"></label>
                                           <div class="col-sm-9">
                                               <button type="submit" class="btn btn-info px-5">Submit</button>
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
</div>

                        </div>
                </div>
            </div>
		@endsection



