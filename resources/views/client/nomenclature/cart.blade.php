@extends('client.layouts.base')

@section('content')

        <div class="row mt-3">
            <div class="col-4 border">
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
                    <a class="nav-link" id="desc-tab" data-toggle="tab" href="#desc"
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

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="desc" role="tabpanel" aria-labelledby="desc-tab">
                    {{$product->description}}
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h3>Corsair Gaming Series GS600 Features:</h3>
                    <li>It supports the latest ATX12V v2.3 standard and is backward compatible with ATX12V 2.2 and ATX12V 2.01 systems</li>
                    <li>An ultra-quiet 140mm double ball-bearing fan delivers great airflow at an very low noise level by varying fan speed in response to temperature</li>
                    <li>80Plus certified to deliver 80% efficiency or higher at normal load conditions (20% to 100% load)</li>
                    <li>0.99 Active Power Factor Correction provides clean and reliable power</li>
                    <li>Universal AC input from 90~264V — no more hassle of flipping that tiny red switch to select the voltage input!</li>
                    <li>Extra long fully-sleeved cables support full tower chassis</li>
                    <li>A three year warranty and lifetime access to Corsair’s legendary technical support and customer service</li>
                    <li>Over Current/Voltage/Power Protection, Under Voltage Protection and Short Circuit Protection provide complete component safety</li>
                    <li>Dimensions: 150mm(W) x 86mm(H) x 160mm(L)</li>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <h3>Corsair Gaming Series GS600 Features:</h3>
                    <li>It supports the latest ATX12V v2.3 standard and is backward compatible with ATX12V 2.2 and ATX12V 2.01 systems</li>
                    <li>An ultra-quiet 140mm double ball-bearing fan delivers great airflow at an very low noise level by varying fan speed in response to temperature</li>
                    <li>80Plus certified to deliver 80% efficiency or higher at normal load conditions (20% to 100% load)</li>
                    <li>0.99 Active Power Factor Correction provides clean and reliable power</li>
                    <li>Universal AC input from 90~264V — no more hassle of flipping that tiny red switch to select the voltage input!</li>
                    <li>Extra long fully-sleeved cables support full tower chassis</li>
                    <li>A three year warranty and lifetime access to Corsair’s legendary technical support and customer service</li>
                    <li>Over Current/Voltage/Power Protection, Under Voltage Protection and Short Circuit Protection provide complete component safety</li>
                    <li>Dimensions: 150mm(W) x 86mm(H) x 160mm(L)</li>
                </div>
            </div>
        </div>

@endsection


