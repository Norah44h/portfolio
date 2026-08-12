<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['locale', 'title', 'tags', 'image', 'is_featured','description', 'extra_description', 'github_link', 'demo_link', 'image'];
}
