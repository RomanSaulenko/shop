@extends('client.layouts.base')

@section('content')

    @foreach($basketProducts as $product)
        <div>{{$product->id}}</div>
        <div>{{$product->price}}</div>
        <div>{{$product->qty}}</div>
    @endforeach

@endsection


