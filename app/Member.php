<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
     protected $fillable = [
        'surname', 'othername', 'fileno', 'department', 'appointment', 'rank', 'amount', 'next_of_kin', 'address', 'phone', 'image',
        'bank', 'acc_name', 'acc_no'
    ];
}
