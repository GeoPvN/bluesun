<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{

    protected $table = 'projects';

    protected $fillable = ['name','photo_id','services_id','description'];

    public function photo()
    {

        return $this->belongsTo('App\Photo');

    }

    public function services()
    {

        return $this->belongsTo('App\Services');

    }

}
