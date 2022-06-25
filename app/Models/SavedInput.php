<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedInput extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'content',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
