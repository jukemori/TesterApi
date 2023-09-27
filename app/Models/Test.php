<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'project_id',
        'is_successful',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function codes()
    {
        return $this->hasMany(Code::class);
    }
}
