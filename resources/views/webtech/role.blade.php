@extends("layouts.app")
@section('style')
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Roles and Permissions</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">View All</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class=" d-sm-flex align-items-center">
                <h6 class="mb-0 text-uppercase">Roles</h6>
                <div class="ms-auto">
                    <button type="button" class="btn btn-primary role"><a class="role" href="{{ url('addrole') }}">Add new
                            Role</a></button>
                </div>
            </div>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    
                                    <th>Role</th>
                                    <th>Permission</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $role )
                                    <tr id="role{{ $role->id }}">
                                       
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach ($role->permissions as $permission)
                                                <button class="btn btn-primary" type="button">
                                                    {{ $permission->name }}</button>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="col">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary">Action</button>
                                                    <button type="button"
                                                        class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                                                        data-bs-toggle="dropdown" aria-expanded="false"> <span
                                                            class="visually-hidden">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                                href="{{ url('editrole') }}/{{ $role->id }}">Edit</a>
                                                        </li>
                                                        <li>
                                                            <button class="dropdown-item btn btn-xs btn-danger"
                                                                onclick="deleterole({{ $role->id }})">Delete</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td><i class="fas fa-folder-open"></i> No Record found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        function deleterole(id) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! Your data has been deleted!", {
                            icon: "success",
                            timer: 1000,
                        });
                        $.ajax({
                            url: 'deleterole/' + id,
                            type: 'DELETE',
                            data: {
                                _token: $("input[name=_token]").val()
                            },
                            success: function(response) {
                                $("#role" + id).remove();
                            }
                        });
                    } else {
                        swal("Your data is safe!");
                    }
                });
        }
    </script>
@endsection
