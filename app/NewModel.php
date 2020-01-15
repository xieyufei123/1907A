<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewModel extends Model
{
    protected $table = 'new';
    protected $primaryKey = 'nid';
    public $timestamps = false;
    protected $guarded=[];
}
