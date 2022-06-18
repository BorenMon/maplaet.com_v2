<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedImage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'artwork_id',
        'type',
        'url'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function artworks()
    {
        return $this->belongsToMany(Artwork::class);
    }
}
