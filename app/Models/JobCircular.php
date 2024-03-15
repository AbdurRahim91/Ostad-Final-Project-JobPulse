<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCircular extends Model
{
    use HasFactory;
    protected $fillable = [
        'organization_name','designation','application_deadline','company_logo','vacancy_count','job_location','minimum_salary','published_date','requirements','responsibilities','benefits','employment_status','experience','education'
    ];
}
