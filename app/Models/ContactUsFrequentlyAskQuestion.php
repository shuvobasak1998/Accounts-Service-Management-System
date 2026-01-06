<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactUsFrequentlyAskQuestion extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'contact_us_frequently_ask_question_infos';
    protected $guarded = [];
}
