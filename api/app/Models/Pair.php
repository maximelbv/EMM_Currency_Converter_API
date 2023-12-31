<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pair extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_currency_id',
        'to_currency_id',
        'conversion_rate'
    ];

    public function currencyFrom()
    {
        return $this->belongsTo(Currency::class, 'from_currency_id');
    }

    public function currencyTo()
    {
        return $this->belongsTo(Currency::class, 'to_currency_id');
    }
}