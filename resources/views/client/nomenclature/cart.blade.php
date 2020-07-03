@extends('client.layouts.base')

@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-6 border">
                <div>
                    @if($product->image)
                        <img src="{{asset('images/' . $product->image) }}" class="image-centered">
                    @else
                        <img src="{{asset('images/default.jpg')}}"
                             class="image-centered"
                        >
                    @endif
                </div>
            </div>
            <div class="col-3 ml-4">
                <div>{{ $product->title }}</div>
                <div>{{ $product->price }}</div>

                <div class="mt-3">

                    <button class="btn btn-danger">Buy</button>
                </div>
            </div>
        </div>
    </div>

@endsection


