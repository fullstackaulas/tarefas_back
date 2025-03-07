<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Arquivos extends Model
{
    use HasFactory;

    protected $table = 'arquivos';
    use SoftDeletes;
}
