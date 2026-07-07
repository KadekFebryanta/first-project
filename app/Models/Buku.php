<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use Sluggable;
    // Beri tahu Laravel nama tabel yang sebenarnya
    protected $table = 'buku';
    protected $fillable = [
        'kode_buku', 'title', 'cover', 'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
