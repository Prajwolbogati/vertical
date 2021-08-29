<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicetype extends Model
{
    use HasFactory;
    protected $table = 'servicetypes';
    protected $primaryKey = 'stype_id';

    
    public function child(){
        return $this->hasMany(service::class, 'stype_id','stype_id');
    
       
    }
}
