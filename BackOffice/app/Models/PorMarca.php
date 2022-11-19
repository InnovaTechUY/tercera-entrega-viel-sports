<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PorMarca extends Model
{
    use HasFactory;
    protected $table = 'pormarca';
    protected $fillable = ['ascendente'];
}
