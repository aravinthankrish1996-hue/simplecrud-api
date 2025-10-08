<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class staff extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'id';

    protected $fillable=[
        'staffname',
        'email',
        'address',
        'phone',
        'qualification',
        'bloodtype',
        'university',
];

}
