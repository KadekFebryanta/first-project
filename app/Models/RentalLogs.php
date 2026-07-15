<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalLogs extends Model
{
    protected $table = 'rental_logs';

    protected $fillable = [
        'user_id', 'buku_id', 'rental_date', 'return_date'
    ];
}
