<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
     protected $fillable = [
        'surname', 'othername', 'fileno', 'department', 'appointment', 'rank', 'amount', 'next_of_kin', 'address', 'phone', 'image',
        'bank', 'acc_name', 'acc_no', 'status', 'date_joined'
    ];
}
