<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutUsFeatureInfo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'about_us_feature';
    protected $fillable = [
        'about_us_information_id',
        'about_us_feature',
        'created_by',
        'updated_by',
        'deleted_by',

    ];
}
