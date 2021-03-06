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
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Details</h6>
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
                                    <th>Service Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $comp)
                                    <tr>
                                        <td>{{ $comp->account->domainname }}</td>
                                        <td>{{ $comp->account->hostingquota }}</td>
                                        <td>{{ $comp->remaining_days }}</td>
                                        <td>{{ $comp->amountafterdiscount }}</td>
                                        <td>{{ $comp->exp_date }}</td>
                                        <td>{{ $comp->service->parent->stype_name }}</td>
                                        <td>{{ $comp->status }}</td>
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
                                                                href="{{ url('edit-account') }}/{{ $comp->account->account_id }}">Edit</a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ url('update/' . $comp->compservice_id) }} "
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="status" value="suspend">
                                                                <button
                                                                    class="dropdown-item btn btn-xs btn-danger">Suspend</button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="{{ url('update/' . $comp->compservice_id) }} "
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="status" value="delete">
                                                                <button
                                                                    class="dropdown-item btn btn-xs btn-danger">Delete</button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Print Invoice</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" style="text-align:center">Total</td>
                                    <td> {{ $sum }} </td>
                                </tr>
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
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });
            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
