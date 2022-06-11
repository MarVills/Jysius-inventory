<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddUser extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $fillable=[
        'first_name',
        'last_name',
        'email',
        'password', 
        'role_id' , 
        'branch_id',
        // 'user_type', 
        // 'branch_id',
    ];
}
