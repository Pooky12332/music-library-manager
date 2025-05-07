<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model {
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'artist',
        'release_year',
        'format',
        'api_id',
        'shelf_id',
    ];

    public function shelf() {
        return $this->belongsTo(Shelf::class);
    }
}
