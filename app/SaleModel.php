<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleModel extends Model
{
    protected $table = 'sale';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded=[];
}
