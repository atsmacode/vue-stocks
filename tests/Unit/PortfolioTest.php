<?php

namespace Tests\Unit;

use App\Models\Portfolio;
use App\Models\Stock;
use App\Models\User;
use App\StockBroker;
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
    public function a_portfolio_can_be_created_for_a_user()
    {
        $stock = Stock::factory()->create(['available' => 100, 'price' => 5]);
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
