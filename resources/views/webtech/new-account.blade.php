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

                <form class="row g-3" method="post" action="{{url('addaccount')}}">
				{{csrf_field()}}
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
                                            <input type="text" class="form-control" name="domainname" placeholder="Domain Name">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="hostingquota" class="form-label">Hosting Quota</label>
                                            <input type="text" class="form-control" name="hostingquota" placeholder="Hosting Quota">
                                        </div>
                                   

                                      
                                        <div class="col-md-12">
                                            <label for="fullname" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="fullname" placeholder="Full Name">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="companyname" class="form-label">Company Name</label>
                                            <input type="text" class="form-control" name="companyname" placeholder="Company Name">
                                        </div>
                                        <div class="col-12">
                                            <label for="companyaddress" class="form-label">Company Address</label>
                                            <input type="text" class="form-control" name="companyaddress" placeholder="Company Address">
                                        </div>
                                        <div class="col-12">
                                            <label for="phone_num" class="form-label">Company Number</label>
                                            <input type="text" class="form-control" name="phone_num" placeholder="Company Number">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="email" class="form-label">Company Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Company Email">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="marketby" class="form-label">Market By</label>
                                            <input type="text" class="form-control" name="marketby" placeholder="Market By">
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
                                <textarea id="mytextareas" name="detail">Hello, World!</textarea>
</div>
                           
</div>
</div>
</div>
</div>
                       
</div>
                            

                          

 <div class="row">
@foreach($services as $key=>$ser)
                        <div class="col-xl-4 mx-auto">
                           
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
                                            <input type="date" class="form-control datepicker" name="active_date[{{$key}}]" placeholder="Active Date">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exp_date" class="form-label">Expiry Date</label>
                                            <input type="date" class="form-control datepicker" name="exp_date[{{$key}}]" placeholder="Expiry Date">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="text" class="form-control" name="amount[{{$key}}]" placeholder="Amount">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="discount" class="form-label">Discount Amount</label>
                                            <input type="text" class="form-control" name="discount[{{$key}}]" placeholder="Discount Amount">
                                        </div>
                                        <div class="col-md-12">
                                       
                                            <label for="stype_id" class="form-label">Choose {{$ser->stype_name}}</label>
                                            <select class="form-select" name="service_id[{{$key}}]">
                                         
                                            <option value="">Choose ...</option>
                                            @foreach($ser->child as $servic)
                                            <option value="{{$servic->service_id}}">{{$servic->service_name}}</option>
                                            @endforeach
                                           
                                        </select>
                                       
                                        </div>
                                        <div class="form-check form-switch">
                                        
                                        <label class="form-check-label" for="vat_amount">Vat Bill 13%</label>
                                        <input class="form-check-input" type="checkbox" name=vat_amount[{{$key}}] checked value="13" />
                                      
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

  