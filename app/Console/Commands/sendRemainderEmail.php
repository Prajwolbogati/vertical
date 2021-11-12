<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\account;
use App\Models\template;
use App\Models\companyservice;
use App\Models\service;
use App\Models\servicetype;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExpiryMail;
class sendRemainderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remainder:emails';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send expiry mail';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $remainder = companyservice::with('account','service.parent')
        ->whereRaw('DATEDIFF(exp_date,now()) = 15')
        ->orwhereRaw('DATEDIFF(exp_date,now()) = 7')
        ->orwhereRaw('DATEDIFF(exp_date,now()) = 3')
        ->orwhereRaw('DATEDIFF(exp_date,now()) = 0')->get();
        $template = template::get();
        
$data = [];
foreach($remainder as $remind){
    $data[$remind->account_id][] = $remind->toArray();
}
foreach($data as $account_id => $remainder){
    $this->sendEmailToUser($account_id, $remainder, $template);
}
    }
    private function sendEmailToUser($account_id, $remainder, $template)
    {
        $account = account::find($account_id);
        Mail::to($account)->send(new ExpiryMail($remainder, $template));
       
    }
}
