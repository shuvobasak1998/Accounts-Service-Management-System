<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactUsInformation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'contact_us_informations';
    protected $fillable = [
        'contact_us_top_title',
        'contact_us_top_discription',
        'contact_us_image_path',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    public function ContactUsFrequentlyAskQuestion()
    {
        return $this->hasMany(ContactUsFrequentlyAskQuestion::class, 'contact_us_information_id');
    }
}
