<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{

    protected $table = 'services';

    protected $fillable = ['name','photo_id'];

    public function photo()
    {

        return $this->belongsTo('App\Photo');

    }

}
