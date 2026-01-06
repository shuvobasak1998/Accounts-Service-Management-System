<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PartnersInformation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'partners_informations';
    protected $fillable = [
        'partners_top_discription',
        'card_title',
        'card_subtitle',
        'card_image_path',
        'created_by',
        'updated_by',
        'deleted_by',

    ];
}
