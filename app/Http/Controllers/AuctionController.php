<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auction = Auction::all();
        return view('auction.index',compact('auction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //Validation
          $data = $request->validate([
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
            'opening' => 'required',
            'closing' => 'required',
            'category' => 'required'
        ]);

        $auction = new Auction();
        $auction->title = $request->title;
        $auction->content = $request->content;
        $auction->opening = $request->opening;
        $auction->closing = $request->closing;
        $auction->category = $request->category;
        
        if($request->hasFile('image')){
            $fileName = $request->image;
            $newName = time() .'.'. $fileName->getClientOriginalExtension();
            $image_resize = Image::make($fileName->getRealPath());
            $image_resize->resize(600,600,
                function($constraint){
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            );
            $image_resize->save(public_path('auction/' .$newName));
            $auction->image = 'auction/' .$newName; 
        }
        $auction->save();
        return redirect('auctions')->with('message','Record saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auction = Auction::findOrFail($id);
        return view('auction.edit',compact('auction'));
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
        
           //Validation
           $data = $request->validate([
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
            'opening' => 'required',
            'closing' => 'required',
            'category' => 'required'
        ]);
        

        $auction = Auction::findOrFail($id);
        $auction->title = $request->title;
        $auction->content = $request->content;
        $auction->opening = $request->opening;
        $auction->closing = $request->closing;
        $auction->category = $request->category;
        
        if($request->hasFile('image')){
            if($auction->image){
                @unlink($auction->image);
            }
            $fileName = $request->image;
            $newName = time() .'.'. $fileName->getClientOriginalExtension();
            $image_resize = Image::make($fileName->getRealPath());
            $image_resize->resize(600,600,
                function($constraint){
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            );
            $image_resize->save(public_path('auction/' .$newName));
            $auction->image = 'auction/' .$newName; 
        }
        $auction->update();
        return redirect('auctions')->with('message','Record updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $auction = Auction::findOrFail($id);
        if($auction->image){
            @unlink($auction->image);
        }
        $auction->delete();
        return redirect('auctions')->with('message','Record Deleted');
    }
}
