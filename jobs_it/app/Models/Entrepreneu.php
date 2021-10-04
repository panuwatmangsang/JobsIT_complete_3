<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrepreneu extends Model
{
    use HasFactory;

    protected $tabel = "entrepreneus";
    protected $primaryKey = "ent_id";
    protected $fillable = [
        'ent_name', 
        'ent_nature_work',
        'ent_name_contact',
        'ent_phone',
        'ent_email',
        'ent_password',
        'ent_location',
    ];
}
