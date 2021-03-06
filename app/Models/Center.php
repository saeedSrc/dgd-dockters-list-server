<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;
    public function images()
    {
        return $this->hasMany(Image::class, 'center_id');
    }

    public function phones()
    {
        return $this->hasMany(Phone::class, 'center_id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'center_id');
    }


    public function specialTests()
    {
        return $this->belongsToMany(SpecialTest::class, 'center_special_test')->withPivot('id');
    }

    public function insuranceCompanies()
    {
        return $this->belongsToMany(InsuranceCompany::class, 'center_insurance_company')->withPivot('id');
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'center_doctor')->withPivot('id');
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

    public function centerType()
    {
        return $this->belongsTo(CenterType::class, 'type_id');
    }
}
