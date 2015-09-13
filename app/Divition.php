<?php

namespace Company;

use Illuminate\Database\Eloquent\Model;

class Divition extends Model
{
    protected $table='divitions';
    protected $fillable = ['name'];

    public function departments()
    {
        return  $this->hasMany('Company\Department');
    }
}
