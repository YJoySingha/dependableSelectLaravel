<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cityModel extends Model
{
    //
	protected $table = 'city';
	protected $primarykey = 'city_id';
	protected $fillable = ['city_name','city_code_id','city_contry_id','localities'];
}
