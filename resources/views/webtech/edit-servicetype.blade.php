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
                    
                   
                  
                          
                            
                                       
                                    
                                            
                                        <div class="col-xl-9 mx-auto">
                           
                           <div class="card border-top border-0 border-4 border-info">
                               <div class="card-body">
                                   <div class="border p-4 rounded">
                                       <div class="card-title d-flex align-items-center">
                                           <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                           </div>
                                           <h5 class="mb-0 text-info">Add Service Type</h5>
                                       </div>
                                       <form class="row g-3" method="post" action="{{url('updateservicetype')}}">
               {{csrf_field()}}
               <input type="hidden" name="stype_id" value="{{$data->stype_id}}">
                                       <hr/>

                
                                       <div class="row mb-3">
                                           <label for="inputEnterYourName" class="col-sm-3 col-form-label">Service Name</label>
                                           <div class="col-sm-9">
                                               <input type="text" class="form-control" name="stype_name" placeholder="Enter Your Name"  value="{{$data->stype_name}}">
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
               
		@endsection



