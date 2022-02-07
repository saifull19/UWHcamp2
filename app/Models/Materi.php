<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Auth;

class Materi extends Model
{
    use HasFactory, LogsActivity;

    protected $dates = [
        'updated_at',
        'created_at'
    ];

    protected $guarded = [
        'id'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName(Auth::user()->name)->logOnly(['title'])->setDescriptionForEvent(fn(string $eventName) => "This Materi has been {$eventName}");
        
    }

    // mengembalikan relationship
    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id', 'id');
    }

    // menjadi objeck relationship
    public function akses_materi()
    {
        return $this->hasMany('App\Models\AksesMateri', 'materi_id');
    }
}
