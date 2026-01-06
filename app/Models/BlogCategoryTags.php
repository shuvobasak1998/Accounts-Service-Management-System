<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategoryTags extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'blog_category_tags';
    protected $fillable = [
        'blog_category_id',
        'tag_id',
        'created_by',
        'updated_by',
        'deleted_by',

    ];
    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
}
