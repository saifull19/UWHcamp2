<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Auth;

class UserRole extends Model
{
    use HasFactory, LogsActivity;
    // use SoftDeletes;

    public $table = 'user_roles';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];

    protected $guarded = [
        'id'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName(Auth::user()->name)->logOnly(['role_user'])->setDescriptionForEvent(fn(string $eventName) => "This User Role has been {$eventName}");
        
    }

    // menjadi object relationship one to many
    public function user() 
    {
        return $this->hasMany('App\Models\User', 'user_role_id');
    }
    
    public function akses() 
    {
        return $this->hasMany('App\Models\Akses', 'user_role_id');
    }
}
