<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * @property int $resume_id
 * @property int $user_id
 * @property int $template_id
 * @property string $name
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Template $template
 * @property-read \App\Models\ContactInfo|null $contactInfo
 * @property-read Collection|\App\Models\Experience[] $experiences
 * @property-read Collection|\App\Models\Education[] $educations
 * @property-read Collection|\App\Models\Skill[] $skills
 * @property-read Collection|\App\Models\ViewCount[] $viewCounts
 */
class Resume extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'resume_id';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'template_id',
        'name',
        'description',
        'status',
        'image_url',
        'code',
        'share_url',
    ];

    /**
     * Get the user that owns the resume.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the template for the resume.
     */
    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id', 'template_id');
    }

    /**
     * Get the contact info for the resume.
     */
    public function contactInfo()
    {
        return $this->hasOne(ContactInfo::class, 'resume_id', 'resume_id');
    }

    /**
     * Get all of the experiences for the resume.
     */
    public function experiences()
    {
        return $this->hasMany(Experience::class, 'resume_id', 'resume_id');
    }

    /**
     * Get all of the education for the resume.
     */
    public function educations()
    {
        return $this->hasMany(Education::class, 'resume_id', 'resume_id');
    }

    /**
     * Get all of the skills for the resume.
     */
    public function skills()
    {
        return $this->hasMany(Skill::class, 'resume_id', 'resume_id');
    }
    
    /**
     * Get all of the view counts for the resume.
     */
    public function viewCounts()
    {
        return $this->hasMany(ViewCount::class, 'resume_id', 'resume_id');
    }
}