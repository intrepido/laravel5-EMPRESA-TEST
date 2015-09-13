<?php

namespace Company;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table='departments';
    protected $fillable = ['section', 'divition_id'];

    public function divition()
    {
        return  $this->belongsTo('Company\Divition');
    }

    public function employees()
    {
        return  $this->hasMany('Company\Employees');
    }

}
