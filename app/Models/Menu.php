<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Auth;

use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, LogsActivity;
    

    public $table = 'menu';
    
    protected static $recordEvents = ['created', 'updated', 'deleted'];
    protected static $logAttributes = ['nama_menu'];
    
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


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName(Auth::user()->name)->logOnly(['nama_menu'])->setDescriptionForEvent(fn(string $eventName) => "This MENU has been {$eventName}");
        // Chain fluent methods for configuration options
    }
}
