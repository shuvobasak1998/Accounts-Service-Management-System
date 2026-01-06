<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamInformation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'team_informations';

    protected $fillable = [
        'team_information_top_discription',
        'team_member_name',
        'team_member_image_path',
        'team_member_designation',
        'google_address',
        'facebook_address',
        'twitter_address',
        'linkedin_address',
        'pinterest_address',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
