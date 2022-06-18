<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppPractical extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pengujian_id',
        'practical',
        'renewed_until',
        'examiner',
        'score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengujian()
    {
        return $this->belongsTo(Pengujian::class);
    }
}
