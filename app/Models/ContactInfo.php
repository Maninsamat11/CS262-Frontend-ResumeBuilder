<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// You've already done this one, which is great!
// I've just added the resume() relationship.
class ContactInfo extends Model
{
    use HasFactory;
    protected $fillable = ['resume_id', 'full_name', 'phone', 'address', 'summary', 'photo_path'];
    protected $primaryKey = 'info_id';

    public function resume()
    {
        return $this->belongsTo(Resume::class, 'resume_id', 'resume_id');
    }
}