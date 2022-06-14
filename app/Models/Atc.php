<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atc extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tgl',
        'morning_ctr',
        'morning_ass',
        'morning_rest',
        'afternoon_ctr',
        'afternoon_ass',
        'afternoon_rest',
        'night_ctr',
        'night_ass',
        'night_rest',
        'unit',
        'remark',
        'slug',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
