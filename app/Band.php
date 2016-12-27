<?php

namespace App;

use App\Album;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
	public $timestamps = false;
	protected $table = 'band';


    protected $fillable = ['name', 'start_date','website','still_active'];

    public function albums()
	{
	    return $this->hasMany('App\Album', 'band_id');
	}

}
