<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    protected $fillable = [
        'name', 'code', 'description',
    ];

    public function transaction() {
        return $this->belongsTo('App\Transaction');
    }
}
