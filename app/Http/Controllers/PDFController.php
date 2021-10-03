<?php
  
namespace App\Http\Controllers;
  
use PDF;
use Mail;
use App\Models\account;
use App\Models\hello;
use App\Models\hellos;
use App\Models\companyservice;
use Illuminate\Http\Request;

  
class PDFController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function pdf(Request $req)
    {
        $data['subtotal'] = $req->subtotal;
        $data['comname'] = $req->comname;
        $data['company'] = $req->company;
        $data['comaddress'] = $req->comaddress;
        $data['comphone'] = $req->comphone;
        $data['comemail'] = $req->comemail;
        $data['names'] = $req->names;
        $data['address'] = $req->address;
        $data['email'] = $req->email;
        $data['particular'] = $req->particular;
        $data['amount'] = $req->amount;
        $data['vatsubtotal'] = $req->vatsubtotal;
        $data['vat'] = $req->vat;
        $data["email"] = $req->email;
        $data["title"] = "From ItSolutionStuff.com";
        $data["body"] = "This is Demo";
  
        $pdf = PDF::loadView('webtech.haha', $data)
        ->setOptions([
            'enable_remote' => true,
        ]);
        Mail::send('webtech.zero', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "invoice.pdf",[
                    'mime' => 'application/pdf',
        ]);
        });
       
        return view ('webtech.haha',$data);

    }



    // public function pdfs(Request $req)
    // {

    //     $data = new hello();
    //     $data ->subtotal = $req->subtotal;
        
    //     $data->names = $req->names;
       
    //     $data->particular = $req->particular;
    //     $datas = new hellos();
    //     $datas->amount = $req->amount;
       
    //     $data->email = $req->email;
    //     $data->title = "From ItSolutionStuff.com";
    //     $data->body= "This is Demo";
  
   
       
    //     return view ('webtech.hahas',['data' => $data, 'datas' => $datas]);

    // }
    // public function pdf(Request $req)
    // {
    //     $data = array(
    //     'subtotal' => $req->subtotal,
    //     'comname' => $req->comname,
    //     'comaddress' => $req->comaddress,
    //     'comphone' => $req->comphone,
    //    'comemail' => $req->comemail,
    //     'name' => $req->name,
    //     'address' => $req->address,
    //     'email' => $req->email,
    //     'particular' => $req->particular,
    //     'amount' => $req->amount,
    //    'vatsubtotal' => $req->vatsubtotal,
    //    'vat' => $req->vat,
    //     "email" => $req->email,
    //     "title" => "From ItSolutionStuff.com",
    //     "body" => "This is Demo"
    //     );
    //     // $pdf = PDF::loadView('webtech.haha', $data);
  
    //     // Mail::send('webtech.zero', $data, function($message)use($data, $pdf) {
    //     //     $message->to($data["email"], $data["email"])
    //     //             ->subject($data["title"])
    //     //             ->attachData($pdf->output(), "invoice.pdf",[
    //     //             'mime' => 'application/pdf',
    //     // ]);
    //     // });
    //     return view ('webtech.haha',['data'=>$data]);
    // }


    public function pdfsss(Request $req)
    {
        $data['subtotal'] = $req->subtotal;

        $data['name'] = $req->name;
        $data['haha'] = 'hahaha';

  
        dd($data);
    }
  

    // public function pdf($id){
    //     $data = account::with('compservice.service.parent')->where('account_id',$id)->first();
      
    //     $sum = companyservice::with('account','service.parent')->where('account_id',$id)->sum('amountafterdiscount');
    //     $data["email"] = "prajwolbogati9@gmail.com";
    //     $data["title"] = "From ItSolutionStuff.com";
    //     $data["body"] = "This is Demo";
    //     $pdf = PDF::loadView('webtech.invoice',['data'=>$data,'sum'=>$sum]);
        
    //     Mail::send('webtech.zero', ['data' => $data], function($message)use($data, $pdf) {
    //         $message->to($data["email"], $data["email"])
    //                 ->subject($data["title"])
    //                 ->attachData($pdf->output(), "text.pdf");
                   
    //     });
  
    //     dd('Mail sent successfully');
          
    //     }

        // public function pdf($id){
        //     $data = account::with('compservice.service.parent')->where('account_id',$id)->first();
          
        //     $sum = companyservice::with('account','service.parent')->where('account_id',$id)->sum('amountafterdiscount');
          


        //     // PDF::setOptions(['isRemoteEnabled' => TRUE, 'enable_javascript' => TRUE]);
        //     // $dompdf = new Dompdf();
        //     // $html = view('webtech.haha')->render();
        //     // $dompdf->loadHtml($html);
        //     // $dompdf->render();
        //     // return $dompdf->download('card.pdf');




        //     $pdf = PDF::loadView('webtech.invoice',['data'=>$data,'sum'=>$sum]);
        //     $pdf->setOptions(['enable_javascript', true]);
            
        //     return $pdf->download('Nicesnippets.pdf');
              
        //     } 

}