<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

final class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees'; // Specify table name
    public $timestamps = false; // Disabled timestamps

    protected $fillable = [
        'emp_id',
        'name_prefix',
        'first_name',
        'middle_initial',
        'last_name',
        'gender',
        'e_mail',
        'date_of_birth',
        'time_of_birth',
        'age_in_yrs',
        'date_of_joining',
        'age_in_company_years',
        'phone_no',
        'place_name',
        'county',
        'city',
        'zip',
        'region',
        'user_name',
    ];

    protected function dateOfBirth(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                try {
                    return Carbon::createFromFormat('m/d/Y', $value);
                } catch (\Exception $e) {

                    return null;
                }
            }
        );
    }

    protected function DateOfJoining(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                try {
                    return Carbon::createFromFormat('m/d/Y', $value);
                } catch (\Exception $e) {

                    return null;
                }
            }
        );
    }

    protected function TimeOfBirth(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                try {
                    return date('H:i:s', strtotime($value));
                } catch (\Exception $e) {

                    return null;
                }
            }
        );
    }

    protected function AgeInYrs(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => floatval($value),
        );
    }

    protected function AgeInCompanyYears(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => floatval($value),
        );
    }
}
