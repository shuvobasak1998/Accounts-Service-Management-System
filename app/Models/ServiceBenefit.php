<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceBenefit extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'service_information_benefits';
    protected $fillable = [
        'service_information_id',
        'service_benefit',
        'created_by',
        'updated_by',
        'deleted_by',

    ];
}
