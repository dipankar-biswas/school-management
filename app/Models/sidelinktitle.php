<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sidelinktitle extends Model
{
    use HasFactory;

    public function sidelink(){
        return $this->hasMany(sidelink::class,"sltid")->where("status", 1);
    }
}
