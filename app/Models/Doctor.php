<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Doctor extends Model
{
    use HasFactory;

//    public function getCreatedAtAttribute($date)
//    {
//        return Carbon::createFromFormat('Y-m-d H:i:s', $date, 'Asia/Tehran')->format('y-m-d H:i:s');
//    }
//
//    public function getUpdatedAtAttribute($date)
//    {
////         return Carbon::createFromFormat(12, 0, 0, 'Europe/London');
//    }


    public function images()
    {
        return $this->hasMany(Image::class, 'doctor_id');
    }

    public function phones()
    {
        return $this->hasMany(Phone::class, 'doctor_id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'doctor_id');
    }

    public function specialties()
    {
        return $this->belongsToMany(Specialty::class);
    }

    public function colleges()
    {
        return $this->belongsTo(College::class, 'college_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }


}
