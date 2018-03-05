<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    public static function defaultPermissions()
    {
        return [           
            'view Member',
            'add Member',
            'edit Member',
            'delete Member',
            'view Loan',
            'add Loan',
            'edit Loan',
            'delete Loan',
            'view Product',
            'add Product',
            'edit Product',
            'delete Product',
        ];
    }
}
