<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class account extends Model
{
    use HasFactory;
    protected $table = 'accounts';
    protected $primaryKey = 'account_id';


    public function compservice(){
        return $this->hasMany(companyservice::class, 'account_id','account_id');
    
       
    }


    // public function setHostingActiveDateAttribute($value)
    // {
    //         $this->attributes['hosting_active_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        
    // }

    // public function setHostingExpDateAttribute($value)
    // {
    //         $this->attributes['hosting_exp_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        
    // }
    // public function setDomainActiveDateAttribute($value)
    // {
    //         $this->attributes['domain_active_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        
    // }
    // public function setDomainExpDateAttribute($value)
    // {
    //         $this->attributes['domain_exp_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        
    // }
    // public function setStatusAttribute($value)
    // {
    //     if('DATEDIFF(domain_exp_date,Now())==0'){
    //         $this->attributes['status']="Expired";
    //     }
    //     else{
    //     $this->attributes['status']= $value;
    //     }
    // }


}

