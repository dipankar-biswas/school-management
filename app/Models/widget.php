<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class widget extends Model
{
    use HasFactory;
    public function widgetLink(){
        return $this->hasMany(widgetLink::class,"wedgetid")->where("status", 1);
    }
}
