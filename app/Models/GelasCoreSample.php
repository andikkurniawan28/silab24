<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GelasCoreSample extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function core_sample(){
        return $this->belongsTo(CoreSample::class);
    }
}
