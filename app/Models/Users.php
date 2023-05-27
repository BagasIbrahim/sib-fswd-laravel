<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name_user',
        'email',
        'role',
        'phone',
        'address',
        'password',
    ];

    public function products()
    {
        return $this->hasMany(Products::class, ['created_by', 'verified_by'], 'id');
    }
}
