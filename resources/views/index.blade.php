@extends("layouts.app")
@section('style')
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-5">
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Exp in 15 days</p>
                                    <h4 class="my-1 text-info">{{ $fifteen }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i
                                        class='bx bxs-cart'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-danger">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Exp in 7 days</p>
                                    <h4 class="my-1 text-danger">{{ $seven }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i
                                        class='bx bxs-wallet'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Expired</p>
                                    <h4 class="my-1 text-success">{{ $expired }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i
                                        class='bx bxs-bar-chart-alt-2'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Suspended</p>
                                    <h4 class="my-1 text-success">{{ $suspend }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i
                                        class='bx bxs-bar-chart-alt-2'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-warning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Deleted</p>
                                    <h4 class="my-1 text-warning">{{ $delete }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i
                                        class='bx bxs-group'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 indexview">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Expire In 7 Days</h5>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered display nowrap"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Domain Name</th>
                                            <th>Days Left</th>
                                            <th>End Date</th>
                                            <th>Service Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $account)
                                            <tr class="{{ $account->account->account_id }}"
                                                id="{{ $account->account_id }}">
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-success"
                                                        data-serviceName="{{ $account->account->account_id }}"
                                                        onclick="checkMe(this)">+</button>
                                                </td>
                                                <td> <a
                                                        href="{{ url('detail') }}/{{ $account->account_id }}">{{ $account->account->domainname }}</a>
                                                </td>
                                                <td>{{ $account->remaining_days }}</td>
                                                <td>{{ $account->exp_date }}</td>
                                                <td>{{ $account->service->parent->stype_name }}</td>
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
                                                                    <form
                                                                        action="{{ url('update/' . $account->compservice_id) }} "
                                                                        method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="status" value="suspend">
                                                                        <button
                                                                            class="dropdown-item btn btn-xs btn-danger">Suspend</button>
                                                                    </form>
                                                                </li>
                                                                <li>
                                                                    <form
                                                                        action="{{ url('update/' . $account->compservice_id) }} "
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
        </div>
    </div>
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
    </script> -->
    <script>
        function format(values) {
            return '' + values + '';
        }
        $(document).ready(function() {
            var table = $('#example').DataTable({
                rowGroup: true
            });
            // Add event listener for opening and closing details
            $('#example').on('click', 'td.details-control', function() {
                var tr = $(this).closest('tr');
                var row = table.row(tr);
                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(tr.data('child-value'))).show();
                    tr.addClass('shown');
                }
            });
        });
    </script> -->
    <script>
        @foreach ($data as $k => $info)
            '{{ $info->account->account_id }}',
        @endforeach]
        var uniqueAndSorted = [...new Set(a)].sort()
        uniqueAndSorted.forEach(element => {
            var x = document.getElementsByClassName(element);
            console.log(x);
            if (x.length <= 1) {
                x[0].firstElementChild.firstElementChild.disabled = true;
                x[0].firstElementChild.firstElementChild.classList.remove("btn-success");
                x[0].firstElementChild.firstElementChild.classList.add("btn-secondary");
            }
            for (let i = 0; i < x.length; i++) {
                if (i != 0) {
                    x[i].classList.add("d-none");
                }
            }
        });

        function checkMe(x) {
            var haha = x.dataset.servicename;
            var rows = document.getElementsByClassName(haha);
            if (rows[1]) {
                if (rows[1].classList.contains("d-none")) {
                    for (let i = 0; i < rows.length; i++) {
                        if (i != 0) {
                            rows[i].firstElementChild.firstElementChild.classList.remove("btn-success");
                            rows[i].firstElementChild.firstElementChild.innerHTML = ""
                        }
                        rows[i].classList.remove("d-none");
                        rows[0].firstElementChild.firstElementChild.innerHTML = "-"
                    }
                } else {
                    for (let i = 0; i < rows.length; i++) {
                        if (i != 0) {
                            rows[i].classList.add("d-none");
                        }
                        rows[0].firstElementChild.firstElementChild.innerHTML = "+"
                    }
                }
            } else {}
        }
    </script>
@endsection
