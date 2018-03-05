<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['name', 'fileno', 'department', 'type_of_loan', 'date_of_appointment', 'rank', 'date_joined', 'amount_saved', 'date_of_last_loan',
    'amount_outstanding', 'amount_of_advance', 'period_of_payment', 'purpose_of_loan', 'phone', 'e_account', 'status'];
}
