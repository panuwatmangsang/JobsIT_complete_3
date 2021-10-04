<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{
    use HasFactory;

    protected $tabel = "applicants";
    protected $primaryKey = "app_id";
    protected $fillable = [
        'app_name', 
        'app_email',
        'app_password',
    ];
}
