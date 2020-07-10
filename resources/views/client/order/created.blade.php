@extends('client.layouts.base')

@section('content')
    <div class="row">
        <div class="col"><h3>{{__('order.Thank_you')}}</h3></div>
    </div>
    <div class="row">
        <div class="col">
            {{ __('order.To_pay') }}: {{$total}}
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="{{route('index')}}">{{ __('order.Back_to_catalog') }}</a>
        </div>
    </div>

@endsection


