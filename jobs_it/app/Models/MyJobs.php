<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyJobs extends Model
{
    use HasFactory;

    protected $tabel = "my_jobs";
    protected $primaryKey = "myjobs_id";
    protected $fillable = [
        'history_id',
        'action_type',
        'user_id',
        'a_id',
        'myjobs_name_company', 
        'myjobs_logo',
        'myjobs_name',
        'myjobs_quantity',
        'myjobs_salary',
        'myjobs_type',
        'myjobs_location_work',
        'myjobs_start_post',
        'myjobs_stop_post',
        'myjobs_detail',
        'myjobs_contact',
        'myjobs_address',
        'myjobs_lat',
        'myjobs_lng',
    ];
}
