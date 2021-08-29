<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $primaryKey = 'service_id';


    public function parent(){
        return $this->belongsTo(servicetype::class, 'stype_id','stype_id');
    
       
    }

  

    public function compservice(){
        return $this->hasMany(companyservice::class, 'service_id','service_id');
    
       
    }
}
