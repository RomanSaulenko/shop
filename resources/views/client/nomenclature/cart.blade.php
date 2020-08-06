@extends('client.layouts.base')

@section('content')

        <div class="row mt-3">
            <div class="col-4 border">
                <div>
                    @if($product->image)
                        <img src="{{asset($product->image) }}" class="img-fluid">
                    @else
                        <img src="{{asset('images/default.jpg')}}"
                             class="img-fluid">
                    @endif
                </div>
            </div>
            <div class="col-5 ml-4">
                <div>{{ $product->title }}</div>
                <div>{{ $product->price }}</div>

                <div class="mt-3">

                    <button class="btn btn-danger" onclick="Cart.add({{ $product->id }}, {model:'nomenclature'});">{{__('nomenclature.Add_to_cart')}}</button>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="desc-tab" data-toggle="tab" href="#desc"
                       role="tab" aria-controls="home" aria-selected="true">DESCRIPTION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                       role="tab" aria-controls="profile" aria-selected="false">PRODUCT INFO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                       role="tab" aria-controls="contact" aria-selected="false">REVIEWS</a>
                </li>
            </ul>
        </div>
        <div class="row mt-5">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="desc" role="tabpanel" aria-labelledby="desc-tab">
                    {{$product->description}}
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div>INfo todo.............................</div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div>reviews todo.............................</div>
                </div>
            </div>
        </div>

@endsection


