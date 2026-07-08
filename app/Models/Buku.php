<?php

namespace App\Models;

use App\Models\Kategori;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{
    use Sluggable;
    use SoftDeletes;
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

    public function kategories(): BelongsToMany
    {
        return $this->belongsToMany(Kategori::class,'kategori_buku', 'buku_id', 'kategori_id');
    }
}
