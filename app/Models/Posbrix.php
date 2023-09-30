<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posbrix extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function variety(){
        return $this->belongsTo(Variety::class);
    }

    public function kawalan(){
        return $this->belongsTo(Kawalan::class);
    }

    public function kud(){
        return $this->belongsTo(Kud::class);
    }

    public function pospantau(){
        return $this->belongsTo(Pospantau::class);
    }

    public function wilayah(){
        return $this->belongsTo(Wilayah::class);
    }

}
