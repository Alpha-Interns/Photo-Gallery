<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function photos():HasMany{
        return $this->hasMany(Photo::class);
    }
    public function shares():HasMany{
        return $this->hasMany(Share::class);
    }
}
