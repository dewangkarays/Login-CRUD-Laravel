<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;





class daftar_magang extends Model
{
    use SoftDeletes;

    Protected $fillable = ['nama', 'email', 'semester', 'universitas', 'foto'];
    protected $primaryKey = 'id';
    // protected $guarded = [];
}
