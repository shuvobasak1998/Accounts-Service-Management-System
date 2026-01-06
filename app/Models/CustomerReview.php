<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerReview extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'customer_reviews';
    protected $fillable = [
        'customer_reviews_top_discription',
        'customer_review',
        'customer_image_path',
        'customer_name',
        'customer_designation',
        'customer_organization',
        'created_by',
        'updated_by',
        'deleted_by',

    ];
}
