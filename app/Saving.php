<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    protected $fillable = [
        'no_saving', 'balance', 'id_user',
    ];

    public function transactions() {
        return $this->hasMany('App\Transaction', 'id_saving', 'id');
    }
}
