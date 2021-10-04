<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class History extends Model
{
    use HasFactory, Searchable;

    protected $tabel = "histories";
    protected $primaryKey = "history_id";
    protected $fillable = [
        'name_prefix',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'birthday',
        'year_old',
        'profile',
        'university',
        'faculty',
        'branch',
        'gpa',
        'educational',
        'experience',
        'dominant_language',
        'language_learned',
        'charisma',
        'portfolio',
        'name_village',
        'home_number',
        'alley',
        'road',
        'district',
        'canton',
        'province',
        'postal_code',
        'my_name_village',
        'my_home_number',
        'my_alley',
        'my_road',
        'my_district',
        'my_canton',
        'my_province',
        'my_postal_code',
    ];
}
