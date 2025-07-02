<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'education';
    protected $primaryKey = 'edu_id';
    
    // Make sure 'resume_id' is in the fillable array!
    protected $fillable = ['resume_id', 'school_name', 'degree', 'field', 'start_date', 'end_date'];

    // Timestamps are not in your ERD for this table. If you don't have them, add this line:
    public $timestamps = false;

    /**
     * This education entry belongs to ONE resume.
     */
    public function resume()
    {
        return $this->belongsTo(Resume::class, 'resume_id', 'resume_id');
    }
}