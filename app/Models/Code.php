<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_body',
        'test_id'
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function suggestion()
    {
        return $this->belongsTo(Suggestion::class);
    }
}
