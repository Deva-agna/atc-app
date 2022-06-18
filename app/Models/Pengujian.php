<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengujian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'signature_and_stamp',
        'status',
        'slug',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function twrTheory()
    {
        return $this->hasOne(TwrTheory::class);
    }
    public function appTheory()
    {
        return $this->hasOne(AppTheory::class);
    }
    public function appPractical()
    {
        return $this->hasOne(AppPractical::class);
    }
    public function twrPractical()
    {
        return $this->hasOne(TwrPractical::class);
    }
}
