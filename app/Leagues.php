<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leagues extends Model
{

    protected $table = 'leagues';

    protected $fillable = ['name','division','photo_id'];

    public function photo()
    {

        return $this->belongsTo('App\Photo');

    }

}
