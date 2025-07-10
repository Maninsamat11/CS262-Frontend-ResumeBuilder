<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ViewCount extends Model
{
     use HasFactory;

    /**
     * The attributes that are mass assignable.
     * This tells Laravel it's safe to fill these columns using Model::create().
     *
     * @var array
     */
    protected $fillable = [
        'resume_id',
    ];
    protected $touches = ['resume']; // The name of the relationship method
    
public function up(): void
        {
            Schema::create('view_counts', function (Blueprint $table) {
                $table->id();
                $table->foreignId('resume_id')->constrained()->onDelete('cascade');
                $table->timestamps();
            });
        }
 public function resume()
    {
        return $this->belongsTo(Resume::class, 'resume_id', 'resume_id');
    }
}
