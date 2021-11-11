<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sellTo($user, $quantity)
    {
        User::find($user)->buyPortfolio([
            'stock_id' => $this->id,
            'amount' => $quantity,
            'value' => $quantity * $this->price
        ]);

        $this->decrement('available', $quantity);
    }

    public function sellFrom($user, $quantity)
    {
        User::find($user)->sellPortfolio([
            'stock_id' => $this->id,
            'amount' => $quantity,
            'value' => $quantity * $this->price
        ]);

        $this->increment('available', $quantity);
    }
}
