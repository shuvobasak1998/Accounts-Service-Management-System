<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessInfo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'short_code',
        'welcome_msg_title',
        'welcome_msg_subtitle',
        'welcome_msg_discription',
        'business_logo_path',
        'address',
        'mobile',
        'telephone',
        'email',
        'web_address',
        'facebook_address',
        'twitter_address',
        'linkedin_address',

    ];
}

