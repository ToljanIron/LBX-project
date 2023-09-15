<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorRecordsEmployee extends Model
{
    use HasFactory;

    protected $table = 'error_records_employees'; // Specify table name

    protected $fillable = [
        'error_data'
    ];
}
