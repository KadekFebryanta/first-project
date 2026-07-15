<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RentalLogs extends Model
{
    protected $table = 'rental_logs';

    protected $fillable = [
        'user_id', 'buku_id', 'rental_date', 'return_date'
    ];

    /**
     * Get the user that owns the RentalLogs
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    /**
     * Get the user that owns the RentalLogs
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }
}
