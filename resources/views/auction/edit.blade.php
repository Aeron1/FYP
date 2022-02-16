@extends('app')
@section('content')
<div class="row">
    <div class="col-sm-6">
        <h1 class="m-0">Auction Edit Page</h1>
      </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="float-left text-info">Edit Auction</h2>
                <a href="/auction" class="btn btn-primary btn-sm float-right">Back</a>
            </div>
            <div class="card-body">
                <form action="/auctions/{{ $auction->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div>
                        <img src="{{ asset($auction->image) }}" alt="{{ $auction->title }}" width="100">
                    </div>
                    <div class="form-group">
                        <label for="image">Do You want to change the Image?</label>
                        <input id="image" class="form-control-file" type="file" name="image">
                    </div>
                   
                    <div>
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Name of the Item</label>
                        <input id="title" class="form-control" type="text" name="title" value="{{ $auction->title }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Item Description</label>
                        <textarea id="content" class="form-control" name="content" rows="3">{{ $auction->content }}</textarea>
                    </div>
                    @error('content')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                    <div class="form-group">
                        <label for="opening">Opening price</label>
                        <input id="opening" class="form-control" type="text" name="opening" value="{{ $auction->opening }}">
                    </div>
                    @error('opening')
                        <span class="opening">{{ $message }}</span>
                    @enderror

                    <div class="form-group py-2">
                        <label for="closing">Closing price</label>
                        <input id="closing" class="form-control" type="text" name="closing" value="{{ $auction->closing }}">
                    </div>
                    @error('closing')
                        <span class="closing">Closing price</span>
                    @enderror

                    
                    <div class="form-group py-2">
                        <label for="category">Category</label>
                        <select name="category" id="category">
                            <option value="car">Car</option>
                            <option value="bike">Bike</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                        
                    @enderror

                
                    <button type="submit" class="btn btn-primary ">Update Donate Record</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection