<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefoneUser extends Model
{
    protected $fillable = [
        'numTelefone'
    ];
    use HasFactory;
}
