<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class JobsSearch extends Model
{
    use HasFactory, Searchable;

    protected $tabel = "jobs_searches";
    protected $primaryKey = "jobs_id";
    protected $fillable = [
        'user_id', 
        'a_id', 
        'jobs_name_company', 
        'logo',
        'jobs_name',
        'jobs_quantity',
        'jobs_salary',
        'jobs_type',
        'location_work',
        'start_post',
        'stop_post',
        'jobs_detail',
        'jobs_contact',
        'jobs_address',
        'lat',
        'lng',
    ];
}
