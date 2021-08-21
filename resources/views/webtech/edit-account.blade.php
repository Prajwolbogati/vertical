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
                                   
                                    <form class="row g-3" method="post" action="{{url('updateaccount')}}">
				{{csrf_field()}}
                <input type="hidden" name="account_id" value="{{$singledata->account_id}}">
                                        <div class="col-md-12">
                                            <label for="domainname"  class="form-label">Domain Name</label>
                                            <input type="text" class="form-control" name="domainname" placeholder="Domain Name" value="{{$singledata->domainname}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="hostingquota" class="form-label">Hosting Quota</label>
                                            <input type="text" class="form-control" name="hostingquota" placeholder="Hosting Quota" value="{{$singledata->hostingquota}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputserver" class="form-label">Server</label>
                                            <input type="text" class="form-control" name="inputserver" placeholder="Server" value="{{$singledata->inputserver}}">
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
                        <div class="col-xl-5 mx-auto">
                           
                            <div class="card border-top border-0 border-4 border-primary">
                                <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary">Hosting</h5>
                                    </div>
                                    <hr/>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="hosting_active_date" class="form-label">Account Active Date</label>
                                            <input type="date" class="form-control datepicker" name="hosting_active_date" placeholder="Active Date" value="{{$singledata->hosting_active_date}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="hosting_exp_date" class="form-label">Account Expiry Date</label>
                                            <input type="date" class="form-control datepicker" name="hosting_exp_date" placeholder="Expiry Date" value="{{$singledata->hosting_exp_date}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="hosting_amount" class="form-label">Amount</label>
                                            <input type="text" class="form-control" name="hosting_amount" placeholder="Amount" value="{{$singledata->hosting_amount}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="hosting_discount" class="form-label">Discount Amount</label>
                                            <input type="text" class="form-control" name="hosting_discount" placeholder="Discount Amount" value="{{$singledata->hosting_discount}}">
                                        </div>
                                        <div class="form-check form-switch">
                                        <label class="form-check-label" for="hosting_vat">Vat Bill 13%</label>
                                        @if($singledata->hosting_vat == '')
                                        <input class="form-check-input" type="checkbox" name="hosting_vat" value="13" unchecked>
                                        @else
                                        <input class="form-check-input" type="checkbox" name="hosting_vat" value="13"  checked>
                                        @endif
                                      
                                    </div>
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
                                       <h5 class="mb-0 text-primary">Domain</h5>
                                   </div>
                                   <hr/>
                                   <div class="row g-3">
                                       <div class="col-md-6">
                                           <label for="domain_active_date" class="form-label">Account Active Date</label>
                                           <input type="date" class="form-control datepicker" name="domain_active_date" placeholder="Active Date" value="{{$singledata->domain_active_date}}">
                                       </div>
                                       <div class="col-md-6">
                                           <label for="domain_exp_date" class="form-label">Account Expiry Date</label>
                                           <input type="date" class="form-control datepicker" name="domain_exp_date" placeholder="Expiry Date" value="{{$singledata->domain_exp_date}}">
                                       </div>
                                      
                                       <div class="col-md-12">
                                           <label for="domain_amount" class="form-label">Amount</label>
                                           <input type="text" class="form-control" name="domain_amount" placeholder="Amount" value="{{$singledata->domain_amount}}">
                                       </div>
                                       <div class="col-md-12">
                                           <label for="domain_discount" class="form-label">Discount Amount</label>
                                           <input type="text" class="form-control" name="domain_discount" placeholder="Discount Amount" value="{{$singledata->domain_discount}}">
                                       </div>
                                       <div class="form-check form-switch">
                                       <label class="form-check-label" for="domain_vat">Vat Bill 13%</label>
                                       @if($singledata->domain_vat == '')
                                        <input class="form-check-input" type="checkbox" name="domain_vat" value="13" unchecked>
                                        @else
                                        <input class="form-check-input" type="checkbox" name="domain_vat" value="13" checked>
                                        @endif
                                     
                                   </div>
</div> 
                                  
                               </div>
</div>

</div>

</div>
</div>
                    <!--end row-->



                    <div class="row">
                        <div class="col col-xl-12 mx-auto">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="row row-cols-auto g-3">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary px-4">Update</button>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-danger px-4">Cancel</button>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-secondary px-4">Print Invoice</button>
                                        </div>
                                        
                                    </div>
                                    <!--end row-->
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

  
