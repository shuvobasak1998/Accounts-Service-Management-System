<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceInformationFrequentlyAskQuestion extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'service_information_frequently_ask_question';
    protected $fillable = [
        'service_information_id',
        'details_title',
        'detail_discription',
        'created_by',
        'updated_by',
        'deleted_by',

    ];
}
