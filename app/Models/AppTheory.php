<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppTheory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pengujian_id',
        'theory',
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
