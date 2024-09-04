<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    // Specify the fields that are mass assignable
    protected $fillable = [
        'name',
        'gallery_description',
        'thumbnail',
        'user_id', // Assuming you have a user_id foreign key
    ];

    // Define the relationship with the User model
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Photo model
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
