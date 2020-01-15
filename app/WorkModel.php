<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkModel extends Model
{
     protected $table = 'work'; 
    protected $primaryKey = 'wid';
    public $timestamps = false;
    protected $guarded=[];
}
