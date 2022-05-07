<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;

    protected $fillable = ['image_preview_url', 'number', 'artwork_category_id'];

    public function artworkCategory(){
        return $this->belongsTo(ArtworkCategory::class);
    }
}
