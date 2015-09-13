<?php

namespace Company;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table='projects';
    protected $fillable = ['name','duration', 'area'];

    public function members()
    {
        return  $this->belongsToMany('Company\Employee');
    }
}
