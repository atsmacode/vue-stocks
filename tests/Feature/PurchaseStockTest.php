<?php

namespace Tests\Feature;

use App\Models\Portfolio;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PurchaseStockTest extends TestCase
{

    use RefreshDatabase;

    private function purchaseStock($stock, $user, $quantity)
    {
        $this->post('stock/order', [
            'user_id' => $user->id,
            'stock_id' => $stock->id,
            'quantity' => $quantity
        ]);
    }

    private function sellStock($stock, $user, $quantity)
    {
        $this->post('stock/sell', [
            'user_id' => $user->id,
            'stock_id' => $stock->id,
            'quantity' => $quantity
        ]);
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function can_purchase_a_stock()
    {

        $stock = Stock::factory()->create(['available' => 100, 'price' => 5]);
        $user = User::factory()->create();

        $this->purchaseStock($stock, $user, 2);

        $this->assertTrue($user->portfolio->contains('stock_id', $stock->id));
        $this->assertEquals(98, $stock->fresh()->available);
        $this->assertEquals(990, $user->fresh()->funds);

    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function can_sell_a_stock()
    {

        $stock = Stock::factory()->create(['available' => 100, 'price' => 5]);
        $user = User::factory()->create();

        $this->purchaseStock($stock, $user, 2);

        $this->assertTrue($user->portfolio->contains('stock_id', $stock->id));
        $this->assertEquals(990, $user->fresh()->funds);
        $this->assertEquals(98, $stock->fresh()->available);


        $this->sellStock($stock, $user, 2);

        $this->assertFalse($user->portfolio->fresh()->contains('stock_id', $stock->id));
        $this->assertEquals(1000, $user->fresh()->funds);
        $this->assertEquals(100, $stock->fresh()->available);

    }
}
