<?php
  
namespace App\Http\Controllers;
  
use PDF;
use Mail;
use App\Models\account;
use App\Models\companyservice;

  
class PDFController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function pdf()
    {
        $data["email"] = "prajwolbogati9@gmail.com";
        $data["title"] = "From ItSolutionStuff.com";
        $data["body"] = "This is Demo";
  
        $pdf = PDF::loadView('webtech.haha', $data);
  
        Mail::send('webtech.haha', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf",[
                    'mime' => 'application/pdf',
        ]);
        });
  
        dd('Mail sent successfully');
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