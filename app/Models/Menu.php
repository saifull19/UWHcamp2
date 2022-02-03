<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    // use SoftDeletes;

    public $table = 'menu';

    protected $dates = [
        'updated_at',
        'created_at',
    ];

    protected $guarded = [
        'id'
    ];

    // menjadi object relationship one to many
    public function akses() 
    {
        return $this->hasMany('App\Models\Akses', 'menu_id');
    }
}
