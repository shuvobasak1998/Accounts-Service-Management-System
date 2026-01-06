<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutUs extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'about_us_informations';
    protected $fillable = [
        'about_us_top_discription',
        'about_us_first_image_path',
        'about_us_second_image_path',
        'about_us_feature_title',
        'about_us_feature_description',
        'why_choose_us_description',
        'topic_title',
        'percentage_value',
        'created_by',
        'updated_by',
        'deleted_by',

    ];


    public function AboutUsCardInfo()
    {
        return $this->hasMany(AboutUsCardInfo::class, 'about_us_information_id');
    }
    public function AboutUsFeatureInfo()
    {
        return $this->hasMany(AboutUsFeatureInfo::class, 'about_us_information_id');
    }
}
