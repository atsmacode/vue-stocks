<?php

namespace Tests\Unit;

use App\Models\Portfolio;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class PortfolioTest extends BaseTestCase
{

    use CreatesApplication;
    //use RefreshDatabase;

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function can_purchase_a_stock()
    {
        $stock = Stock::factory()->create();
        $user = User::factory()->create();

        Portfolio::create([
            'amount' => 2,
            'value' => 5,
            'user_id' => $user->id,
            'stock_id' => $stock->id
        ]);

        $this->assertTrue($user->portfolio->contains('stock_id', $stock->id));
    }

}
