<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;
    protected $primaryKey = 'exp_id';
    protected $fillable = ['resume_id', 'company_name', 'job_title', 'start_date', 'end_date', 'description'];
}