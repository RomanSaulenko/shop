@extends('client.layout')

@section('header')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Place for slider</h1>
        </div>
    </section>
@endsection

@section('sidebar')
    <div class="col-2 ml-2 border-right">
        <form>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="From">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="To">
                </div>
            </div>
        </form>
    </div>
@endsection

@section('content')

    <div class="col-6">
        <div class="row ml-1 mb-4">
            <div class="col">
                <div class="row">

                    @foreach($categories as $category)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <a href="/categories/{{ $category->id }}">
                                        @if($category->image)
                                            <img src="{{asset('images/' . $category->image) }}" class="img-fluid">
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
    </div>

@endsection


