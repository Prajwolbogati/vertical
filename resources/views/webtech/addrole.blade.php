@extends("layouts.app")
@section('style')
<link href="{{ asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--end row-->
            <div class="row">
                @if (Session::has('message'))
                    <script>
                        swal({
                            title: "New role added successfully!",
                            icon: "success",
                            timer: 1000,
                            showConfirmButton: true
                        });
                    </script>
                @endif
                <div class="col-xl-9 mx-auto">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                    </div>
                                    <h5 class="mb-0 text-primary">Add Role</h5>
                                </div>
                                <form class="row g-3" method="post" action="{{ url('postRole') }}">
                                    {{ csrf_field() }}
                                    <hr />
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-3 col-form-label">Enter Role</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" placeholder="Enter Role">
                                            @error('name')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="permissions" class="col-sm-3 col-form-label">Choose Permissions</label>
                                        <div class="col-sm-9">
                                            <select class="multiple-select" data-placeholder="Choose anything"
                                                multiple="multiple" name="permissions[]">
                                                @foreach ($permission as $per)
                                                    <option value="{{ $per->name }}">{{ $per->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary px-5">Submit</button>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
        $('.multiple-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>
@endsection
