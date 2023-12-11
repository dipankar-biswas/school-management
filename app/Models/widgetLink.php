<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class widgetLink extends Model
{
    use HasFactory;

    public function widget(){
        return $this->beLongsTo(widget::class,"wedgetid")->where("status", 1);
    }
}
