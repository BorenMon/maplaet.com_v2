<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandPage extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'logo_url', 'is_active', 'folder_name', 'admin_page_id'];

    public function admin_page(){
        return $this->belongsTo(AdminPage::class);
    }

    public function artworkCategories(){
        return $this->hasMany(ArtworkCategory::class);
    }
}
