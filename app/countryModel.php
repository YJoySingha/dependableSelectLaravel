<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class countryModel extends Model
{
    //
	protected $table = 'country';
	protected $primarykey = 'c_id';
	protected $fillable = ['c_name'];
	
}
