@extends("layouts.app")

@section("style")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link href="{{asset('assets/plugins/datetimepicker/css/classic.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/datetimepicker/css/classic.time.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/datetimepicker/css/classic.date.css')}}" rel="stylesheet" />
	<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	@endsection
		@section("wrapper")
        <div class="page-wrapper">
                <div class="page-content">

                <form class="row g-3" method="post" action="{{url('updateaccount')}}">
				{{csrf_field()}}
                <input type="hidden" name="account_id" value="{{$singledata->account_id}}">
            
                <div class="row">
                        <div class="col-xl-6 mx-auto">
                           
                            <div class="card border-top border-0 border-4 border-primary">
                                <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary">Client Info</h5>
                                    </div>
                                    <hr/>
                                   
                              <div class="row">
                                        <div class="col-md-6">
                                            <label for="domainname"  class="form-label">Domain Name</label>
                                            <input type="text" class="form-control" name="domainname" placeholder="Domain Name" value="{{$singledata->domainname}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="hostingquota" class="form-label">Hosting Quota</label>
                                            <input type="text" class="form-control" name="hostingquota" placeholder="Hosting Quota" value="{{$singledata->hostingquota}}">
                                        </div>
</div>
<div class="row">
                                        <div class="col-md-6">
                                            <label for="fullname" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="fullname" placeholder="Full Name" value="{{$singledata->fullname}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="companyname" class="form-label">Company Name</label>
                                            <input type="text" class="form-control" name="companyname" placeholder="Company Name" value="{{$singledata->companyname}}">
                                        </div>
</div>
<div class="row">
                                        <div class="col-6">
                                            <label for="companyaddress" class="form-label">Company Address</label>
                                            <input type="text" class="form-control" name="companyaddress" placeholder="Company Address" value="{{$singledata->companyaddress}}">
                                        </div>
                                        <div class="col-6">
                                            <label for="phone_num" class="form-label">Company Number</label>
                                            <input type="text" class="form-control" name="phone_num" placeholder="Company Number" value="{{$singledata->phone_num}}">
                                        </div>
</div>
<div class="row">
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Company Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Company Email" value="{{$singledata->email}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="marketby" class="form-label">Market By</label>
                                            <input type="text" class="form-control" name="marketby" placeholder="Market By" value="{{$singledata->marketby}}">
                                        </div>
</div>
                                     

                              
<hr>
<div class="row">

<div class="col-md-12">
                           
                           
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary">General Info</h5>
                                    </div>
                                    <hr/>
                                    <div class="row g-3">
                                <textarea id="mytextareas" name="detail"  >{{$singledata->detail}}</textarea>
</div>
                           
</div>
</div>
</div>

<hr>
<div class="row">
<div class="col-md-12">
                           
  
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary">Choose Services</h5>
                                    </div>
                                    <hr/>
                                    <div class="row g-3">
                                    @foreach($services as $key=>$ser)
                                    <div class=" col-md-4 form-check form-switch">
                                  
                                        <label class="form-check-label" >{{$ser->stype_name}}</label>
                                        <input class="form-check-input" type="checkbox" data-serviceName="{{$ser->stype_name}}" onclick="checkMe(this)" />
                                      
                                    </div> 
                                    @endforeach
</div>
                       
</div>
</div>
</div>
</div>
              
</div>
</div>
              
              </div>
                                               

                



<div class="col-xl-6 serviceForm" id="serfrm" style="justify-content: flex-start">

<!-- @php
$arr = []
@endphp -->

@foreach($singledata->compservice as $key=>$single)
@if($key >= 0 && $key < 3)

@php
$arr[] = $single->service->parent->stype_id;
@endphp

<input type="hidden" name="compservice_id[{{$key}}]" value="{{$single->compservice_id}}">
                        <div class="col-xl-12" id="{{$single->service->parent->stype_name}}" >
                           
                            <div class="card border-top border-0 border-4 border-primary">
                                <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary">{{$single->service->parent->stype_name}}</h5>
                                     
                                    </div>
                                    <hr/>
                                 
                                  
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="active_date" class="form-label">Active Date</label>
                                            <input type="date" class="form-control datepicker" name="active_date[{{$key}}]" placeholder="Active Date"  value="{{$single->active_date}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exp_date" class="form-label">Expiry Date</label>
                                            <input type="date" class="form-control datepicker" name="exp_date[{{$key}}]" placeholder="Expiry Date"  value="{{$single->exp_date}}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="text" class="form-control" name="amount[{{$key}}]" placeholder="Amount"  value="{{$single->amount}}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="discount" class="form-label">Discount</label>
                                            <input type="text" class="form-control" name="discount[{{$key}}]" placeholder="Discount Amount"  value="{{$single->discount}}">
                                        </div>
                                     
                                        <div class="col-md-6">
                                       
                                            <label for="stype_id" class="form-label">Choose {{$single->service->parent->stype_name}}</label>
                                            <select class="form-select" name="service_id[{{$key}}]">
                                         
                                            <option value="{{$single->service_id}}">"{{$single->service->service_name}}"</option>
                                           
                                         
                                         @foreach($data as $key=>$ser)
                                         @if($ser->stype_id == $single->service->parent->stype_id)
                                         @foreach($ser->child as $se)
                                            <option value="{{$se->service_id}}">{{$se->service_name}}</option>
                                        @endforeach
                                        @endif
                              @endforeach
                                  
                                    
                                        </select>
                                       
                                        </div>
                                     
                             
</div>

                                  
                                  
                                </div>
</div>

</div>


</div>



@endif
@endforeach
</div>
</div>



<div class="row serviceForm" id="serfrm" style="justify-content: flex-start">

<!-- @php
$arr = []
@endphp -->

@foreach($singledata->compservice as $key=>$single)
@if($key >= 3)
@php
$arr[] = $single->service->parent->stype_id;
@endphp

<input type="hidden" name="compservice_id[{{$key}}]" value="{{$single->compservice_id}}">
                        <div class="col-md-6" id="{{$single->service->parent->stype_name}}" >
                           
                            <div class="card border-top border-0 border-4 border-primary">
                                <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary">{{$single->service->parent->stype_name}}</h5>
                                     
                                    </div>
                                    <hr/>
                                 
                                  
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="active_date" class="form-label">Active Date</label>
                                            <input type="date" class="form-control datepicker" name="active_date[{{$key}}]" placeholder="Active Date"  value="{{$single->active_date}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exp_date" class="form-label">Expiry Date</label>
                                            <input type="date" class="form-control datepicker" name="exp_date[{{$key}}]" placeholder="Expiry Date"  value="{{$single->exp_date}}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="text" class="form-control" name="amount[{{$key}}]" placeholder="Amount"  value="{{$single->amount}}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="discount" class="form-label">Discount</label>
                                            <input type="text" class="form-control" name="discount[{{$key}}]" placeholder="Discount Amount"  value="{{$single->discount}}">
                                        </div>
                                     
                                        <div class="col-md-6">
                                       
                                            <label for="stype_id" class="form-label">Choose {{$single->service->parent->stype_name}}</label>
                                            <select class="form-select" name="service_id[{{$key}}]">
                                         
                                            <option value="{{$single->service_id}}">"{{$single->service->service_name}}"</option>
                                           
                                         
                                         @foreach($data as $key=>$ser)
                                         @if($ser->stype_id == $single->service->parent->stype_id)
                                         @foreach($ser->child as $se)
                                            <option value="{{$se->service_id}}">{{$se->service_name}}</option>
                                        @endforeach
                                        @endif
                              @endforeach
                                  
                                    
                                        </select>
                                       
                                        </div>
                                     
                             
</div>

                                  
                                  
                                </div>
</div>

</div>


</div>



@endif
@endforeach
</div>
</div>






<div class="row serviceForm" id="serfrm" style="justify-content: flex-start">
@foreach($services as $key=>$ser)
    @if(in_array($ser->stype_id, $arr))

    @else

                        <div class="col-xl-6" id="{{$ser->stype_name}}" style="display: none">
                           
                            <div class="card border-top border-0 border-4 border-primary">
                                <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary">{{$ser->stype_name}}</h5>
                                     
                                    </div>
                                    <hr/>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="active_date" class="form-label">Active Date</label>
                                            <input type="date" class="form-control datepicker" name="active_date[{{$key}}]" placeholder="Active Date" >
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exp_date" class="form-label">Expiry Date</label>
                                            <input type="date" class="form-control datepicker" name="exp_date[{{$key}}]" placeholder="Expiry Date">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="text" class="form-control" name="amount[{{$key}}]" placeholder="Amount">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="discount" class="form-label">Discount</label>
                                            <input type="text" class="form-control" name="discount[{{$key}}]" placeholder="Discount Amount">
                                        </div>
                                        <div class="col-md-6">
                                       
                                            <label for="stype_id" class="form-label">Choose {{$ser->stype_name}}</label>
                                            <select class="form-select" name="service_id[{{$key}}]">
                                         
                                            <option value="">Choose ...</option>
                                            @foreach($ser->child as $servic)
                                            <option value="{{$servic->service_id}}">{{$servic->service_name}}</option>
                                            @endforeach
                                           
                                        </select>
                                       
                                        </div>
                                    
</div> 
                                      
                                  
                                </div>
</div>

</div>


</div>
@endif
@endforeach 




</div>


                    <div class="row">
                        <div class="col col-xl-12 mx-auto">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="row row-cols-auto g-3">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary px-4">Submit</button>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-danger px-4">Cancel</button>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-secondary px-4">Print Invoice</button>
                                        </div>
                                        
                                    </div>
                                   
                                </div>
</div>
</div>
</div>
</form>
                                
                </div>
            </div>


        @endsection


        @section("script")
	<script src="{{asset('assets/plugins/datetimepicker/js/legacy.js')}}"></script>
	<script src="{{asset('assets/plugins/datetimepicker/js/picker.js')}}"></script>
    <script src="{{asset('assets/js/tinymce.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datetimepicker/js/picker.time.js')}}"></script>
	<script src="{{asset('assets/plugins/datetimepicker/js/picker.date.js')}}"></script>
	<script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js')}}"></script>
	<script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js')}}"></script>
  

    <script>
            function checkMe(x){
               
                var id = x.dataset.servicename;
                var form = document.getElementById(id);
                if (x.checked == true){
                    form.style.display = "inline";
                }
                else{
                    form.style.display = "none";
                }
                
    
}
</script>
	<script>
		$('.datepicker').pickadate({
			selectMonths: true,
	        selectYears: true
		}),
		$('.timepicker').pickatime()
	</script>
	<script>
		$(function () {
			$('#date-time').bootstrapMaterialDatePicker({
				format: 'YYYY-MM-DD HH:mm'
			});
			$('#date').bootstrapMaterialDatePicker({
				time: false
			});
			$('#time').bootstrapMaterialDatePicker({
				date: false,
				format: 'HH:mm'
			});
		});
	</script>

<script src="assets/js/tinymce.min.js"></script>
	<script>
		tinymce.init({
		  selector: '#mytextareas'
		});
	</script>
    
	@endsection

  
