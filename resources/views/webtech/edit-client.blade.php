@extends("layouts.app")
@section('style')
    <link href="assets/plugins/datetimepicker/css/classic.css" rel="stylesheet" />
    <link href="assets/plugins/datetimepicker/css/classic.time.css" rel="stylesheet" />
    <link href="assets/plugins/datetimepicker/css/classic.date.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Clients</div>
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
                @if (Session::has('message'))
                    <script>
                        swal({
                            title: "Client updated successfully!",
                            icon: "success",
                            timer: 1000,
                            showConfirmButton: true
                        });
                    </script>
                @endif
                <div class="col-xl-9 mx-auto">
                    <div class="card border-top border-0 border-4 border-info">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                    </div>
                                    <h5 class="mb-0 text-info">Add Client</h5>
                                </div>
                                <form class="row g-3" method="post" action="{{ url('updateclient') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="client_id" value="{{ $singledata->client_id }}">
                                    <hr />
                                    <div class="row mb-3">
                                        <label for="clientname" class="col-sm-3 col-form-label">Client Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="clientname"
                                                placeholder="Enter Name" value="{{ $singledata->clientname }}">
                                            @error('clientname')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="clientemail" class="col-sm-3 col-form-label">Client Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="clientemail"
                                                placeholder="Email Address" value="{{ $singledata->clientemail }}">
                                            @error('clientemail')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="clientphone" class="col-sm-3 col-form-label">Client Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="clientphone"
                                                placeholder="Phone No" value="{{ $singledata->clientphone }}">
                                            @error('clientphone')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="clientaddress" class="col-sm-3 col-form-label">Client Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="clientaddress"
                                                placeholder="Address" value="{{ $singledata->clientaddress }}">
                                            @error('clientaddress')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="requirement" class="col-sm-3 col-form-label">Client Requirement</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="requirement" rows="3"
                                                placeholder="Add requirements">{{ $singledata->requirement }}</textarea>
                                            @error('requirement')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="clientactive_date" class="col-sm-3 col-form-label">Active Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control datepicker" name="clientactive_date"
                                                placeholder="Active Date" value="{{ $singledata->clientactive_date }}">
                                            @error('clientactive_date')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="clientstatus" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="clientstatus">
                                                <option> {{ $singledata->clientstatus }}</option>
                                                <option>New</option>
                                                <option>Successed</option>
                                                <option>Call Back</option>
                                                <option>Interested</option>
                                                <option>Not Interested</option>
                                            </select>
                                            @error('clientstatus')
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
@endsection
@section('script')
    <script src="assets/plugins/datetimepicker/js/legacy.js"></script>
    <script src="assets/plugins/datetimepicker/js/picker.js"></script>
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
        $(function() {
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
@endsection
