<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Photo extends Model
{
    use HasFactory;

    public function gallery(){
        return $this->belongsTo(Gallery::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function shares(){
        return $this->hasMany(Share::class);
    }
}
