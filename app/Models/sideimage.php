<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sideimage extends Model
{
    use HasFactory;
    
    public function sidelinktitle(){
        return $this->beLongsTo(sidelinktitle::class,"sltid");
    }
}
