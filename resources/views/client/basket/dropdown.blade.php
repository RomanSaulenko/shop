
<div class="row total-header-section">
    <div class="col-lg-8 col-sm-8 col-8 total-section text-right ">
        <p>{{__('common.Total')}}: <span class="text-info">{{$total}}</span></p>
    </div>
</div>

@foreach($basketProducts as $item)
    <div class="row cart-detail">

        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
            <img src="https://images-na.ssl-images-amazon.com/images/I/811OyrCd5hL._SX425_.jpg" class="img-fluid">
        </div>
        <div class="col-lg-4 col-sm-4 col-4">
            {{$item->name}}
        </div>
        <div class="col-lg-2 col-sm-2 col-2">
            <span class="price text-info"> {{$item->price}}</span>
        </div>
        <div class="col-lg-2 col-sm-2 col-2">
            <span class="count"> {{$item->qty}}</span>
        </div>
    </div>
@endforeach

<div class="row p-3">
    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
        <button class="btn btn-primary btn-block">{{ __('common.To_basket') }}</button>
    </div>
</div>
