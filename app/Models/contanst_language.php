<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contanst_language extends Model
{
    use HasFactory;
    /**
     * Get the user that owns the contanst_language
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function constant(): BelongsTo
    {
        return $this->belongsTo(constants::class, 'constant_id', 'id');
    }
}
