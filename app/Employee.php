<?php

namespace Company;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table='employees';
    protected $fillable = ['direction', 'expertise_area'];

    public function department()
    {
        return  $this->belongsTo('Company\Department');
    }

    public function user()
    {
        return  $this->belongsTo('Company\User');
    }
}
