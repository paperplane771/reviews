<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'rating'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function city()
    {
        $this->belongsTo(City::class);
    }
}
