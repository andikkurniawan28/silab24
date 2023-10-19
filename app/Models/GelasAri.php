<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GelasAri extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ari(){
        return $this->belongsTo(Ari::class);
    }
}
