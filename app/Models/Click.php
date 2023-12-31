<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    use HasFactory;
    
    public function link(): HasOne
    {
        return $this->hasOne(Phone::class, 'linkid');
    }
    
}
