@extends('client.layout')

@section('content')

<main role="main">

    <div class="container mt-3">
        <div class="row">
            <div class="col">
                {{ $products }}
            </div>
        </div>

        <div class="row ml-1">
            <div class="col">
                <div class="row">

                    @foreach($products as $product)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <a href="/categories/{{ $product->id }}">
                                    @if($product->image)
                                    <img src="{{asset('images/' . $product->image) }}" class="img-fluid">
                                    @else
                                    <img src="{{asset('images/default.jpg')}}" class="img-fluid">
                                    @endif
                                </a>
                                <div class="text-center">
                                    <a href="{{route('category.products', ['categoryId' => $product->id])}}">{{$product->title}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                {{ $products }}
            </div>
        </div>
    </div>

</main>

@endsection


