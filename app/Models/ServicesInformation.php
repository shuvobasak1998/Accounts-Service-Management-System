<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServicesInformation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'service_informations';
    protected $fillable = [
        'services_top_discription',
        'services_card_title',
        'services_card_subtitle',
        'services_card_discription',
        'services_card_image_path',
        'service_overview',
        'service_category_id',
        'service_attachment_path',
        'performance_discription',
        'performance',
        'created_by',
        'updated_by',
        'deleted_by',

    ];
    // protected $casts = [
    //     'performance' => 'array',
    // ];
    public function ServiceBenefits()
    {
        return $this->hasMany(ServiceBenefit::class, 'service_information_id');
    }
    public function ServiceAskQuestion()
    {
        return $this->hasMany(ServiceInformationFrequentlyAskQuestion::class, 'service_information_id');
    }
    public function SetviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }
}
