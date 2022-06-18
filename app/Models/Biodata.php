<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'license_number_one',
        'effected_since_one',
        'license_number_two',
        'effected_since_two',
        'birth',
        'nationality',
        'sex',
        'address',
        'rating_one',
        'rating_two',
        'image',
        'slug'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
