<?php

namespace Tests\Feature;

use App\Models\Portfolio;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PortfolioTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function can_sell_a_stock()
    {
        $stock = Stock::factory()->create(['available' => 100, 'price' => 5]);
        $user = User::factory()->create();

        $this->post('portfolio', [
            'user_id' => $user->id,
            'stock_id' => $stock->id,
            'quantity' => 2
        ]);

        $this->assertTrue($user->portfolio->contains('stock_id', $stock->id));
        $this->assertEquals(990, $user->fresh()->funds);

        $this->delete('portfolio/1');

        //dd($user->fresh());

        $this->assertFalse($user->portfolio->fresh()->contains('stock_id', $stock->id));
        $this->assertEquals(1000, $user->fresh()->funds);


    }
}
