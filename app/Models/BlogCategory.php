<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'blog_categories';
    protected $fillable = [
        'name',
        'slug',
        'created_by',
        'updated_by',
        'deleted_by',

    ];
    public function blogCategoryTagInfo()
    {
        return $this->hasMany(BlogCategoryTags::class, 'blog_category_id');
    }
}
