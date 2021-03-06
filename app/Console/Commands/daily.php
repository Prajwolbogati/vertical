<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use DB;
class daily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:update';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will update status automatically';
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
        DB::table('companyservices')->whereDate('exp_date', '<=', now())->update(['status' => 'expired']);
         DB::table('companyservices')->whereDate('exp_date', '>', now())->where(['status'=>'expired'])->update(['status' => 'active']);
        echo "Operation Done";
    }
}
