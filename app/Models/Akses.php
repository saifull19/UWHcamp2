<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Akses extends Model
{
    use HasFactory;
    // use SoftDeletes;

    public $table = 'akses';

    protected $dates = [
        'updated_at',
        'created_at',
    ];

    protected $guarded = [
        'id'
    ];

    // mengembalikan relationship one to many
    public function user_role()
    {
        return $this->belongsTo('App\Models\UserRole', 'user_role_id', 'id');
    }

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu', 'menu_id', 'id');
    }
}
