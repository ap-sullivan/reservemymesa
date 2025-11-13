<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = ['restaurant_id', 'original_name', 'path', 'mime_type'];
}
