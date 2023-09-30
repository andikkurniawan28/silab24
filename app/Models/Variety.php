<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variety extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function posbrix(){
        return $this->hasMany(Posbrix::class);
    }
}