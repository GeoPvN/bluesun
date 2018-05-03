<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    protected $table = 'teams';

    protected $fillable = ['name','photo_id','position_id'];

    public function photo()
    {

        return $this->belongsTo('App\Photo');

    }

    public function position()
    {

        return $this->belongsTo('App\Position');

    }

}
