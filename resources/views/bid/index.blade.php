@extends('app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card-header">
                <h1>Bid List</h1>
            </div>
            <div class="card-header">
                <a href="/bids/create" class="btn btn-primary btn-sm">Creating Bid List</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name of the Item</th>
                            <th>Owner Name</th>
                            <th>Bidder Name</th>
                            <th>Phone Number</th>
                            <th>Bid</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($bidder as $index=> $bidder)
                     <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $bidder->title }}</td>
                        <td>{{ $bidder->owner }}</td>
                        <td>{{ $bidder->bidder }}</td>
                        <td>{{ $bidder->phone }}</td>
                        <td>{{ $bidder->bid }}</td>
                        <td>
                            <form action="/bids/{{ $bidder->id }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="/bids/{{ $bidder->id }}/edit" class="btn btn-primary btn-sm">edit</a>
                                <button type="submit"  onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm">Delete</button>
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