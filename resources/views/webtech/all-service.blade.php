@extends("layouts.app")

@section("style")
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection

    @section("wrapper")
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
            <hr/>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                           
                                <tr>
                                    <th>Service Name</th>
                                    <th>Service Type</th>
                                  
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $service)
                                <tr>
                                <td>{{$service->service_name}}</td>
                               <td> <a href="{{url('edit-servicetype')}}/{{$service->parent->stype_id}}">{{$service->parent->stype_name}}</a></td>
                              
                               <td>
                                    <div class="col">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success">Action</button>
                                            <button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{url('edit-service')}}/{{$service->service_id}}">Edit</a>
                                                </li>
                                                
                                                <li><a class="dropdown-item" href="">Delete</a>
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

@section("script")
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
      } );
</script>
<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print']
        } );
     
        table.buttons().container()
            .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
    } );
</script>
@endsection