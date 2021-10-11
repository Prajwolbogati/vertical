@extends("layouts.app")
@section('style')
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('wrapper')
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
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-home" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i
                                                    class='fadeIn animated bx bx-chevron-down-circle font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">View Service Type</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i
                                                    class='fadeIn animated bx bx-chevron-down-circle font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">View Services</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="primary-pills-home" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example" class="table table-striped table-bordered"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Service Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $service)
                                                            <tr id="service{{ $service->service_id }}">
                                                                <td>{{ $service->service_name }}</td>
                                                                <td>
                                                                    <div class="col">
                                                                        <div class="btn-group">
                                                                            <button type="button"
                                                                                class="btn btn-success">Action</button>
                                                                            <button type="button"
                                                                                class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false"> <span
                                                                                    class="visually-hidden">Toggle
                                                                                    Dropdown</span>
                                                                            </button>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="{{ url('edit-service') }}/{{ $service->service_id }}">Edit</a>
                                                                                </li>
                                                                                <li>
                                                                                    <button
                                                                                        class="dropdown-item btn btn-xs btn-danger"
                                                                                        onclick="deleteservice({{ $service->service_id }})">Delete</button>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="examples" class="table table-striped table-bordered"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Service Type</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($datas as $servicetype)
                                                            <tr id="servicetype{{ $servicetype->stype_id }}">
                                                                <td>
                                                                    {{ $servicetype->stype_name }}
                                                                </td>
                                                                <td>
                                                                    <div class="col">
                                                                        <div class="btn-group">
                                                                            <button type="button"
                                                                                class="btn btn-success">Action</button>
                                                                            <button type="button"
                                                                                class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false"> <span
                                                                                    class="visually-hidden">Toggle
                                                                                    Dropdown</span>
                                                                            </button>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item"
                                                                                        href="{{ url('edit-servicetype') }}/{{ $servicetype->stype_id }}">Edit</a>
                                                                                </li>
                                                                                <li>
                                                                                    <button
                                                                                        class="dropdown-item btn btn-xs btn-danger"
                                                                                        onclick="deleteservicetype({{ $servicetype->stype_id }})">Delete</button>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        $(document).ready(function() {
            $('#examples').DataTable();
        });
    </script>
    <script>
        function deleteservicetype(id) {
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
                            url: '/deletestype/' + id,
                            type: 'DELETE',
                            data: {
                                _token: $("input[name=_token]").val()
                            },
                            success: function(response) {
                                $("#servicetype" + id).remove();
                            }
                        });
                    } else {
                        swal("Your data is safe!");
                    }
                });
        }

        function deleteservice(id) {
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
                            url: '/deleteservice/' + id,
                            type: 'DELETE',
                            data: {
                                _token: $("input[name=_token]").val()
                            },
                            success: function(response) {
                                $("#service" + id).remove();
                            }
                        });
                    } else {
                        swal("Your data is safe!");
                    }
                });
        }
    </script>
@endsection
