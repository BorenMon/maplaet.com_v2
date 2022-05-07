<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminPage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo_url', 'is_active', 'folder_name'];

    public function brand_pages() {
        return $this->hasMany(BrandPage::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}
