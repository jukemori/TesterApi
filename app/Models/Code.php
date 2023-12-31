<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_id',
        'code_body',
       
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
