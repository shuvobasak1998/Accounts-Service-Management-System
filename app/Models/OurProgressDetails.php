<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OurProgressDetails extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'our_progress_detail_informations';
    protected $guarded = [];
}
