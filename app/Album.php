<?php

namespace App;

use App\Band;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
	public $timestamps = false;
	protected $table = 'album';

    protected $fillable = ['band_id', 'name', 'recorded_date','release_date','number_of_tracks','label','producer','genre'];

    public function band()
    {
        return $this->belongsTo('App\Band');
    }
}
