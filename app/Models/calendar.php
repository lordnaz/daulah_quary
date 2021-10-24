<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calendar extends Model
{
    use HasFactory;

    protected $table = 'report';

    protected $fillable = [
        'id',
        'title',
        'description',
        'doc_path',
        'created_by',
        'created_at',
        'updated_at',
    ];
}
