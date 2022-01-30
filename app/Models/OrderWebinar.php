<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class OrderWebinar extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = 'order_webinar';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];

    protected $guarded = [
        'id'
    ];
}
