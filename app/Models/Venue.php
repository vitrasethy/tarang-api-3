<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venue extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'sport_type_id',
        'size',
        'photo',
        'description',
    ];

    public function sportType(): BelongsTo
    {
        return $this->belongsTo(SportType::class);
    }
}
