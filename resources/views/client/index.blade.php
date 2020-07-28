@extends('client.layouts.base')

@section('header')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Place for slider</h1>
        </div>
    </section>
@endsection

@section('content')
    <div class="row ml-1 mb-4">
        <div class="col">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <a href="/categories/{{ $category->id }}">
                                    @if($category->image)
                                        <img src="{{asset($category->image) }}" class="img-fluid">
                                    @else
                                        <img src="{{asset('images/default.jpg')}}" class="img-fluid">
                                    @endif
                                </a>
                                <div class="text-center">
                                    <a href="{{route('category.products', ['categoryId' => $category->id])}}">{{$category->title}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection


