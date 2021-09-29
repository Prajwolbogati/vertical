@extends("layouts.app")

		@section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Applications</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                                </ol>
                            </nav>
                        </div>
                      
                    </div>
                    <!--end breadcrumb-->
                    <div class="card">
                        <div class="card-body">
                           
                                <div class="toolbar hidden-print">
                                    <div class="text-end">


                                        <form class="row g-3" method="post" action="{{url('send-email-pdf')}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="account_id" value="{{$data->account_id}}">


                                        <button type="submit" class="btn btn-dark"><i class="fa fa-print"></i> Send Mail</button>
                                        </form>
                                        {{-- <button type="button" class="btn btn-dark"><a href="{{url('send-email-pdf')}}/{{$data->account_id}}"><i class="fa fa-print"></i> Send Mail</a></button> --}}
                                        <button class="btn btn-success" onclick="printme()"><i class="fa fa-print"></i> Print</button>
                                        <button type="button" class="btn btn-danger" id="download"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                                    </div>
                                    <hr/>
                                </div>
                                <div id="invoic">
                                <div class="invoice overflow-auto">
                                    <div style="min-width: 600px">
                                        <header>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="javascript:;">
                                                        <img src="assets/images/logo-icon.png" width="80" alt="" />
                                                    </a>
                                                </div>
                                                <div class="col company-details">
                                                    <h2 class="name">
                                                        <a target="_blank" href="javascript:;">
                                                            Arboshiki
                                                        </a>
                                                    </h2>
                                                    <div>455 Foggy Heights, AZ 85004, US</div>
                                                    <div>(123) 456-789</div>
                                                    <div>company@example.com</div>
                                                </div>
                                            </div>
                                        </header>
                                        <main>
                                            <div class="row contacts">
                                                <div class="col invoice-to">
                                                    <div class="text-gray-light">INVOICE TO:</div>
                                                    <h2 class="to">John Doe</h2>
                                                    <div class="address">796 Silver Harbour, TX 79273, US</div>
                                                    <div class="email"><a href="mailto:john@example.com">john@example.com</a>
                                                    </div>
                                                </div>
                                                <div class="col invoice-details">
                                                    <h1 class="invoice-id">INVOICE 3-2-1</h1>
                                                    <div class="date">Date of Invoice: 01/10/2018</div>
                                                    <div class="date">Due Date: 30/10/2018</div>
                                                </div>
                                            </div>
                                            <table style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th colspan="3">Particulars</th>
                            
                                                    <th class="text-center">Amount</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data->compservice as $key=>$invoice)
                                                <tr id="{{$invoice->service->parent->stype_name}}">
												<td> <button class="btn btn-sm btn-secondary" data-serviceName="{{$invoice->service->parent->stype_name}}" onclick="checkMe(this)">-</button></td>
                            <td colspan="3">{{$invoice->service->parent->stype_name}}</td>
                           
                            <td class="amount text-center" value="{{$invoice->amountafterdiscount}}">{{$invoice->amountafterdiscount}}</td>
                                                </tr>
											 @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td colspan="2">SUBTOTAL</td>
                                                    <td   class="text-center" id="subtotal" value=""></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td colspan="2">TAX 13%</td>
                                                    <td class="text-center" id="vat"  value="13"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td colspan="2">GRAND TOTAL</td>
                                                    <td class="text-center" id="vatsubtotal"></td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                            {{-- <div class="thanks">Thank you!</div> --}}
                                           
                                        </main>
                                        <footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
                                    </div>
                                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                                    <div></div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
		@endsection
		

		@section("script")
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"> </script>
<script>

$(document).ready(function () {
calculateSum();
});


// document.getElementsByClassName('amount')[2].style.color = "red";
// $(this)[0].style.color = 'green';



	function calculateSum() {
       
    var sum = 0;
		//iterate through each textboxes and add the values
        
        // $(".amount")[2].style.color = "red";
		$(".amount").each(function() {
// console.log($(this));
var value = $(this)[0].innerText;
// parseFloat(s[0].innerText);
			//add only if the value is number
			if(!isNaN(value) && value.length!=0) {
				sum += parseFloat(value);
			}

		});
		//.toFixed() method will roundoff the final sum to 2 decimal places
		$("#subtotal").html(sum);

      

var subtotal = $("#subtotal").html();
         
         var vatpaid = ((13*subtotal)/100);
         
         $('#vat').html(vatpaid);
         
               
         
               var vstotal = (parseFloat(subtotal)+parseFloat(vatpaid)).toFixed(1);
               $('#vatsubtotal').html(vstotal);

}

</script>

<script>
function checkMe(x){
               
               var id = x.dataset.servicename;
               var form = document.getElementById(id);
               if (x.clicked == true){
                   form.style.display = "inline"; 
               }
               else{
                   form.remove();
               }
calculateSum();
               
   
}



</script>

<script>
function printme(){
    window.print();
}
</script>
<script>
window.onload = function(){
document.getElementById("download")
.addEventListener("click",()=>{
    const invoic = this.document.getElementById("invoic");
    var opt = {
  margin:       1,
  filename:     'myfile.pdf',
  image:        { type: 'jpeg', quality: 0.98 },
  html2canvas:  { scale: 2 },
  jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
};
    html2pdf().from(invoic).set(opt).save();
})
}

    </script>

@endsection		