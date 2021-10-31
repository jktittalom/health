<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'facilities';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'address_1',
        'address_2',
        'city',
        'state',
        'postal_code',
        'country',
        'lat',
        'lng',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function facilityUserDetails()
    {
        return $this->hasMany(UserDetail::class, 'facility_id', 'id');
    }

    public function faciltyUsers()
    {
        return $this->belongsToMany(User::class);
    }

    public function facilityJobs()
    {
        return $this->belongsToMany(Job::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
