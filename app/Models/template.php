<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class template extends Model
{
    use HasFactory;
    protected $table = 'template';
    protected $primaryKey = 'id';
    protected $fillable = [
        
       'template',
       'tempname'

        ];
    


    


    


  

}

