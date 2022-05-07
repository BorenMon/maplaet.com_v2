<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtworkCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'folder_name', 'brand_page_id'];

    public function brandPage(){
        return $this->belongsTo(BrandPage::class);
    }

    public function artworks(){
        return $this->hasMany(Artwork::class);
    }
}
