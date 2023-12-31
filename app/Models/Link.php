<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    
    public function clicks(): HasMany
    {
        return $this->hasMany(Click::class, "linkid");
    }
}
