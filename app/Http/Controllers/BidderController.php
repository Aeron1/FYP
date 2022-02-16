<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Bidder;
use Illuminate\Http\Request;

class BidderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bidder = Bidder::all();
        return view('bid.index',compact('bidder'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $data = $request->validate([
            'title' => 'required',
            'owner' => 'required',
            'bidder' => 'required',
            'phone' => 'required',
            'bid' => 'required',

        ]);

        $bidder = new Bidder();
        $bidder->title = $request->title;
        $bidder->owner = $request->owner;
        $bidder->bidder = $request->bidder;
        $bidder->phone = $request->phone;
        $bidder->bid = $request->bid;

        $bidder->save();
        return redirect('bids')->with('message','Record Saved');

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
        $bidder = Bidder::findOrFail($id);
        return view('bid.edit',compact('bidder'));
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

        //validation
        $data = $request->validate([
            'title' => 'required',
            'owner' => 'required',
            'bidder' => 'required',
            'phone' => 'required',
            'bid' => 'required',

        ]);

        $bidder = Bidder::findOrFail($id);
        $bidder->title = $request->title;
        $bidder->owner = $request->owner;
        $bidder->bidder = $request->bidder;
        $bidder->phone = $request->phone;
        $bidder->bid = $request->bid;

        $bidder->update();
        return redirect('bids')->with('message','Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bidder = Bidder::findOrFail($id);
        $bidder->delete();
        return redirect('bids')->with('message','Record deleted');
    }
}
