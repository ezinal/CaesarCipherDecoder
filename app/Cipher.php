<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cipher extends Model
{
    protected $fillable = ['cipher','shift_number','decode_option'];
}
