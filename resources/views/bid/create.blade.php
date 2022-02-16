@extends('app')
@section('content')
<div class="row">
    <div class="col-md-6">
        <h1 class="m-0">Bid List</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="/bids" class="btn btn-primary btn-sm">Back</a>
            </div>

            <div class="card-body">
                <form action="/bids" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Name of the Item</label>
                    <input id="title" class="form-control" type="text" name="title">
                </div>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-group">
                    <label for="owner">Owner Name</label>
                    <input id="owner" class="form-control" type="text" name="owner">
                </div>
                @error('owner')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-group">
                    <label for="bidder">Bidder Name</label>
                    <input id="bidder" class="form-control" type="text" name="bidder">
                </div>
                @error('bidder')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input id="phone" class="form-control" type="number" name="phone">
                </div>
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-group">
                    <label for="bid">Bid</label>
                    <input id="bid" class="form-control" type="text" name="bid">
                </div>
                @error('bid')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <button type="submit" class="btn btn-primary btn-sm my-2">Submit</button>


                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection