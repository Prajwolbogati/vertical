@extends("layouts.app")

@section("style")
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
<style>
    .webtech{
        display:none;
    }
    .webtech:first-child{
        display: contents;
    }

    </style>

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
                        <table id="example" class="table table-striped table-bordered display nowrap" style="width:100%">
                            <thead>
                           
                                <tr>
                            <th></th>
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

                        

                            @foreach($data as $key=>$account)

<tr class="{{$account->account->account_id}}" id="cid{{$account->compservice_id}}">
                            
                            <td class="text-center"> 
                                <button class="btn btn-sm btn-success" data-serviceName="{{$account -> account -> account_id}}" onclick="checkMe(this)">+</button>
                             
                            </td>
                                <td> <a href="{{url('detail')}}/{{$account->account_id}}">{{$account->account->domainname}}</a></td>
                               <td>{{$account->account->hostingquota}}</td>
                               <td>{{$account->remaining_days}}</td>
                               <td>{{$account->finalamount}}</td>
                               <td>{{$account->exp_date}}</td>
                               <td>{{$account->service->parent->stype_name}}</td>
                               <td>{{$account->status}}</td>
                              
                               <td>
                                    <div class="col">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success">Action</button>
                                            <button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{url('edit-account')}}/{{$account->account_id}}">Edit</a>
                                                </li>
                                                
                                                
                                                <li>
                                                <form action="{{url('update/'.$account->compservice_id)}} " method="post">
                        
                        @csrf
                        <input type="hidden" name="status" value="suspend">
                        <button class="dropdown-item btn btn-xs btn-danger">Suspend</button>
                    </form>
                    
                                                </li>

                                                <li>

                                                    <a  href="javascript:void(0)" onclick="deleteAccount({{$account->compservice_id}})" class="dropdown-item">Delete</a>
                                                {{-- <form action="{{url('delete/'.$account->compservice_id)}} " method="post">
                      
                        @csrf
                       
                        <button class="dropdown-item btn btn-xs btn-danger">Delete</button>
                    </form> --}}
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="{{url('viewinvoice')}}/{{$account->account_id}}">Print Invoice</a>
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

    <style>
/* .haha:first-child {
visibility: visible;
}

.haha{
visibility: hidden;
} */
        </style>


    @endsection

@section("script")
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> --}}
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
      } );
</script>
<!-- <script>
    $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print']
        } );
     
        table.buttons().container()
            .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
    } );
</script> -->


<!-- <script>
function format(values) {
  return '' + values + '' ;
}
$(document).ready(function () {
  var table = $('#example').DataTable({
  rowGroup: true
});

  // Add event listener for opening and closing details
  $('#example').on('click', 'td.details-control', function () {
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
//   $(document).ready(function () {




            var a = [@foreach($data as $k => $info)
'{{ $info -> account -> account_id }}',
@endforeach ]
var uniqueAndSorted = [...new Set(a)].sort() 

uniqueAndSorted.forEach(element => {
var x = document.getElementsByClassName(element);
console.log(x);
if (x.length <= 1) {
    // x[0].firstElementChild.style.visibility="hidden";
    // debugger
                x[0].firstElementChild.firstElementChild.disabled = true;
                x[0].firstElementChild.firstElementChild.classList.remove("btn-success");
                x[0].firstElementChild.firstElementChild.classList.add("btn-secondary");
}
for (let i = 0; i < x.length; i++) {
    if (i != 0) {
        x[i].classList.add("d-none");
        // x[i].firstElementChild.style.visibility="hidden";
        // x[i].firstChild
    }
}
// });



});

        function checkMe(x){
            var haha = x.dataset.servicename;
        
        var rows = document.getElementsByClassName(haha);
        if (rows[1]) {
            
        if (rows[1].classList.contains("d-none")) {
        
        for (let i = 0; i < rows			.length; i++) {
            if (i != 0) {
            
                rows[i].firstElementChild.firstElementChild.classList.remove("btn-success");
                rows[i].firstElementChild.firstElementChild.innerHTML = ""
        }
                rows[i].classList.remove("d-none");
                
                rows[0].firstElementChild.firstElementChild.innerHTML = "-"
        }
        // rows[0].firstElementChild.firstElementChild.innerHTML = "-"		//change it later

        }
        else{
            // rows[0].firstElementChild.firstElementChild.innerHTML = "+"
        
for (let i = 0; i < rows			.length; i++) {
        if (i != 0) {
            
            rows[i].classList.add("d-none");
        }
            rows[0].firstElementChild.firstElementChild.innerHTML = "+"
}
        }
        }
        else{}
            

}
// swal({
//   title: "Are you sure?",
//   text: "Once deleted, you will not be able to recover this imaginary file!",
//   icon: "warning",
//   buttons: true,
//   dangerMode: true,
// })
// .then((willDelete) => {
//   if (willDelete) {
//     swal("Poof! Your imaginary file has been deleted!", {
//       icon: "success",
//     });
//   } else {
//     swal("Your imaginary file is safe!");
//   }
// });


</script>

<script>
    function deleteAccount(id)
    
    {

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
                url:'/delete/'+id,
                type:'DELETE',
                data:{
                    _token : $("input[name=_token]").val()
                },
                success:function(response)
                {
                $("#cid"+id).remove();
                }

            });
        } else {
   swal("Your data is safe!");
        }
});

    }


    </script>

@endsection