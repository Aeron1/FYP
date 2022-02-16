@extends('app')
@section('content')
<div class="row">
    <div class="col-sm-6">
        <h1 class="m-0">Auction</h1>
      </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card-header">
                <h2 class="float-left text-info">Edit, View Auction</h2>
                <a href="/auctions/create" class="btn btn-primary btn-sm float-right">Create New Auction</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Item Descripttion</th>
                            <th>Opening Price</th>
                            <th>Buying Price</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($auction as $index=> $auction)
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td><img src="{{ asset($auction->image) }}" alt="{{ $auction->title }}" width="70"></td>
                            <td>{{ $auction->title }}</td>
                            <td>{!! $auction->content !!}</td>
                           <td>{{ $auction->opening }}</td>
                           <td>{{ $auction->closing }}</td>
                           <td>{{ $auction->category }}</td>
                            <td>
                                <form action="/auctions/{{ $auction->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="/auctions/{{ $auction->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm">Delete</button>

                                </form>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    
@endsection