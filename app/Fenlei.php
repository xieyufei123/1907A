<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fenlei extends Model
{
   protected $table = 'fenlei';
    protected $primaryKey = 'fid';
    public $timestamps = false;
    protected $guarded=[];
}
