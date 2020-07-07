@extends('client.layouts.base')

@section('content')

    @foreach($basketProducts as $item)
        <div class="row">
            <div class="col-4">
                <img src="{{ asset($item->model->image)}}">
            </div>
            <div class="col-2">{{$item->name}}</div>
            <div class="col-2">{{$item->qty}}</div>
            <div class="col-2">{{$item->price}}</div>
        </div>
    @endforeach

@endsection


