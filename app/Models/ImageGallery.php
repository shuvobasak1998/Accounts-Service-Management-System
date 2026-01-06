<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImageGallery extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'gallery_images';
    protected $fillable = ['image_path'];
}

