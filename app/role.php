<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table = "roles";
    protected $primaryKey = "id";
    protected $fillable = ['id','posisi'];

    public function daftar_magang()
    {
        return $this->hasMany(daftar_magang::class, 'id', 'posisi_id');
    }
}
