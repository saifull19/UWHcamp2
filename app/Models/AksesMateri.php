<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesMateri extends Model
{
    use HasFactory;

    protected $dates = [
        'updated_at',
        'created_at',
    ];

    protected $guarded = [
        'id'
    ];

    // mengembalikan relationship
    public function materi()
    {
        return $this->belongsTo('App\Models\Materi', 'materi_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }
}
