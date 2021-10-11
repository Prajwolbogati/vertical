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
                                    <th>Domain Name</th>
                                    <th>Quota</th>
                                    <th>Days Left</th>
                                    <th>Final Amount</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $account)
                                    <tr id="cid{{ $account->compservice_id }}">
                                        <td>{{ $account->account->domainname }}</td>
                                        <td>{{ $account->account->hostingquota }}</td>
                                        <td>{{ $account->remaining_days }}</td>
                                        <td>{{ $account->finalamount }}</td>
                                        <td>{{ $account->exp_date }}</td>
                                        <td>{{ $account->status }}</td>
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
                                                                href="{{ url('edit-account') }}/{{ $account->account_id }}">Edit</a>
                                                        </li>
                                                        <li>
                                                            <button class="dropdown-item btn btn-xs btn-danger"
                                                                onclick="updateAccount({{ $account->compservice_id }})">Suspend</button>
                                                        </li>
                                                        <li>
                                                            <button class="dropdown-item btn btn-xs btn-danger"
                                                                onclick="deleteAccount({{ $account->compservice_id }})">Delete</button>
                                                        </li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ url('viewinvoice') }}/{{ $account->account_id }}">Print
                                                                Invoice</a>
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
        function updateAccount(id) {
            var status = 'suspend';
            $.ajax({
                url: '/update/' + id,
                type: 'post',
                data: {
                    status: status,
                    _token: $("input[name=_token]").val()
                },
                success: function(response) {
                    $("#cid" + id + " td:nth-child(6)").html(response.status);
                    swal({
                        title: "Status Updated!",
                        icon: "success",
                        timer: 1000,
                        showConfirmButton: true
                    });
                }
            });
        }

        function deleteAccount(id) {
            var status = 'delete';
            $.ajax({
                url: '/update/' + id,
                type: 'post',
                data: {
                    status: status,
                    _token: $("input[name=_token]").val()
                },
                success: function(response) {
                    $("#cid" + id + " td:nth-child(6)").html(response.status);
                    swal({
                        title: "Status Updated!",
                        icon: "success",
                        timer: 1000,
                        showConfirmButton: true
                    });
                }
            });
        }
    </script>
@endsection
