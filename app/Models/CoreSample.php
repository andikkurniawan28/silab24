<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreSample extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function posbrix(){
        return $this->belongsTo(Posbrix::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function gelas_core_sample(){
        return $this->hasOne(GelasCoreSample::class);
    }
}
