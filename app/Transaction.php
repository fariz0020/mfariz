<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'value', 'description', 'id_saving', 'id_type',
    ];

    public function type() {
        return $this->hasOne('App\TransactionType', 'id', 'id_type');
    }

    public function savingx() {
        return $this->belongsTo('App\Saving', 'id_saving', 'id');
    }
}
