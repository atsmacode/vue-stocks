<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{

    private function returnAndRefresh()
    {
        return response([
            'funds' => User::find(1)->funds,
            'stocks' => Stock::all(),
            'portfolio' => Portfolio::where('user_id', 1)->with('stock')->get()],
            200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Portfolio::where('user_id', 1)->with('stock')->get(),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Portfolio::create([
            'user_id' => $request->user_id,
            'stock_id' => $request->stock_id,
            'amount' => $request->quantity,
            'value' => $request->quantity
        ]);

        DB::table('stocks')
            ->where('id', $request->stock_id)
            ->decrement('available', $request->quantity);

        DB::table('users')
            ->where('id', 1)
            ->decrement('funds', $request->quantity * Stock::find($request->stock_id)->price);

        return $this->returnAndRefresh();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);

        DB::table('stocks')
            ->where('id', $portfolio->stock_id)
            ->increment('available', $portfolio->amount);

        DB::table('users')
            ->where('id', 1)
            ->increment('funds', $portfolio->amount * Stock::find($portfolio->stock_id)->price);

        //dump($portfolio->amount);
        $portfolio->delete();

        return $this->returnAndRefresh();

    }

}
