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
                <div class="breadcrumb-title pe-3">Account</div>
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
            <h6 class="mb-0 text-uppercase">Total Accounts</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Active Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $client)
                                    <tr id="clientid{{ $client->client_id }}">
                                        <td>{{ $client->clientname }}</td>
                                        <td>{{ $client->clientemail }}</td>
                                        <td>{{ $client->clientphone }}</td>
                                        <td>{{ $client->clientaddress }}</td>
                                        <td>{{ $client->clientactive_date }}</td>
                                        <td>{{ $client->clientstatus }}</td>
                                        <td>
                                            <div class="col">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success">Action</button>
                                                    <button type="button"
                                                        class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split"
                                                        data-bs-toggle="dropdown" aria-expanded="false"> <span
                                                            class="visually-hidden">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                                href="{{ url('edit-client') }}/{{ $client->client_id }}">Edit</a>
                                                        </li>
                                                        <li>
                                                            <button class="dropdown-item btn btn-xs btn-danger"
                                                                onclick="updatesuccess({{ $client->client_id }})">Successed</button>
                                                        </li>
                                                        <li>
                                                            <button class="dropdown-item btn btn-xs btn-danger"
                                                                onclick="updatecall({{ $client->client_id }})">Call
                                                                Back</button>
                                                        </li>
                                                        <li>
                                                            <button class="dropdown-item btn btn-xs btn-danger"
                                                                onclick="updateinterest({{ $client->client_id }})">Interested</button>
                                                        </li>
                                                        <li>
                                                            <button class="dropdown-item btn btn-xs btn-danger"
                                                                onclick="updatenot({{ $client->client_id }})">Not
                                                                Interested</button>
                                                        </li>
                                                        <li>
                                                            <button class="dropdown-item btn btn-xs btn-danger"
                                                                onclick="deleteclient({{ $client->client_id }})">Delete</button>
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
        function updatesuccess(id) {
            var clientstatus = 'Successed';
            $.ajax({
                url: '/updatecstatus/' + id,
                type: 'post',
                data: {
                    clientstatus: clientstatus,
                    _token: $("input[name=_token]").val()
                },
                success: function(response) {
                    $("#clientid" + id + " td:nth-child(6)").html(response.clientstatus);
                    swal({
                        title: "Status Updated!",
                        icon: "success",
                        timer: 1000,
                        showConfirmButton: true
                    });
                }
            });
        }

        function updatecall(id) {
            var clientstatus = 'Call Back';
            $.ajax({
                url: '/updatecstatus/' + id,
                type: 'post',
                data: {
                    clientstatus: clientstatus,
                    _token: $("input[name=_token]").val()
                },
                success: function(response) {
                    $("#clientid" + id + " td:nth-child(6)").html(response.clientstatus);
                    swal({
                        title: "Status Updated!",
                        icon: "success",
                        timer: 1000,
                        showConfirmButton: true
                    });
                }
            });
        }

        function updateinterest(id) {
            var clientstatus = 'Interested';
            $.ajax({
                url: '/updatecstatus/' + id,
                type: 'post',
                data: {
                    clientstatus: clientstatus,
                    _token: $("input[name=_token]").val()
                },
                success: function(response) {
                    $("#clientid" + id + " td:nth-child(6)").html(response.clientstatus);
                    swal({
                        title: "Status Updated!",
                        icon: "success",
                        timer: 1000,
                        showConfirmButton: true
                    });
                }
            });
        }

        function updatenot(id) {
            var clientstatus = 'Not Interested';
            $.ajax({
                url: '/updatecstatus/' + id,
                type: 'post',
                data: {
                    clientstatus: clientstatus,
                    _token: $("input[name=_token]").val()
                },
                success: function(response) {
                    $("#clientid" + id + " td:nth-child(6)").html(response.clientstatus);
                    swal({
                        title: "Status Updated!",
                        icon: "success",
                        timer: 1000,
                        showConfirmButton: true
                    });
                }
            });
        }

        function deleteclient(id) {
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
                            url: '/deleted/' + id,
                            type: 'DELETE',
                            data: {
                                _token: $("input[name=_token]").val()
                            },
                            success: function(response) {
                                $("#clientid" + id).remove();
                            }
                        });
                    } else {
                        swal("Your data is safe!");
                    }
                });
        }
    </script>
@endsection
