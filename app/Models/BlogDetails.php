<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogDetails extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'blog_details';
    protected $fillable = [
        'blog_category_id',
        'card_title',
        'card_discription',
        'card_image_path',
        'blog_detail_image_path',
        'blog_detail_title',
        'blog_detail_discription',
        'created_by',
        'updated_by',
        'deleted_by',

    ];

    public function BlogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
}
