<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoResultado extends Model
{
    use HasFactory;
    protected $table = 'tiporesultado';
    protected $fillable = ['idEvento'];
}
