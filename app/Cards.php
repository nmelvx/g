<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    protected $fillable = ['user_id', 'last4', 'cardType', 'cardholderName', 'expirationMonth', 'maskedNumber', 'uniqueNumberIdentifier', 'expirationYear', 'token', 'success', 'defaultPaymentMethod'];

}
