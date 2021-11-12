@extends("layouts.app")
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                @if (Session::has('message'))
                    <script>
                        swal({
                            title: "Setting updated successfully!",
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
                                    <h5 class="mb-0 text-primary">Add Company Info</h5>
                                </div>
                                @if (count((array) $data) < 1)
                                    <form class="row g-3" method="post" action="{{ url('addsetting') }}"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <hr />
                                        <div class="row mb-3">
                                            <label for="companyname" class="col-sm-3 col-form-label">Company Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="companyname"
                                                    placeholder="Enter Company Name">
                                                @error('companyname')
                                                    <div class="alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="companyaddress" class="col-sm-3 col-form-label">Company
                                                Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="companyaddress"
                                                    placeholder="Company Address">
                                                @error('companyaddress')
                                                    <div class="alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="companyphone" class="col-sm-3 col-form-label">Company Phone
                                                No</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="companyphone"
                                                    placeholder="Phone No">
                                                @error('companyphone')
                                                    <div class="alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="companyemail" class="col-sm-3 col-form-label">Company Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" name="companyemail"
                                                    placeholder="Email Address">
                                                @error('companyemail')
                                                    <div class="alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class=" row mb-3">
                                            <p><label for="file" style="cursor: pointer;"
                                                    class="col-sm-3 col-form-label">Set Image</label></p>
                                            <div class="col-sm-9">
                                                <p><img id="output"
                                                        style="max-width: 35%;margin-left: 170px;margin-top: -50px;max-height: 35%;" />
                                                </p>
                                                <p><input type="file" accept="image/*" name="image" id="file"
                                                        class="form-control" onchange="loadFile(event)"
                                                        style="display: none;"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary px-5">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <form class="row g-3" method="post" action="{{ url('updatesetting') }}"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="setting_id" value="{{ $data->setting_id }}">
                                        <hr />
                                        <div class="row mb-3">
                                            <label for="companyname" class="col-sm-3 col-form-label">Company Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="companyname"
                                                    placeholder="Enter Your Name" value="{{ $data->companyname }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="companyaddress" class="col-sm-3 col-form-label">Company
                                                Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="companyaddress"
                                                    placeholder="Address" value="{{ $data->companyaddress }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="companyphone" class="col-sm-3 col-form-label">Company Phone
                                                No</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="companyphone"
                                                    placeholder="Phone No" value="{{ $data->companyphone }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="companyemail" class="col-sm-3 col-form-label">Company Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" name="companyemail"
                                                    placeholder="Email Address" value="{{ $data->companyemail }}">
                                            </div>
                                        </div>
                                        <div class=" row mb-3">
                                            @if ($data->image != '')
                                                <p><label for="file" style="cursor: pointer;"
                                                        class="col-sm-3 col-form-label">Replace Image</label></p>
                                                <div class="col-sm-9">
                                                    <p> <img src="{{ asset('setting') }}/{{ $data->image }}"
                                                            id="output"
                                                            style="max-width: 35%;margin-left: 170px;margin-top: -50px;max-height: 35%;" />
                                                    </p>
                                                    <p><input type="file" accept="image/*" name="image" id="file"
                                                            class="form-control" onchange="loadFile(event)"
                                                            style="display: none;"></p>
                                                </div>
                                            @else
                                                <p><label for="file" style="cursor: pointer;"
                                                        class="col-sm-3 col-form-label">Set Image</label></p>
                                                <div class="col-sm-9">
                                                    <p><img id="output"
                                                            style="max-width: 35%;margin-left: 170px;margin-top: -50px;max-height: 35%;" />
                                                    </p>
                                                    <p><input type="file" accept="image/*" name="image" id="file"
                                                            class="form-control" onchange="loadFile(event)"
                                                            style="display: none;"></p>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary px-5">Update</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <!--end row-->
        </div>
    </div>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
