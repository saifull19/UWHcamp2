<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class WebinarStatus extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = 'webinar_status';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];

    protected $guarded = [
        'id'
    ];
}
