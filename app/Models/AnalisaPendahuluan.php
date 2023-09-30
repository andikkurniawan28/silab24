<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisaPendahuluan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kud(){
        return $this->belongsTo(Kud::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
