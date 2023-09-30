<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ari extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function posbrix(){
        return $this->belongsTo(Posbrix::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
