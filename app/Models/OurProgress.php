<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OurProgress extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'our_progress_informations';
    protected $fillable = [
        'progress_top_discription',
        'first_image_path',
        'second_image_path',
        'third_image_path',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    public function OurProgressDetails()
    {
        return $this->hasMany(OurProgressDetails::class, 'our_progress_information_id');
    }
}
