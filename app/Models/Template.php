<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * THIS IS THE LINE THAT FIXES THE ERROR.
     * It tells Eloquent that the key is 'template_id', not 'id'.
     *
     * @var string
     */
    protected $primaryKey = 'template_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'status',
        'template_html',
        'template_url',
    ];
}