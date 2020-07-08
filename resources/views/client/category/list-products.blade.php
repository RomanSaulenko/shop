@extends('client.layouts.base')


@section('content')
    <div class="row">
        <div class="col-2 border-right mt-3">
            <form method="GET" id="send_filter">
                <div class="form-group">
                    <label>Price</label>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="filter[price_from]" value="{{$requestData['filter']['price_from'] ?? ''}}" class="form-control" placeholder="From">
                        </div>
                        -
                        <div class="col">
                            <input type="text" name="filter[price_to]" value="{{$requestData['filter']['price_to'] ?? ''}}" class="form-control" placeholder="To">
                        </div>

                    </div>
                </div>
                <button type="submit" form="send_filter" class="btn btn-primary">Find</button>
                <button type="submit" form="clear_form" class="btn btn-success">Clear</button>
            </form>
            <form method="GET" id="clear_form">

            </form>
        </div>

        <div class="col-10 mt-3">

            <div class="row ml-1">

                @foreach($products as $product)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('category.product', ['productId' => $product->id]) }}">
                                    @if($product->image)
                                        <img src="{{asset($product->image) }}" class="img-fluid">
                                    @else
                                        <img src="{{asset('images/default.jpg')}}" class="img-fluid">
                                    @endif
                                </a>
                                <div class="text-center">
                                    <a href="{{route('category.products', ['categoryId' => $product->id])}}">{{$product->title}} {{$product->brand->name}}</a>
                                </div>
                                <div>
                                    {{$product->price}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mt-3">
                <div class="col">
                    {{ $products }}
                </div>
            </div>

        </div>
    </div>


@endsection


