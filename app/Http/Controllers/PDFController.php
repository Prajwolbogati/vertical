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
        return redirect()->back();
        

    }



    

}