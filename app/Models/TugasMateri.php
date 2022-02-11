<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasMateri extends Model
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
    
    // mengembalikan relationship one to many
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }


}
