<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
        protected $table = 'userdata';
        //for disabled fillable exception
        protected $guarded = [];
    use HasFactory;
}
