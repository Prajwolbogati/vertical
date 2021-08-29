@extends("layouts.app")

@section("style")
	<link href="assets/plugins/datetimepicker/css/classic.css" rel="stylesheet" />
	<link href="assets/plugins/datetimepicker/css/classic.time.css" rel="stylesheet" />
	<link href="assets/plugins/datetimepicker/css/classic.date.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	@endsection
		@section("wrapper")
        <div class="page-wrappers">
                <div class="page-content">

                <form class="row g-3" method="post" action="{{url('updateaccount')}}">
				{{csrf_field()}}
                <input type="hidden" name="account_id" value="{{$singledata->account_id}}">
            
                <div class="row">
                        <div class="col-xl-5 mx-auto">
                           
                            <div class="card border-top border-0 border-4 border-primary">
                                <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary">Client Info</h5>
                                    </div>
                                    <hr/>
                                   
                              
                                        <div class="col-md-12">
                                            <label for="domainname"  class="form-label">Domain Name</label>
                                            <input type="text" class="form-control" name="domainname" placeholder="Domain Name" value="{{$singledata->domainname}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="hostingquota" class="form-label">Hosting Quota</label>
                                            <input type="text" class="form-control" name="hostingquota" placeholder="Hosting Quota" value="{{$singledata->hostingquota}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="fullname" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="fullname" placeholder="Full Name" value="{{$singledata->fullname}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="companyname" class="form-label">Company Name</label>
                                            <input type="text" class="form-control" name="companyname" placeholder="Company Name" value="{{$singledata->companyname}}">
                                        </div>
                                        <div class="col-12">
                                            <label for="companyaddress" class="form-label">Company Address</label>
                                            <input type="text" class="form-control" name="companyaddress" placeholder="Company Address" value="{{$singledata->companyaddress}}">
                                        </div>
                                        <div class="col-12">
                                            <label for="phone_num" class="form-label">Company Number</label>
                                            <input type="text" class="form-control" name="phone_num" placeholder="Company Number" value="{{$singledata->phone_num}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="email" class="form-label">Company Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Company Email" value="{{$singledata->email}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="marketby" class="form-label">Market By</label>
                                            <input type="text" class="form-control" name="marketby" placeholder="Market By" value="{{$singledata->marketby}}">
                                        </div>
                                     

                                </div>
</div>
</div>
</div>

<div class="col-xl-5 mx-auto">
                           
                            <div class="card border-top border-0 border-4 border-primary">
                                <div class="card-body">
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
</div>
                       
</div>
                            

                          



<div class="row">


@foreach($singledata->compservice as $key=>$single)

<input type="hidden" name="compservice_id[{{$key}}]" value="{{$single->compservice_id}}">
                        <div class="col-xl-4 mx-auto">
                           
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
                                        <div class="col-md-12">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="text" class="form-control" name="amount[{{$key}}]" placeholder="Amount"  value="{{$single->amount}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="discount" class="form-label">Discount Amount</label>
                                            <input type="text" class="form-control" name="discount[{{$key}}]" placeholder="Discount Amount"  value="{{$single->discount}}">
                                        </div>
                                     
                                        <div class="col-md-12">
                                       
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
                                     
                                        <div class="form-check form-switch">
                                     
                                        <label class="form-check-label" for="vat_amount">Vat Bill 13%</label>
                             @if($single->vat_amount == '13')
                                        <input class="form-check-input" type="checkbox" name=vat_amount[{{$key}}] checked value="13" >
                                  @else
                                  <input class="form-check-input" type="checkbox" name=vat_amount[{{$key}}] unchecked value="13" >
             @endif
                  
    
                                    </div>
</div>

                                  
                                  
                                </div>
</div>

</div>


</div>

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
	<script src="assets/plugins/datetimepicker/js/legacy.js"></script>
	<script src="assets/plugins/datetimepicker/js/picker.js"></script>
    <script src="assets/js/tinymce.min.js"></script>
	<script src="assets/plugins/datetimepicker/js/picker.time.js"></script>
	<script src="assets/plugins/datetimepicker/js/picker.date.js"></script>
	<script src="assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
	<script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
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

  
