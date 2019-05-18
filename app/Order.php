<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'paypal_id',
        'type',
        'service',
        'line',
        'rank',
        'server_id',
        'hours',
        'now_league_id',
        'now_division_id',
        'next_league_id',
        'next_division_id',
        'queue_id',
        'game_service',
        'games',
        'price',
        'pay_status',
        'status'
    ];

    public function league()
    {

        return $this->belongsTo('App\Leagues');

    }

    public function division()
    {

        return $this->belongsTo('App\Division');

    }

    public function server()
    {

        return $this->belongsTo('App\Server');

    }

    public function queue()
    {

        return $this->belongsTo('App\Queue');

    }
}
