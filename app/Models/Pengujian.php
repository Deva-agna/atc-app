<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengujian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'theory_twr',
        'renewed_unit_theory_twr',
        'examiner_theory_twr',
        'score_theory_twr',
        'practical_twr',
        'renewed_unit_practical_twr',
        'examiner_practical_twr',
        'score_practical_twr',
        'theory_app',
        'renewed_unit_theory_app',
        'examiner_theory_app',
        'score_theory_app',
        'practical_app',
        'renewed_unit_practical_app',
        'examiner_practical_app',
        'score_practical_app',
        'signature_and_stamp',
        'status',
        'slug',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
