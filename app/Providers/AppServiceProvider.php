<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\servicetype;
use App\Models\companyservice;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      
 $services = servicetype::with('child')->get();
 $dataexp = companyservice::with('account','service.parent')->where('status' , 'expired')->get();
 $dataexpcount = companyservice::with('account','service.parent')->where('status' , 'expired')->count();
      
         view()->share([
             'services'=>$services,
             'dataexp'=>$dataexp,
             'dataexpcount'=>$dataexpcount
       
          

       ]);

     
            
     
    
       
        
    

    
    }
}
