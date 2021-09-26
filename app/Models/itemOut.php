<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemOut extends Model
{
    use HasFactory;

    protected $table = 'itemout';
    protected  $primaryKey = 'itemout_id';
    
}
