<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Job extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const MALL_PRACTICE_SELECT = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    public const PUBLISH_SELECT = [
        '1' => 'Definite',
        '0' => 'Pending',
    ];

    public const JOB_TYPE_SELECT = [
        '1' => 'Full Time',
        '2' => 'Part Time',
    ];

    public const TRAVEL_EXPENSE_SELECT = [
        '0' => 'Uncovered',
        '1' => 'Covered',
    ];

    public const CALL_REQUIRED_SELECT = [
        '1' => 'Yes',
        '0' => 'No',
        '2' => 'May be',
    ];

    public $table = 'jobs';

    protected $dates = [
        'start_time',
        'end_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'job_title',
        'job_description',
        'start_time',
        'end_time',
        'job_type',
        'is_hourly',
        'hour_rate',
        'contact_person_name',
        'contact_person_mobile',
        'contact_person_email',
        'desigantion',
        'attach_1',
        'attach_2',
        'budget',
        'mall_practice',
        'profile_id',
        'min_salary',
        'max_salart',
        'over_time',
        'call_required',
        'publish',
        'notes',
        'travel_expense',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function contractTrackers()
    {
        return $this->hasMany(Tracker::class, 'contract_id', 'id');
    }

    public function contractJobApplieds()
    {
        return $this->hasMany(JobApplied::class, 'contract_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getStartTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getEndTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEndTimeAttribute($value)
    {
        $this->attributes['end_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function skills()
    {
        return $this->belongsToMany(Speciality::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }

    public function experiences()
    {
        return $this->belongsToMany(Experience::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
