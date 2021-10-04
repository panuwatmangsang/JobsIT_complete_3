<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ent_Profile extends Model
{
    use HasFactory;

    protected $tabel = "ent__profiles";
    protected $primaryKey = "profile_company_id";
    protected $fillable = [
        'profile_name_company', 
        'profile_logo',
        'profile_company_contact',
        'profile_company_phone',
        'profile_email',
        'profile_company_address',
        'profile_lat',
        'profile_lng',
    ];
}
