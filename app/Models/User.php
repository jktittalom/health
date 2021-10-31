<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;
    use HasFactory;

    public const MALL_PRACTICE_SELECT = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    public const STATUS_SELECT = [
        '1' => 'Active',
        '0' => 'Inactive',
    ];

    public const USER_TYPE_SELECT = [
        '1' => 'Client',
        '2' => 'Provider',
        '3' => 'Employee',
        '4' => 'Admin',
    ];

    public $table = 'users';

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'phone',
        'password',
        'remember_token',
        'device_type',
        'device_token',
        'status',
        'mall_practice',
        'user_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function userJobs()
    {
        return $this->hasMany(Job::class, 'user_id', 'id');
    }

    public function clientTrackers()
    {
        return $this->hasMany(Tracker::class, 'client_id', 'id');
    }

    public function userNotificationSettings()
    {
        return $this->hasMany(NotificationSetting::class, 'user_id', 'id');
    }

    public function providerJobApplieds()
    {
        return $this->hasMany(JobApplied::class, 'provider_id', 'id');
    }

    public function providerSubscriptions()
    {
        return $this->hasMany(Subscription::class, 'provider_id', 'id');
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function facilties()
    {
        return $this->belongsToMany(Facility::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
