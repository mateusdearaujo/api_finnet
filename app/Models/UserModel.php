<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model {

    protected $table = 'users';

    protected $fillable = ['name', 'birth'];

    public $timestamps = false;
}
