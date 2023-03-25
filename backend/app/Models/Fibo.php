<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fibo extends Model
{
    use HasFactory;

    protected $table = 'fibo';

    protected $fillable = [
        'id',
        'fibo',
        'value'
    ];
}
