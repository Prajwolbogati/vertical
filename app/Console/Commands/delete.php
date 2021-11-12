<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use DB;
use App\Models\account;
use App\Models\companyservice;
class delete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:delete';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will delete account automatically';
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
 
    $del = account::doesntHave('compservice')->delete();


}

}
