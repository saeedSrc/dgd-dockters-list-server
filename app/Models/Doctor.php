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
}
