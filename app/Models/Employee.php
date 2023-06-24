<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'employee';
    protected $fillable = [
        'fullname', 'title', 'department', 'businessUnit', 'gender', 'ethnicity', 'age', 'salary', 'bonus', 'country', 'city'
    ];
}
