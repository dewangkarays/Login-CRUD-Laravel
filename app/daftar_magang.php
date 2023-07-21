<?php

namespace App;

use App\role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;





class daftar_magang extends Model
{
    use SoftDeletes;

    Protected $fillable = ['nama', 'email','posisi_id', 'semester', 'universitas', 'foto'];
    protected $primaryKey = 'id';
    // protected $guarded = [];

    public function posisi()
    {
        return $this->belongsTo(role::class, 'posisi_id', 'id');
    }
}
