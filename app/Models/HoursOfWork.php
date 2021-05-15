<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoursOfWork extends Model
{
    use HasFactory;
    protected $fillable = ['saturday_start', 'saturday_end', 'sunday_start', 'sunday_end', 'monday_start', 'monday_end',
        'thursday_start', 'thursday_end', 'wednesday_start', 'wednesday_end', 'tuesday_start', 'end_start', 'friday_start', 'friday_end'];
}
