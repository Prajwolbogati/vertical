<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class companyservice extends Model
{
    use HasFactory;
    protected $table = 'companyservices';
    protected $primaryKey = 'compservice_id';

    protected $fillable = [
        
        'status',
        'vat_amount',
        'active_date',
        'exp_date',
        'amount',
        'discount',
        'account_id',
        'service_id',
        'amountafterdiscount',
        'finalamount'
    ];

    public function account(){
        return $this->belongsTo(account::class, 'account_id','account_id');
    
       
    }

    public function service(){
        return $this->belongsTo(service::class, 'service_id','service_id');
    
       
    }
    public function getRemainingDaysAttribute()
{

    if ($this->exp_date) {
        $remaining_days = Carbon::now()->diffInDays(Carbon::parse($this->exp_date));
    } else {
        $remaining_days = 0;
    }
    return $remaining_days;
    
}
}
