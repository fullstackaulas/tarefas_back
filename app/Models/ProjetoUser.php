<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoUser extends Model
{
    use HasFactory;
    public $timestamps = false;

    public $incrementing = false;
    protected $table = 'projeto_user';
}
