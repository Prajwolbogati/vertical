@extends("layouts.app")
@section('style')
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
                            title: "New user added successfully!",
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
                                    <h5 class="mb-0 text-primary">Add User</h5>
                                </div>
                                <form class="row g-3" method="post" action="{{ url('register') }}">
                                    {{ csrf_field() }}
                                    <hr />
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-3 col-form-label">Enter Your Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Enter Your Name">
                                            @error('name')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-sm-3 col-form-label">Email </label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Enter Email">
                                            @error('email')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password" class="col-sm-3 col-form-label">Choose Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Choose Password">
                                            @error('password')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password_confirmation" class="col-sm-3 col-form-label">Confirm
                                            Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="password_confirmation"
                                                placeholder="Confirm Password">
                                            @error('password_confirmation')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="role" class="col-sm-3 col-form-label">Choose Role</label>
                                        <div class="col-sm-9">
                                            <select class="form-select mb-3" name="role">
                                                <option value=""> Choose role</option>
                                                @foreach ($data as $rol)
                                                    <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary px-5">Register</button>
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
    <script>
        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>
@endsection
