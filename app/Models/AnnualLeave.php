<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualLeave extends Model
{
    use HasFactory;

    public $fillable = [
        'employee_id',
        'start_date',
        'end_date',
        'total_days',
        'reason',
        'year',
    ];
}
