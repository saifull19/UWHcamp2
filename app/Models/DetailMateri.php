<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMateri extends Model
{
    use HasFactory;

    protected $dates = [
        'updated_at',
        'created_at'
    ];

    protected $guarded = [
        'id'
    ];

    // mengembalikan relationship one to many
    public function materi()
    {
        return $this->belongsTo('App\Models\Materi', 'materi_id', 'id');
    }
}
