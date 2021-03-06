<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purpose extends Model
{
    use SoftDeletes;

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
