<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projetos extends Model
{
    use HasFactory;
    protected $table = 'projetos';
    use SoftDeletes;
}
