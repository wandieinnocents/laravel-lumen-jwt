<?php
namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Student  extends Model{

    protected $table = 'students';

    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'email'
    ];

    protected $hidden = [];
   

    
}
